<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


        protected $fillable = [
            'name', 'description', 'category', 'loan_duration', 'image', 'user_id', 'is_available', 'end_date'
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
