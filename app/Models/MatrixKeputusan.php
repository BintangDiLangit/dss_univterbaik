<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixKeputusan extends Model
{
    use HasFactory;
    protected $table = 'matrixkeputusan';
    protected $fillable = ['id_alternatif', 'id_bobot', 'id_skala'];
    protected $primaryKey = 'id_matrix';

    public $timestamps = false;
}