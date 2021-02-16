<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['jadwal','matakuliah_id',];

    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class);
    }
}
