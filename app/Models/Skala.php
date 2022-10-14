<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    use HasFactory;
    protected $table = 'skala';
    protected $fillable = ['nm_skala', 'value'];
    protected $primaryKey = 'id_skala';

    public $timestamps = false;
}