<?php

namespace App\Models;

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

            public function category() : BelongsTo{

                return $this->belongsTo(Category::class,'category_id');
            }
            public function comments() : HasMany
            {
               return $this->hasMany(Comment::class);

            }
        }

