<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';
    protected $primaryKey = 'id_kecamatan';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class, 'id_kecamatan', 'id_kecamatan');   
    }
    public function pemerintah(): HasOne
    {
        return $this->hasOne(Pemerintah::class, 'id_kecamatan', 'id_kecamatan');   
    }
    public function petaniTembakaus(): HasMany
    {
        return $this->hasMany(PetaniTembakau::class, 'id_kecamatan', 'id_kecamatan');
    }
}
