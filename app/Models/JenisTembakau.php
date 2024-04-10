<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTembakau extends Model
{
    use HasFactory;

    protected $table = 'jenis_tembakaus';
    protected $primaryKey = 'id_jenis_tembakau';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
