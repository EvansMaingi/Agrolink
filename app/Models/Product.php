<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // A product belongs to a farmer (user)
public function farmer()
{
    return $this->belongsTo(User::class, 'farmer_id');
}

// A product has many inquiries
public function inquiries()
{
    return $this->hasMany(Inquiry::class);
}

}
