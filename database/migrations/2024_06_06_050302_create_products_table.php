<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('short_description');
            $table->longText('description');
            $table->decimal('price',10,2);
            $table->decimal('selling_price',8,2);
            $table->string('image');
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trend')->default(0);
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->text('meta_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
