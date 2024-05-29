<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mapel' , 'kode_mapel' , 'id_guru'];
    protected $visible = ['nama_mapel' , 'kode_mapel' , 'id_guru'];

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
