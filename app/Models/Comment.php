<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $gaurded =[];

    public function replies() : HasMany{

        return $this->hasMany(Reply::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    // public function commentable()
    // {
    //     return $this->morphTo();
    // }
}
