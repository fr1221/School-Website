<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'nama', 'foto', 'jurusan', 'tahun_lulus', 'testimoni', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}