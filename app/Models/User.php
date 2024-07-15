<?php

namespace App\Models;

use App\Casts\Token;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'country',
        'pincode',
        'github_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
     // global scope for ancient users
     protected static function booted(): void
     {
         static::addGlobalScope(new \App\Models\Scopes\AncientScope);
     }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // 'remember_token' => Token::class,
        ];
    }
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
    public function roles() :BelongsToMany{
        return $this->belongsToMany(Role::class);
    }
    public function socialLogins() :HasMany{
        return $this->hasMany(SocialLogin::class);
    }
}
