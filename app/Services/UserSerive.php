<?php

namespace App\Services;

use App\Models\User;

class UserSerive
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getUser($id){
        return User::where('id' , $id)->first();
    }
    public function createUser(){

    }
}
