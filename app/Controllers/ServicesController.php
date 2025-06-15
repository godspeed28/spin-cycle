<?php

namespace App\Controllers;

use App\Models\LayananModel;

class ServicesController extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');
        $result = $this->layananModel->findAll();
        $data = [
            'title' => 'Services',
            'services' => $result
        ];
        return view('admin/services', $data);
    }

    // insert service
    public function save()
    {
        $this->layananModel->save([
            'nama' => $this->request->getPost('nama'),
            'harga_per_kg' => $this->request->getPost('harga_per_kg')
        ]);

        return redirect()->to('/services')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // update services
    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga_per_kg' => $this->request->getPost('harga_per_kg')
        ];
        $this->layananModel->update($id, $data);
        return redirect()->to('/services')->with('success', 'Layanan berhasil diperbarui.');
    }

    // delete service
    public function delete($id)
    {
        $this->layananModel->delete($id);
        return redirect()->to('/services')->with('success', 'Layanan berhasil dihapus.');
    }
}
