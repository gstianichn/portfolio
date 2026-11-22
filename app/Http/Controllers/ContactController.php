<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        $validated = $request->validated();

        $recipient = env('MAIL_TO_ADDRESS', config('portfolio.owner.email', 'gstianichan.dev@gmail.com'));

        try {
            Mail::to($recipient)->send(new ContactMail([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'sent_at' => now()->format('d M Y, H:i') . ' WIB',
            ]));

            return redirect()
                ->to(route('home') . '#kontak')
                ->with('success', 'Terima kasih, ' . $validated['name'] . '! Pesan Anda mengenai "' . $validated['subject'] . '" telah terkirim. Saya akan segera membalas ke email Anda.');
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim email kontak portofolio: ' . $e->getMessage());

            return redirect()
                ->to(route('home') . '#kontak')
                ->withInput()
                ->with('error', 'Maaf, terjadi kendala saat mengirim pesan. Silakan hubungi langsung melalui email gstianichan.dev@gmail.com.');
        }
    }
}
