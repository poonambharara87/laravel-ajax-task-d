<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $primaryKey = "id";
    
    protected $fillable = ['user_id'];


    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }

}
