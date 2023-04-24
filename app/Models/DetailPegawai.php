<?php

namespace App\Models;

use App\Models\Unker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPegawai extends Model
{
    use HasFactory;
    protected $table = "detail_pegawai";
    protected $guarded = [];

    public function unker(): BelongsTo
    {
        return $this->belongsTo(Unker::class,'kunker','kunker');
    }
}
