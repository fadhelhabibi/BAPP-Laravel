<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pw extends Model
{
    use HasFactory;

    protected $table = 'pw';

    protected $fillable = ['ticketnumber','cluster','siteid','sitename','pic','notlppic','tipepenjagasite','hargapemberdayaan','keterangan'];
}
