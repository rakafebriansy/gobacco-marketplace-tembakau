<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetaniTembakau extends Model
{
    use HasFactory;

    protected $table = 'petani_tembakaus';
    protected $primaryKey = 'id_petani';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nama_petani',
        'username_petani',
        'pw_petani',
        'email_petani',
        'id_jenis_kelamin',
        'alamat_petani',
        'id_kecamatan',
        'telp_petani',
        'noktp_petani',
    ];

    public function jenisKelamin(): BelongsTo
    {
        return $this->belongsTo(JenisKelamin::class, 'id_jenis_kelamin', 'id_jenis_kelamin');
    }
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
}
