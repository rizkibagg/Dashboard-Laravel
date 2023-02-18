<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'nama', 'kelas', 'matkul_id'];
    protected $table = 'mahasiswa';
    public $timestamps = false;
    public function matkul(){
        return $this->belongsTo(Dosen::class);
    }    
}
