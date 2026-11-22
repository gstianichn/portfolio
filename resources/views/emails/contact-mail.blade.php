<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Website Portofolio</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF9F6; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color: #1F2933;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #FAF9F6; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #FFFFFF; border-radius: 20px; overflow: hidden; border: 1px solid #E8F2ED; box-shadow: 0 4px 20px rgba(31, 41, 51, 0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #4C8B6E; padding: 28px 32px; color: #FFFFFF;">
                            <p style="margin: 0; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; opacity: 0.9;">
                                Web Portofolio &amp; Freelance Showcase
                            </p>
                            <h1 style="margin: 6px 0 0; font-size: 22px; font-weight: 700;">
                                Pesan Masuk Baru: {{ $data['subject'] }}
                            </h1>
                        </td>
                    </tr>

                    <!-- Sender Information -->
                    <tr>
                        <td style="padding: 28px 32px 16px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #FAF9F6; border-radius: 14px; padding: 18px; border: 1px solid #E8F2ED;">
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <span style="font-size: 12px; color: #52606D; display: block;">Nama Pengirim:</span>
                                        <strong style="font-size: 15px; color: #1F2933;">{{ $data['name'] }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <span style="font-size: 12px; color: #52606D; display: block;">Alamat Email:</span>
                                        <a href="mailto:{{ $data['email'] }}" style="font-size: 15px; color: #4C8B6E; font-weight: 600; text-decoration: none;">
                                            {{ $data['email'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <span style="font-size: 12px; color: #52606D; display: block;">Kategori / Keperluan:</span>
                                        <span style="display: inline-block; margin-top: 4px; background-color: #E8F2ED; color: #4C8B6E; font-size: 12px; font-weight: 700; padding: 4px 10px; border-radius: 999px;">
                                            {{ $data['subject'] }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 12px; color: #52606D; display: block;">Waktu Dikirim:</span>
                                        <span style="font-size: 13px; color: #1F2933;">{{ $data['sent_at'] ?? now()->format('d M Y, H:i') }}</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Message Body -->
                    <tr>
                        <td style="padding: 8px 32px 28px;">
                            <p style="margin: 0 0 8px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #52606D;">
                                Detail Pesan / Kebutuhan:
                            </p>
                            <div style="background-color: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 14px; padding: 18px; font-size: 15px; line-height: 1.65; color: #1F2933; white-space: pre-line;">{{ $data['message'] }}</div>
                        </td>
                    </tr>

                    <!-- Footer Reply CTA -->
                    <tr>
                        <td style="padding: 20px 32px 28px; border-top: 1px solid #F1F5F9; text-align: center;">
                            <a href="mailto:{{ $data['email'] }}?subject=Re: {{ rawurlencode('[Portofolio Cantika] ' . $data['subject']) }}"
                               style="display: inline-block; background-color: #4C8B6E; color: #FFFFFF; font-weight: 600; font-size: 14px; padding: 12px 24px; border-radius: 10px; text-decoration: none;">
                                Balas Email {{ $data['name'] }}
                            </a>
                            <p style="margin: 14px 0 0; font-size: 12px; color: #52606D;">
                                Email ini dikirim otomatis dari formulir kontak website portofolio Cantika Gustiani.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
