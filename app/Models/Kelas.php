<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['kelas', 'id_guru'];
    protected $visible = ['kelas', 'id_guru'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_siswa');
    }
}
