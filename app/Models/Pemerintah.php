<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemerintah extends Model
{
    use HasFactory;

    protected $table = 'pemerintahs';
    protected $primaryKey = 'id_pemerintah';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
    public function jenisPengujians(): HasMany
    {
        return $this->hasMany(JenisPengujian::class, 'id_pemerintah', 'id_pemerintah');
    }
}
