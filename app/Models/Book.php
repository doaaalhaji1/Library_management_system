<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{ 
    use HasFactory;
    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'is_available', 'image_url'];

    public function category()
{
    return $this->belongsTo(BookCategory::class, 'category_id');
}

public function user()
      {
        return $this->belongsTo(User::class);
    }
}
