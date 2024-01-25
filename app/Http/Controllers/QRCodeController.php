<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class QRCodeController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.qrcode.index', compact('user_session'));
        }
    }

    public function generateQrCode(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $qrCodes = [];
            $data = $request->input('data', 'Default QR Code Data');
            $qrCodes['simple']        = QrCode::size(150)->generate($data);


            return view('admin.qrcode.generate', $qrCodes,compact('user_session','data'));
        }
    }


    public function downloadQrCode($data)
    {
        // Generate QR Code
        $qrCode = QrCode::size(300)->generate($data);

        // Convert QR Code to PNG image
        $image = base64_decode($qrCode);

        // Set the response type
        $response = Response::make($image, 200);

        // Set the content type to PNG
        $response->header('Content-Type', 'image/png');

        // Set the content disposition to trigger download
        $response->header('Content-Disposition', 'attachment; filename="qrcode.png"');

        return $response;
    }
}
