<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function verify(Request $request)
    {
        $code = $request->query('code'); // Get the 'code' query parameter

        if (!$code) {
            return view('frontend.verify-certificate', [
                'isValid' => null, // No code provided
            ]);
        }

        $certificate = Certificate::where('certificate_code', $code)->first();

        if ($certificate) {
            return view('frontend.verify-certificate', [
                'certificate' => $certificate,
                'isValid' => true,
            ]);
        } else {
            return view('frontend.verify-certificate', [
                'isValid' => false,
            ]);
        }
    }
}
