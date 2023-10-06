<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeknisiModel extends Model
{
    use HasFactory;
    protected $table = 'db_teknisi';
    protected $guarded = [];
    protected $primaryKey = 'id_teknisi';
    public $incrementing = false;
    protected $keyType = 'string';

    public function foreman()
    {
        return $this->belongsTo(ForemanModel::class, 'foreman_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(TeknisiModel::class, 'id_teknisi');
    }
}
