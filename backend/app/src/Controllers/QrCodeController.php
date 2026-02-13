<?php

namespace App\Controllers;
use App\Framework\Controller;

use chillerlan\QRCode\QRCode;

class QrCodeController extends Controller
{

    public function index()
    {
        $text = $_GET["text"] ?? "Hello, World!";
        echo '<img style="width: 400px; height: 400px;" src="'.(new QRCode)->render($text).'" alt="QR Code" />';
    }

}