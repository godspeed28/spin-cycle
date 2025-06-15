<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isPhpEnabled', false); // Nonaktifkan PHP dalam PDF
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'courier'); // Font sederhana

        $this->dompdf = new Dompdf($options);
        $this->dompdf->setHttpContext([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);
    }

    public function generate($html, $filename = 'document.pdf', $stream = true)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();

        if ($stream) {
            $this->dompdf->stream($filename, ["Attachment" => false]);
        } else {
            return $this->dompdf->output();
        }
    }
}
