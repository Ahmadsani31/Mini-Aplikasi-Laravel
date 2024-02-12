<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klup extends Model
{
    use HasFactory;
    protected   $table = 'klubs';
    protected   $primaryKey = 'id';
    public      $timestamps = true;
    protected   $dateFormat = 'Y-m-d H:i:s';

    protected   $fillable = ['name', 'kota'];
}
