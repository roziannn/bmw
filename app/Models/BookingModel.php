<?php

namespace App\Models;

use App\Models\PelangganModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingModel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'db_booking';
    protected $guarded = '';



    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'no_polisi', 'no_polisi');
    }
}
