<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Somsa extends Model
{
    use HasFactory;

    protected $table = 'somsa';

    protected $fillable = ['cluster','siteid','sitename','type','ticketnumber','ac','grounding','penerangan','shelter','kebersihan','sparepart','harga'];
}
