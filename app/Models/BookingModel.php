<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'db_booking';
    protected $guarded = '';


    // public function wo_detail()
    // {
    //     return $this->hasMany(DetailWO_Model::class, 'no_wo'); //Has many
    // }
}
