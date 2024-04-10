<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisPengujian extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengujians';
    protected $primaryKey = 'id_pengujian';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function pemerintah(): BelongsTo
    {
        return $this->belongsTo(Pemerintah::class, 'id_pemerintah','id_pemerintah');
    }
}
