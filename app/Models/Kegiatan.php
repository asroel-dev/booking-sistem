<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $guarded = [];

    public function pegawai(): HasMany
    {
        return $this->hasMany(DetailPegawai::class);
    }

}
