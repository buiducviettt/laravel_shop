<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'user_id',
        'label',
        'main_location',
        'landmark',        
        'alternative',
        'pin_code',
        'city_state',
        'country',
        'is_default',  
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
