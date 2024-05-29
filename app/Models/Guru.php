<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama_guru' , 'jenis_kelamin' , 'agama' , 'tmpt_lahir' , 'tgal_lahir' , 'foto'];
    protected $visible = ['nip', 'nama_guru' , 'jenis_kelamin' , 'agama' , 'tmpt_lahir' , 'tgal_lahir' , 'foto'];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_mapel');
    }

    public function kelas()
  {
          return $this->hasMany(Kelas::class, 'id_kelas');
  }
}
