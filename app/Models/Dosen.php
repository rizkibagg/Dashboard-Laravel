<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama', 'pstudi', 'matkul'];
    protected $table = 'dosen';
    public $timestamps = false;
    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
}
