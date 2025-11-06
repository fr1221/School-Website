<?php
namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Alumni;
use App\Models\Ekstrakurikuler;
use App\Models\Contact;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $pengumuman = Pengumuman::active()->latest()->take(2)->get();
        $berita = Berita::active()->latest()->take(3)->get();
        $prestasi = Prestasi::active()->latest()->take(2)->get();
        $alumni = Alumni::active()->inRandomOrder()->take(5)->get();
        $ekstrakurikuler = Ekstrakurikuler::active()->get();

        return view('public.home', compact(
            'pengumuman', 
            'berita', 
            'prestasi', 
            'alumni', 
            'ekstrakurikuler'
        ));
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::active()->latest()->paginate(6);
        return view('public.pengumuman', compact('pengumuman'));
    }

    public function pengumumanDetail($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->active()->firstOrFail();
        return view('public.pengumuman-detail', compact('pengumuman'));
    }

    public function berita()
    {
        $berita = Berita::active()->latest()->paginate(6);
        return view('public.berita', compact('berita'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('slug', $slug)->active()->firstOrFail();
        $beritaTerbaru = Berita::active()->where('id', '!=', $berita->id)->latest()->take(3)->get();
        
        return view('public.berita-detail', compact('berita', 'beritaTerbaru'));
    }

    public function prestasi()
    {
        $prestasi = Prestasi::active()->latest()->paginate(6);
        return view('public.prestasi', compact('prestasi'));
    }

    public function prestasiDetail($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->active()->firstOrFail();
        return view('public.prestasi-detail', compact('prestasi'));
    }

    public function alumni()
    {
        $alumni = Alumni::active()->latest()->paginate(12);
        return view('public.alumni', compact('alumni'));
    }

    public function ekstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::active()->get();
        return view('public.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function kontekai()
    {
        return view('public.kontekai');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $pengumuman = Pengumuman::active()
            ->where('judul', 'like', "%{$query}%")
            ->orWhere('konten', 'like', "%{$query}%")
            ->get();
            
        $berita = Berita::active()
            ->where('judul', 'like', "%{$query}%")
            ->orWhere('konten', 'like', "%{$query}%")
            ->get();

        $prestasi = Prestasi::active()
            ->where('judul', 'like', "%{$query}%")
            ->orWhere('deskripsi', 'like', "%{$query}%")
            ->get();

        return view('public.search', compact('pengumuman', 'berita', 'prestasi', 'query'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
    }
}