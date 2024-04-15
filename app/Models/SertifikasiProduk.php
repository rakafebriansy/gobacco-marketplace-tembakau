<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SertifikasiProduk extends Model
{
    use HasFactory;

    protected $table = 'sertifikasi_produks';
    protected $primaryKey = 'id_sertifikasi';
    protected $keyType = 'int';
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
        'produk_tembakau',
        'hasil_pengujian',
        'gmb_tembakau',
    ];
    public function jenisTembakau(): BelongsTo
    {
        return $this->belongsTo(JenisTembakau::class, 'id_jenis_tembakau', 'id_jenis_tembakau');
    }
    public function statusUji(): BelongsTo
    {
        return $this->belongsTo(StatusUji::class, 'id_status', 'id_status');
    }
}
