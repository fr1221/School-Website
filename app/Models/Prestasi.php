<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    use HasFactory;
    
    protected $table = 'prestasi';
    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'peringkat', 'tingkat', 'slug', 'status'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($prestasi) {
            $prestasi->slug = Str::slug($prestasi->judul);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}