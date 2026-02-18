<?php

namespace App\Controllers;

use App\Framework\Controller;
use chillerlan\QRCode\QRCode;

class QrCodeController extends Controller
{

    public function index()
    {
        $data = $_GET['text'];

        // quick and simple:
        echo '<img src="' . (new QRCode)->render($data) . '" alt="QR Code" />';
    }
}
