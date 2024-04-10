<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamins';
    protected $primaryKey = 'id_jenis_kelamin';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function petaniTembakau(): HasMany
    {
        return $this->hasMany(PetaniTembakau::class, 'id_jenis_kelamin','id_jenis_kelamin');
    }
}