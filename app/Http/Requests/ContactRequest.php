<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags(trim((string) $this->input('name'))),
            'email' => filter_var(trim((string) $this->input('email')), FILTER_SANITIZE_EMAIL),
            'subject' => strip_tags(trim((string) $this->input('subject'))),
            'message' => trim(strip_tags((string) $this->input('message'))),
        ]);
    }

    public function rules(): array
    {
        $validSubjects = array_keys(config('portfolio.contact_subjects', [
            'Paket Starter' => 'Paket Starter',
            'Paket PRO' => 'Paket PRO',
            'Paket CUSTOM' => 'Paket CUSTOM',
            'Tawaran Kerja/Magang' => 'Tawaran Kerja/Magang',
            'Lainnya' => 'Lainnya',
        ]));

        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'subject' => ['required', 'string', Rule::in($validSubjects)],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website_hp' => ['nullable', 'max:0'], // Honeypot anti-spam field must remain empty
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama lengkap minimal terdiri dari 2 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'subject.required' => 'Silakan pilih subjek atau keperluan Anda.',
            'subject.in' => 'Pilihan subjek tidak valid.',
            'message.required' => 'Pesan atau detail kebutuhan wajib diisi.',
            'message.min' => 'Pesan minimal terdiri dari 10 karakter agar kebutuhan Anda jelas.',
            'website_hp.max' => 'Aktivitas spam terdeteksi.',
        ];
    }
}
