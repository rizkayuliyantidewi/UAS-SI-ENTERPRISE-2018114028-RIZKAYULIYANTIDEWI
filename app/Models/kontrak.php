<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrak extends Model
{
    use HasFactory;
    protected $guarded = ['name'];
    protected $fillable = ['mahasiswa_id','semester_id',];
}
