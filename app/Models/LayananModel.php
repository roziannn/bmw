<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    use HasFactory;
    protected $table = 'db_layanan';
    protected $guarded = '';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

   
}
