<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //

    function getPDF(Request $request)
    {
        $options = new Options();
        $options->set('defaultFont', 'Time New Roman');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper(array(0, 0, 800, 1200), 'potrait');
        $dompdf->loadHtml('');

        $dompdf->render();
        return $dompdf->stream("'.haizz.'.pdf", array("Attachment" => 0));
    }
}
