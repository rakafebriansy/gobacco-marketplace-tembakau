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
    protected $fillable = [
        'id_kecamatan',
        'id_petani',
        'id_pengujian',
        'id_jenis_tembakau',
        'id_status',
        'surat_izin_usaha',
        'tgl_serahsampel',
        'berkas_lain',
        'bukti_tf',
        'hasil_pengujian'
    ];
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
