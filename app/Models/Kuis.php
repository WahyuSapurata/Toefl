<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Kuis extends Model
{
    use HasFactory;

    protected $table = 'kuis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_kategori',
        'uuid_soal',
        'uuid_user',
        'poin'
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
