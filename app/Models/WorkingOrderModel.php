<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingOrderModel extends Model
{
    use HasFactory;
    protected $table = 'db_wo';
    protected $guarded = '';
    protected $primaryKey = 'no_wo';
    public $incrementing = false;
    protected $keyType = 'string';


    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'no_polisi', 'no_polisi'); //One to one
    }

    public function booking()
    {
        return $this->belongsTo(BookingModel::class, 'no_polisi', 'no_polisi');
    }
}
