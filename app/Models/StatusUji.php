<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StatusUji extends Model
{
    use HasFactory;

    protected $table = 'status_ujis';
    protected $primaryKey = 'id_status';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function sertifikasiProduks(): BelongsToMany
    {
        return $this->belongsToMany(StatusUji::class,
        'sertifikasi_produks',
        'id_status',
        'id_jenis_tembakau'
        )->withPivot([
            'id_sertifikasi',
            'id_kecamatan',
            'id_petani',
            'id_pengujian',
            'surat_izin_usaha',
            'tgl_serahsampel',
            'berkas_lain',
            'bukti_tf',
            'hasil_pengujian'
            ])->using(SertifikasiProduk::class);
    }
}
