<?php

namespace App\Models;

use App\Models\Scopes\TrendProductsScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
            use HasFactory;
            use HasTranslations;

            public $translatable = ['name','short_description','description','meta_description',];

            protected $fillable = [
            'category_id',
            'name',
            'slug',
            'short_description',
            'description',
            'price',
            'selling_price',
            'image',
            'qty',
            'tax',
            'status',
            'trend',
            'meta_title',
            'meta_keywords',
            'meta_description'];
            protected function casts():array {
                return [
                    "meta_keywords" => 'array',
                    'trend' => 'boolean',
                    "status" => 'boolean'
                ];
            }

            public function category() : BelongsTo{

                return $this->belongsTo(Category::class,'category_id');
            }
            public function comments() : HasMany
            {
               return $this->hasMany(Comment::class);

            }
            // public function comments()
            // {
            //     return $this->morphMany(Comment::class, 'commentable');
            // }

            // global scope return just trend products
            protected static function booted() :void
            {
                static::addGlobalScope(new TrendProductsScope);
            }
            //local scope for active status products
            public function scopeStatus(Builder $query): void
            {
                $query->where('status', 1);


            }
            // Mutattor
            protected function name(): Attribute
            {
                return Attribute::make(
                    get: fn (string $value) => strtoupper($value),
                    set: fn (string $value) => strtolower($value),
                );
            }


        }

