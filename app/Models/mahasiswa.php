<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['name'];

    public function absensi()

    {
        return $this->hasMany('App\Models\absensi');
    }
}
