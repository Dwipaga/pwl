<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsToMany(MahasiswaModels::class, 'mahasiswa_matakuliah')->withPivot('nilai');
    }
}
