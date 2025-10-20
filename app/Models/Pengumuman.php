<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    use HasFactory;
    
    protected $table = 'pengumuman';
    protected $fillable = [
        'judul', 'konten', 'gambar', 'slug', 'status', 'user_id'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($pengumuman) {
            $pengumuman->slug = Str::slug($pengumuman->judul);
        });
        
        static::updating(function ($pengumuman) {
            $pengumuman->slug = Str::slug($pengumuman->judul);
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