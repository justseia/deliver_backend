<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes_1 = Recipe::where('id', '>=', 5)->get();
        $recipes_2 = Recipe::where('id', '<=', 10)->where('id', '>', 5)->get();
        $recipes_3 = Recipe::where('id', '<=', 15)->where('id', '>', 10)->get();
        return view('recipe')
            ->with(compact('recipes_1'))
            ->with(compact('recipes_2'))
            ->with(compact('recipes_3'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipe-read')->with(compact('recipe'));
    }
}
