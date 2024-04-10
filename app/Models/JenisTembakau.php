<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JenisTembakau extends Model
{
    use HasFactory;

    protected $table = 'jenis_tembakaus';
    protected $primaryKey = 'id_jenis_tembakau';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function sertifikasiProduks(): BelongsToMany
    {
        return $this->belongsToMany(StatusUji::class,
        'sertifikasi_produks',
        'id_jenis_tembakau',
        'id_status'
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
