<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'start_date',
        'end_date',
        'total_cost',
        'car_id',
        'user_id'
    ];



    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
