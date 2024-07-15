<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Schedule::command('send Email')->weekly();

Artisan::command('greet{name}', function ($name) {
    $this->info("Hello, {$name}!");
})->describe('Greet a user by their name');
