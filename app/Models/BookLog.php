<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLog extends Model
{
    use HasFactory;
    protected $table = 'book_log';
    protected $fillable = array('book_id','name','date_borrowed','return_date');

    public function book(){
        return $this->hasMany('App\Model\Book');
    }
}
