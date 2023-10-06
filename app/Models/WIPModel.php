<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WIPModel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'db_wip';
    protected $guarded = '';
    protected $primaryKey = 'no_wip';
    public $incrementing = false;
    protected $keyType = 'string';


    public function wo()
    {
        return $this->belongsTo(PelangganModel::class, 'no_wo', 'no_wo'); //One to one
    }
}
