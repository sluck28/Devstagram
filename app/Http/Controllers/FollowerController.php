<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    
    public function store(User $user)
    {           
        //se usa attach cuando se relaciona ocn una misma tabla
        $user->followers()->attach(auth()->user()->id);
        return back();
    }

    function delete(User $user)
    {
        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}
    

