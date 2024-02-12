<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertandinganList extends Model
{
    use HasFactory;
    protected   $table = 'list_pertandiangans';
    protected   $primaryKey = 'id';
    public      $timestamps = true;
    protected   $dateFormat = 'Y-m-d H:i:s';

    protected   $fillable = ['pertandingan_id', 'babak', 'klub_a', 'klub_b', 'menang', 'point', 'score_a', 'score_b'];
}
