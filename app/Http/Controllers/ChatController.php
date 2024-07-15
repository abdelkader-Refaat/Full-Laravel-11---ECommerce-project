<?php

namespace App\Http\Controllers;

use App\Services\UserSerive;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatForm(UserSerive $user , $user_id) {
        return $user->getUser($user_id);
    }
    public function sendMesssage(){
        return false;
    }
}
