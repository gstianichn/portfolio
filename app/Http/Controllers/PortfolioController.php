<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = config('portfolio');

        return view('home', [
            'owner' => $portfolio['owner'],
            'techStack' => $portfolio['tech_stack'],
            'projects' => $portfolio['projects'],
            'pricing' => $portfolio['pricing'],
            'contactSubjects' => $portfolio['contact_subjects'],
        ]);
    }

    public function downloadCv()
    {
        $cvPath = config('portfolio.owner.cv_path', 'cv/CV-Cantika-Gustiani.pdf');

        if (Storage::disk('public')->exists($cvPath)) {
            return Storage::disk('public')->download($cvPath, 'CV-Cantika-Gustiani.pdf');
        }

        $publicFile = public_path('cv/CV-Cantika-Gustiani.pdf');
        if (file_exists($publicFile)) {
            return response()->download($publicFile, 'CV-Cantika-Gustiani.pdf');
        }

        return redirect()->back()->with('error', 'File CV sedang diperbarui. Silakan hubungi melalui formulir kontak.');
    }
}
