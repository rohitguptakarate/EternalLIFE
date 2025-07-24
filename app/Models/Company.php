<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    use HasFactory;

   
    protected $table = 'company';
    protected $fillable = [
        'organization_name',
        'contact',
        'email',
        'gst_in',
        'pan',
        'office_address',
        'city',
        'state',
        'pin_code',
        'account_name',
        'account_number',
        'ifsc',
        'bank_name',
        'branch_name',
    ];
}