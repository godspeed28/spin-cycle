<?php

namespace App\Controllers;

use App\Models\PakaianModel;

class ClothesController extends BaseController
{
    protected $pakaianModel;

    public function __construct()
    {
        $this->pakaianModel = new PakaianModel();
    }

    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $result = $this->pakaianModel->findAll();
        $data = [
            'title' => 'Clothes',
            'clothes' => $result
        ];
        return view('admin/clothes', $data);
    }

    // Simpan pakaian baru
    public function save()
    {
        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);

            $this->pakaianModel->save([
                'nama'  => $this->request->getPost('nama'),
                'berat' => $this->request->getPost('berat'),
                'foto'  => $newName
            ]);

            return redirect()->to('/clothes')->with('success', 'Pakaian berhasil ditambahkan!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }

    // Update data pakaian
    public function update($id)
    {
        $file = $this->request->getFile('foto');
        $oldData = $this->pakaianModel->find($id);

        if (!$oldData) {
            return redirect()->to('/clothes')->with('error', 'Data tidak ditemukan.');
        }

        $namaFile = $oldData['foto']; // default: gunakan foto lama

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus foto lama
            if (file_exists('uploads/' . $namaFile)) {
                unlink('uploads/' . $namaFile);
            }

            $namaFile = $file->getRandomName();
            $file->move('uploads/', $namaFile);
        }

        $this->pakaianModel->update($id, [
            'nama'  => $this->request->getPost('nama'),
            'berat' => $this->request->getPost('berat'),
            'foto'  => $namaFile
        ]);

        return redirect()->to('/clothes')->with('success', 'Pakaian berhasil diperbarui.');
    }

    // Hapus pakaian
    public function delete($id)
    {
        $pakaian = $this->pakaianModel->find($id);

        if (!$pakaian) {
            return redirect()->to('/clothes')->with('error', 'Data tidak ditemukan.');
        }

        // Hapus gambar dari folder
        if (file_exists('uploads/' . $pakaian['foto'])) {
            unlink('uploads/' . $pakaian['foto']);
        }

        $this->pakaianModel->delete($id);

        return redirect()->to('/clothes')->with('success', 'Pakaian berhasil dihapus.');
    }
}
