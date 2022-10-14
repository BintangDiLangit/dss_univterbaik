<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $table = 'bobot_roc';
    protected $fillable = ['id_kriteria', 'valuebobot'];
    protected $primaryKey = 'id_bobot';

    public $timestamps = false;
}