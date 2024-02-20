<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\BankDetails;
use Illuminate\Support\Facades\Session;


class QRCodeController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $qrcode=BankDetails::all();
            return view('admin.qrcode.index', compact('user_session','qrcode'));
        }
    }

   public function generateQrCode(Request $request)
{
   
        // Validate the form data
        $request->validate([
            'qrcode' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new BankDetails instance
        $qrcode = new BankDetails();

        // Check if a new QR code is provided
        if ($request->hasFile('qrcode')) {
            $uploadedFile = $request->file('qrcode');
            $imageName = $uploadedFile->getClientOriginalName();

            // Move the uploaded file to the 'qrcodes' directory in the public path
            $uploadedFile->move(public_path('qrcode'), $imageName);

            // Update the qrcode_path variable in the BankDetails instance
            $qrcode->qrcode_path = $imageName;
        } else {
            return redirect()->back()->with('fail', 'No QR code file provided.');
        }

        // Save the BankDetails instance
        $qrcode->save();

       return back()->with('success','Uploaded Successfully');
}

public function destroy($id)
{
    // Find the user by ID
    $user = BankDetails::find($id);

    if (!$user) {
        return redirect()->back()->with('fail', 'User not found.');
    }

    // Get the QR code filename
    $qrcodeFilename = $user->qrcode_path;

    // Check if the QR code file exists
    $filePath = public_path('qrcode/' . $qrcodeFilename);
    if ($qrcodeFilename && file_exists($filePath)) {
        // Delete the file using the file_exists function and unlink
        unlink($filePath);

        // Update the user record to remove the QR code filename
        $user->update([
            'qrcode_path' => null,
        ]);

        // Delete the user record
        $user->delete();

        return redirect()->back()->with('success', 'QR code file and user record deleted successfully.');
    }

    return redirect()->back()->with('fail', 'QR code file not found.');
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
