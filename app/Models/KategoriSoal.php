<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class KategoriSoal extends Model
{
    use HasFactory;

    protected $table = 'kategori_soals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'kategori',
        'waktu',
        'jumlah_soal',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
