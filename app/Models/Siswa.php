<?php

// app/Models/Siswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

// app/Models/Siswa.php
protected $fillable = [
    'nama', 'umur', 'sekolah_id', 'foto'
];
    

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
    
}

