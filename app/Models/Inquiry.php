<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'message',
    ];

    // 🟢 Inquiry belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 🟢 Inquiry belongs to a user (the buyer who sent it)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
