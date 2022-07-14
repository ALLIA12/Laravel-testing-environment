<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waifu extends Model
{
    use HasFactory;

    // you need to add this when you are adding shit to the database
    protected $fillable = ['title', 'company', 'game', 'website', 'email', 'age', 'tags', 'descreption', 'image', 'user_id'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('descreption', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
