<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusUji extends Model
{
    use HasFactory;

    protected $table = 'status_ujis';
    protected $primaryKey = 'id_status';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function sertifikasiProduks(): HasMany
    {
        return $this->hasMany(SertifikasiProduk::class, 'id_status', 'id_status');
    }
}
