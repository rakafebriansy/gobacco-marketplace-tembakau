<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUji extends Model
{
    use HasFactory;

    protected $table = 'status_ujis';
    protected $primaryKey = 'id_status';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
