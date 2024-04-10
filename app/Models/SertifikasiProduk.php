<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SertifikasiProduk extends Pivot
{
    use HasFactory;

    protected $table = 'sertifikasi_produks';
    protected $foreignKey = 'id_jenis_tembakau';
    protected $relatedKey = 'id_status';
    public $timestamps = false;
    
    public function usesTimestamps()
    {
        return false;
    }
    public function jenisTembakau(): BelongsTo
    {
        return $this->belongsTo(JenisTembakau::class, 'id_jenis_tembakau', 'id');
    }
    public function statusUji(): BelongsTo
    {
        return $this->belongsTo(StatusUji::class, 'id_status', 'id');
    }
}
