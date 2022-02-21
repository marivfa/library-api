<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $fillable = array('category_id','title','author','date_publication','code','status');
    protected $hidden = array("created_at","updated_at");

    public function booklog(){
        return $this->belongsTo('\App\Model\BookLog');
    }

    public function category(){
        return $this->hasMany('App\Model\Category');
    }

    public function scopeCode($query,$code){
        if($code){
            return $query->where('code','like',"%$code%");
        }
    }

    public function scopeTitle($query,$title){
        if($title){
            return $query->where('title','like',"%$title%");
        }
    }

    public function scopeAuthor($query,$author){
        if($author){
            return $query->where('author','like',"%$author%");
        }
    }

    public function scopeCategory($query,$category){
        if($category){
            return $query->where('category_id','=',$category);
        }
    }

    public function scopeDate($query,$date){
        if($date){
            return $query->where('date_publication','like',$date);
        }
    }
}
