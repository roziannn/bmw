<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    use HasFactory;
    protected $table = 'db_pelanggan';
    protected $guarded = '';
    protected $primaryKey = 'no_polisi';
    public $incrementing = false;
    protected $keyType = 'string';
}
