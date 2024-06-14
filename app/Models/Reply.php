<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;
    protected $gaurded =[];
    public function replies() : BelongsTo{

        return $this->belongsTo(Comment::class);
    }
}
