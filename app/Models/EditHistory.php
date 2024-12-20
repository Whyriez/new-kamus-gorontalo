<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditHistory extends Model
{
    use HasFactory;

    protected $fillable = ['id_kata', 'id_editor', 'action', 'activity'];
    // Relasi ke tabel Kata (many-to-one)
    public function kata()
    {
        return $this->belongsTo(Kata::class, 'id_kata');
    }

    // Relasi ke tabel User (many-to-one)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_editor');
    }
}
