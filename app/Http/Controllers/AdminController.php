<?php
namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Alumni;
use App\Models\Ekstrakurikuler;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if (!in_array($user->role, ['admin', 'editor'])) {
                abort(403, 'Unauthorized access.');
            }

            return $next($request);
        });
    }

    public function dashboard()
    {
        $stats = [
            'pengumuman' => Pengumuman::count(),
            'berita' => Berita::count(),
            'prestasi' => Prestasi::count(),
            'alumni' => Alumni::count(),
            'ekstrakurikuler' => Ekstrakurikuler::count(),
            'contacts' => Contact::where('dibaca', false)->count(),
        ];

        $recentPengumuman = Pengumuman::with('user')->latest()->take(5)->get();
        $recentBerita = Berita::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPengumuman', 'recentBerita'));
    }

    // PENGUMUMAN METHODS
    public function pengumumanIndex()
    {
        $pengumuman = Pengumuman::with('user')->latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function pengumumanCreate()
    {
        return view('admin.pengumuman.create');
    }

    public function pengumumanStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $this->storeImage($request, 'gambar', 'pengumuman');
        $slug = $this->generateUniqueSlug(Pengumuman::class, $request->judul);

        Pengumuman::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'slug' => $slug,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function pengumumanEdit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function pengumumanUpdate(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($pengumuman->gambar);
            $gambarPath = $this->storeImage($request, 'gambar', 'pengumuman');
            $pengumuman->gambar = $gambarPath;
        }

        $slug = $request->judul != $pengumuman->judul 
            ? $this->generateUniqueSlug(Pengumuman::class, $request->judul)
            : $pengumuman->slug;

        $pengumuman->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function pengumumanDestroy(Pengumuman $pengumuman)
    {
        $this->deleteImage($pengumuman->gambar);
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    // BERITA METHODS
    public function beritaIndex()
    {
        $berita = Berita::with('user')->latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $this->storeImage($request, 'gambar', 'berita');
        $slug = $this->generateUniqueSlug(Berita::class, $request->judul);

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'gambar' => $gambarPath,
            'slug' => $slug,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function beritaEdit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($berita->gambar);
            $gambarPath = $this->storeImage($request, 'gambar', 'berita');
            $berita->gambar = $gambarPath;
        }

        $slug = $request->judul != $berita->judul 
            ? $this->generateUniqueSlug(Berita::class, $request->judul)
            : $berita->slug;

        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function beritaDestroy(Berita $berita)
    {
        $this->deleteImage($berita->gambar);
        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    // PRESTASI METHODS
    public function prestasiIndex()
    {
        $prestasi = Prestasi::latest()->paginate(10);
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function prestasiCreate()
    {
        return view('admin.prestasi.create');
    }

    public function prestasiStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'peringkat' => 'required',
            'tingkat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $this->storeImage($request, 'gambar', 'prestasi');
        $slug = $this->generateUniqueSlug(Prestasi::class, $request->judul);

        Prestasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'peringkat' => $request->peringkat,
            'tingkat' => $request->tingkat,
            'gambar' => $gambarPath,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function prestasiEdit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function prestasiUpdate(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'peringkat' => 'required',
            'tingkat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($prestasi->gambar);
            $gambarPath = $this->storeImage($request, 'gambar', 'prestasi');
            $prestasi->gambar = $gambarPath;
        }

        $slug = $request->judul != $prestasi->judul 
            ? $this->generateUniqueSlug(Prestasi::class, $request->judul)
            : $prestasi->slug;

        $prestasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'peringkat' => $request->peringkat,
            'tingkat' => $request->tingkat,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function prestasiDestroy(Prestasi $prestasi)
    {
        $this->deleteImage($prestasi->gambar);
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }

    // ALUMNI METHODS
    public function alumniIndex()
    {
        $alumni = Alumni::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumni'));
    }

    public function alumniCreate()
    {
        return view('admin.alumni.create');
    }

    public function alumniStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'testimoni' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $fotoPath = $this->storeImage($request, 'foto', 'alumni');

        Alumni::create([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'testimoni' => $request->testimoni,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil ditambahkan.');
    }

    public function alumniEdit(Alumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function alumniUpdate(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'testimoni' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $this->deleteImage($alumni->foto);
            $fotoPath = $this->storeImage($request, 'foto', 'alumni');
            $alumni->foto = $fotoPath;
        }

        $alumni->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'testimoni' => $request->testimoni,
        ]);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil diperbarui.');
    }

    public function alumniDestroy(Alumni $alumni)
    {
        $this->deleteImage($alumni->foto);
        $alumni->delete();

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil dihapus.');
    }

    // EKSTRAKURIKULER METHODS
    public function ekstrakurikulerIndex()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->paginate(10);
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function ekstrakurikulerCreate()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function ekstrakurikulerStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'pembina' => 'nullable|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $this->storeImage($request, 'gambar', 'ekstrakurikuler');

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'pembina' => $request->pembina,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function ekstrakurikulerEdit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function ekstrakurikulerUpdate(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'pembina' => 'nullable|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($ekstrakurikuler->gambar);
            $gambarPath = $this->storeImage($request, 'gambar', 'ekstrakurikuler');
            $ekstrakurikuler->gambar = $gambarPath;
        }

        $ekstrakurikuler->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'pembina' => $request->pembina,
        ]);

        return redirect()->route('admin.ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function ekstrakurikulerDestroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $this->deleteImage($ekstrakurikuler->gambar);
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    // CONTACT MESSAGES
    public function contactIndex()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }

    public function contactShow(Contact $contact)
    {
        $contact->update(['dibaca' => true]);
        return view('admin.contact.show', compact('contact'));
    }

    public function contactDestroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }

    // HELPER METHODS
    private function storeImage($request, $fieldName, $folder)
    {
        if ($request->hasFile($fieldName)) {
            return $request->file($fieldName)->store($folder, 'public');
        }
        return null;
    }

    private function deleteImage($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function generateUniqueSlug($model, $title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}