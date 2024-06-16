<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialLogin extends Model
{
    use HasFactory;
    protected $fillable = ['provider' ,'user_id' ,'provider_id'];
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
