<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;
    protected $guarded = ['name'];

    public function mahasiswas()
    {
        return $this->hasMany(mahasiswa::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class);
    }
}
