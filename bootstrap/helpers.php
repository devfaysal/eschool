<?php

use App\Models\Session;

function currentSession() : string 
{
    return Session::select('name')
        ->where('is_current', true)
        ->pluck('name')
        ->first();
}