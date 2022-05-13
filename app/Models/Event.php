<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Event as Authenticatable;

class Event extends Model
{
    use HasFactory;
     public $timestamps=false;

protected $fillable = ['name', 'description','status'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'question_id');
    }
}


