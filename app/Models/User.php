<?php

namespace App\Models;

use App\Models\BookingModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'db_users';
    protected $guarded = '';

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'no_polisi', 'no_polisi');
    }
}
