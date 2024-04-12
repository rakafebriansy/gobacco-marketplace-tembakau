<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisTembakau extends Model
{
    use HasFactory;

    protected $table = 'jenis_tembakaus';
    protected $primaryKey = 'id_jenis_tembakau';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function sertifikasiProduks(): HasMany
    {
        return $this->hasMany(SertifikasiProduk::class, 'id_jenis_tembakau', 'id_jenis_tembakau');
    }
}
