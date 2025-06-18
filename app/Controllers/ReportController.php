<?php

namespace App\Controllers;

use App\Libraries\PdfService;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ReportController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }

        helper('my');

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        $db = \Config\Database::connect();
        $builder = $db->table('order_items i');
        $builder->select('o.no_resi, o.nama, i.nama_pakaian, i.jumlah, i.total_berat, i.subtotal, o.tanggal');
        $builder->join('orders o', 'i.order_id = o.id');
        $builder->where('o.paid', 1);
        $builder->orderBy('o.tanggal', 'DESC');

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('o.tanggal >=', $tanggal_awal);
            $builder->where('o.tanggal <=', $tanggal_akhir);
        }

        $query = $builder->get();

        $data = [
            'title' => 'Report',
            'items' => $query->getResult(),
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ];

        return view('admin/report', $data);
    }

    public function generatePdf()
    {
        helper('my');
        $pdf = new PdfService();

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        $db = \Config\Database::connect();
        $builder = $db->table('order_items i');
        $builder->select('o.no_resi, o.nama, i.nama_pakaian, i.jumlah, i.total_berat, i.subtotal, o.tanggal');
        $builder->join('orders o', 'i.order_id = o.id');
        $builder->where('o.paid', 1);
        $builder->orderBy('o.tanggal', 'DESC');

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('o.tanggal >=', $tanggal_awal);
            $builder->where('o.tanggal <=', $tanggal_akhir);
        }

        $query = $builder->get();

        $data = [
            'title' => 'Report',
            'items' => $query->getResult(),
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ];
        $html = view('admin/pdf_template', $data);
        $pdf->generate($html, 'report_order.pdf');
    }

    public function exportExcel()
    {
        helper('my');
        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        $db = \Config\Database::connect();
        $builder = $db->table('order_items i');
        $builder->select('o.no_resi, o.nama, i.nama_pakaian, i.jumlah, i.total_berat, i.subtotal, o.tanggal');
        $builder->join('orders o', 'i.order_id = o.id');
        $builder->where('o.paid', 1);

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('o.tanggal >=', $tanggal_awal);
            $builder->where('o.tanggal <=', $tanggal_akhir);
        }

        $query = $builder->get();
        $items = $query->getResult();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No Resi');
        $sheet->setCellValue('C1', 'Nama Pelanggan');
        $sheet->setCellValue('D1', 'Nama Pakaian');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Total Berat');
        $sheet->setCellValue('G1', 'Subtotal');
        $sheet->setCellValue('H1', 'Tanggal');

        $row = 2;
        $no = 1;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item->no_resi);
            $sheet->setCellValue('C' . $row, $item->nama);
            $sheet->setCellValue('D' . $row, remove_underscore($item->nama_pakaian));
            $sheet->setCellValue('E' . $row, $item->jumlah);
            $sheet->setCellValue('F' . $row, $item->total_berat);
            $sheet->setCellValue('G' . $row, $item->subtotal);
            $sheet->setCellValue('H' . $row, $item->tanggal);
            $row++;
        }

        // Set nama file
        $filename = 'Laporan_Laundry_' . date('YmdHis') . '.xlsx';

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
