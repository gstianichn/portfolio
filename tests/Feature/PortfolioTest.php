<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_home_page_loads_with_all_portfolio_sections(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Cantika Gustiani');
        $response->assertSee('Open for Projects & Opportunities');
        $response->assertSee('ResepKu');
        $response->assertSee('Travelku');
        $response->assertSee('Hotel Booking System');
        $response->assertSee('Sistem Manajemen Kost');
        $response->assertSee('Paket Starter');
        $response->assertSee('Paket PRO');
        $response->assertSee('Paket CUSTOM');
        $response->assertSee('gstianichan.dev@gmail.com');
    }

    public function test_cv_can_be_downloaded(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('cv/CV-Cantika-Gustiani.pdf', '%PDF-1.4 fake cv content');

        $response = $this->get(route('cv.download'));

        $response->assertStatus(200);
        $response->assertDownload('CV-Cantika-Gustiani.pdf');
    }

    public function test_contact_form_sends_email_to_cantika(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Rina Permata',
            'email' => 'rina@company.co.id',
            'subject' => 'Paket PRO',
            'message' => 'Halo Cantika, kami ingin berkonsultasi untuk pembuatan sistem informasi sekolah.',
            'website_hp' => '',
        ];

        $response = $this->post(route('contact.send'), $payload);

        $response->assertRedirect(route('home') . '#kontak');
        $response->assertSessionHas('success');

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) use ($payload) {
            return $mail->hasTo('gstianichan.dev@gmail.com')
                && $mail->data['name'] === $payload['name']
                && $mail->data['email'] === $payload['email']
                && $mail->data['subject'] === $payload['subject'];
        });
    }

    public function test_contact_form_validates_required_fields_and_min_length(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.send'), [
            'name' => 'A',
            'email' => 'bukan-email',
            'subject' => 'Paket Tidak Ada',
            'message' => 'Pendek',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
        Mail::assertNothingSent();
    }

    public function test_contact_form_blocks_honeypot_spam_bots(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.send'), [
            'name' => 'Spam Bot',
            'email' => 'bot@spam.com',
            'subject' => 'Paket Starter',
            'message' => 'Ini adalah pesan spam otomatis dari bot.',
            'website_hp' => 'https://spamsite.com',
        ]);

        $response->assertSessionHasErrors(['website_hp']);
        Mail::assertNothingSent();
    }
}
