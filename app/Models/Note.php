<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    // Define the relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
