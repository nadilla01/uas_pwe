<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;
use App\Rules\ReCaptcha;


class MessageController extends Controller
{
    public function store(Request $request)
    {
        $recaptcha_response = $request->input('g-recaptcha-response');
        // dd($recaptcha_response);
        
        if (is_null($recaptcha_response)) {
            return response()->json(['success' => false, 'message' => 'Please Complete the Recaptcha to proceed']);
        }

        
        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);
        

        if ($response->successful() && $result->success == true) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'organization' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'required|string'
            ]);
    
            Message::create($validatedData);
    
            return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Please Complete the Recaptcha to proceed']);
            
        }
        
    }
}
