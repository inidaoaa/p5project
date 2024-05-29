<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_siswa', 'jenis_kelamin' , 'agama' , 'tmpt_lahir' , 'tgal_lahir' , 'id_kelas' , 'id_jurusan' , 'foto'];
    protected $visible = ['nama_siswa', 'jenis_kelamin' , 'agama' , 'tmpt_lahir' , 'tgal_lahir' , 'id_kelas' , 'id_jurusan' , 'foto'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}