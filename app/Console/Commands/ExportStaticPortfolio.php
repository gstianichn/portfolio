<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;

class ExportStaticPortfolio extends Command
{
    protected $signature = 'portfolio:export-static
        {--output=dist : Target directory for the generated static site}';

    protected $description = 'Export the Laravel Blade portfolio into a static site ready for GitHub Pages (branch deploy)';

    public function handle(): int
    {
        $outputDir = base_path($this->option('output'));

        $this->info('Mengekspor halaman portofolio menjadi file statis...');

        // Ensure Vite build exists
        if (! File::exists(public_path('build/manifest.json'))) {
            $this->error('Folder public/build tidak ditemukan. Jalankan "npm run build" terlebih dahulu.');

            return self::FAILURE;
        }

        // Enable static export mode temporarily for rendering
        $previousStaticFlag = config('portfolio.static_form.enabled', false);
        config(['portfolio.static_form.enabled' => true]);

        try {
            $portfolio = config('portfolio');

            // Ensure $errors is available when rendering outside HTTP middleware
            view()->share('errors', new ViewErrorBag);

            $html = view('home', [
                'owner' => $portfolio['owner'],
                'techStack' => $portfolio['tech_stack'],
                'projects' => $portfolio['projects'],
                'pricing' => $portfolio['pricing'],
                'contactSubjects' => $portfolio['contact_subjects'],
            ])->render();
        } finally {
            config(['portfolio.static_form.enabled' => $previousStaticFlag]);
        }

        // Convert local APP_URL references to relative paths for GitHub Pages compatibility
        $appUrl = rtrim((string) config('app.url', 'http://localhost:8000'), '/');
        $html = str_replace(
            [
                $appUrl . '/build/',
                $appUrl . '/images/',
                $appUrl . '/cv/',
                'http://localhost/build/',
                'http://localhost/images/',
                'http://localhost/cv/',
                '"/build/',
                '"/images/',
                '"/cv/',
            ],
            [
                './build/',
                './images/',
                './cv/',
                './build/',
                './images/',
                './cv/',
                '"./build/',
                '"./images/',
                '"./cv/',
            ],
            $html
        );

        // Recreate output directory cleanly
        if (File::exists($outputDir)) {
            File::deleteDirectory($outputDir);
        }
        File::makeDirectory($outputDir, 0755, true);

        // Write index.html, 404.html, and .nojekyll
        File::put($outputDir . DIRECTORY_SEPARATOR . 'index.html', $html);
        File::put($outputDir . DIRECTORY_SEPARATOR . '404.html', $html);
        File::put($outputDir . DIRECTORY_SEPARATOR . '.nojekyll', '');

        // Copy Vite build assets
        File::copyDirectory(public_path('build'), $outputDir . DIRECTORY_SEPARATOR . 'build');

        // Copy public images if present
        if (File::isDirectory(public_path('images'))) {
            File::copyDirectory(public_path('images'), $outputDir . DIRECTORY_SEPARATOR . 'images');
        }

        // Copy favicon if present
        if (File::exists(public_path('favicon.ico'))) {
            File::copy(public_path('favicon.ico'), $outputDir . DIRECTORY_SEPARATOR . 'favicon.ico');
        }

        // Copy CV PDF file
        $cvTargetDir = $outputDir . DIRECTORY_SEPARATOR . 'cv';
        File::makeDirectory($cvTargetDir, 0755, true);
        $cvRelativePath = config('portfolio.owner.cv_path', 'cv/CV-Cantika-Gustiani.pdf');

        if (Storage::disk('public')->exists($cvRelativePath)) {
            File::copy(
                Storage::disk('public')->path($cvRelativePath),
                $cvTargetDir . DIRECTORY_SEPARATOR . 'CV-Cantika-Gustiani.pdf'
            );
        } elseif (File::exists(public_path('cv/CV-Cantika-Gustiani.pdf'))) {
            File::copy(
                public_path('cv/CV-Cantika-Gustiani.pdf'),
                $cvTargetDir . DIRECTORY_SEPARATOR . 'CV-Cantika-Gustiani.pdf'
            );
        }

        $this->info('Berhasil! File statis GitHub Pages siap di folder: ' . $outputDir);

        return self::SUCCESS;
    }
}
