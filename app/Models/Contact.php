<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    use HasFactory;
 protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'contact',
        'website',
        'billaddress',
        'billstate',
        'billcity',
        'billpin',
        'shippaddress',
        'shippstate',
        'shippcity',
        'shipppin',
        'gsttreatment',
        'gstin',
        'pan',
        'sourceofsupply',
    ];


     // Relationships
    public function billingState()
    {
        return $this->belongsTo(State::class, 'billstate');
    }

    public function shippingState()
    {
        return $this->belongsTo(State::class, 'shippstate');
    }

    public function sourceOfSupplyState()
    {
        return $this->belongsTo(State::class, 'sourceofsupply');
    }
}