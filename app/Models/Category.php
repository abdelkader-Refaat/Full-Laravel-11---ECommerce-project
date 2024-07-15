<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name','description','meta_description','meta_title'];
    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        "is_showing",
        "is_popular",
        "meta_description",
        "meta_title",
        "meta_keywords",
    ];
    public function products() : HasMany {
        return $this->hasMany(Product::class)->orderBy('created_at', 'desc');
    }
    // return latest of many products
    public function currentProduct(): HasOne{
        return $this->hasOne(Product::class)->latestOfMany('created_at');
    }

    // mutator
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

}
