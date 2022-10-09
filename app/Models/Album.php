<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title','image'];

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
