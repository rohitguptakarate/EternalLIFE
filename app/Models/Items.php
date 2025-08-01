<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'subcategory_id',
        'interstate_tax_id',
        'intrastate_tax_id',
    ];
    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function interstateTax()
    {
        return $this->belongsTo(Tax::class, 'interstate_tax_id');
    }

    public function intrastateTax()
    {
        return $this->belongsTo(Tax::class, 'intrastate_tax_id');
    }
}