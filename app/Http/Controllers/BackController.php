<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function __invoke()
    {
        return redirect()->back();
    }
}
