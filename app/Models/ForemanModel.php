<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForemanModel extends Model
{
    use HasFactory;
    protected $table = 'db_foreman';
    protected $guarded = [];
    protected $primaryKey = 'id_foreman';
    public $incrementing = false;
    protected $keyType = 'string';

    public function teknisi()
    {
        return $this->hasMany(TeknisiModel::class, 'foreman_id');
    }
}
