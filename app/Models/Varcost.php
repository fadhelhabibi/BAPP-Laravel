<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varcost extends Model
{
    use HasFactory;

    protected $table = 'varcost';

    protected $fillable = ['kategori','periode','tahun','siteid','sitename','nop','cluster','tiketfiola','tanggalpelaksanaan','aktivity','kodesl','qty','hargasatuan','fee','statusticket','po','statuspekerjaan','statuspenagihan'];
}
