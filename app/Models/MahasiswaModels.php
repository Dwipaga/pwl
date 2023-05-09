<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModels extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    //protected $primarykey = 'id';
    //protected $keyType = 'int';
    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'kelas_id'

    ];

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function matakuliah()
    {
        return $this->belongsToMany(Matkul::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
    }

}

