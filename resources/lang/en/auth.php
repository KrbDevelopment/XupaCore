<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => [
        'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
        'wrong_user' => 'These credentials do not match our records.',
        'wrong_password' => 'These credentials do not match our records.',
        'socialite' => [
            'facebook' => 'There is no account connected with this Facebook account. Please use another Facebook account or create a new one.',
            'github' => 'There is no account connected with this GitHub account. Please use another GitHub account or create a new one.'
        ]
    ]
];
