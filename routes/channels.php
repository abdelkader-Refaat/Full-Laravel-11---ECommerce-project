<?php

use Illuminate\Support\Facades\Broadcast;

//   this is a private channel users can subscribe to about reverb web socket.
Broadcast::channel('management.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
