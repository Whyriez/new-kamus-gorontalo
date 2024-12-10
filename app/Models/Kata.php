<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;
    protected $table = "katas";
    protected $primaryKey = 'id_katas'; // Primary key sebenarnya
    public $incrementing = true; // Jika primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key
}
