<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{ 
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = [
        'judul', 'konten', 'gambar', 'kategori', 'slug', 'status', 'user_id'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
        
        static::updating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->konten), 150);
    }
}