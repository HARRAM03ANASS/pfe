<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','body','image','user_id','category_id','status','created_at'];
   
    public function categorie(){
        return $this->BelongsTo(Categorie::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName(){
        // had lfunction hya li kat7aded b ina column ghnrecuperiw les posts dyalna 
        return 'slug';
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    
    public function getCreatedAtAttribute(){
        return Carbon::parse($this->updated_at); 
    }
}