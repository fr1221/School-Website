<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';
    protected $fillable = [
        'nama', 'deskripsi', 'gambar', 'pembina', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}