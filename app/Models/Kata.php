<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;
    protected $table = "katas";
    protected $primaryKey = 'id_kata'; // Primary key sebenarnya
    public $incrementing = true; // Jika primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key
    protected $fillable = [
        'gorontalo',    // Menambahkan kolom 'gorontalo'
        'indonesia',    // Menambahkan kolom 'indonesia'
        'kategori',     // Menambahkan kolom 'kategori'
        'kalimat',      // Menambahkan kolom 'kalimat'
        'pengucapan',   // Menambahkan kolom 'pengucapan'
        'gambar',       // Menambahkan kolom 'gambar'
        'suara',        // Menambahkan kolom 'suara'
    ];

    public function editHistories()
    {
        return $this->hasMany(EditHistory::class, 'id_kata');
    }
}
