<?php

namespace App\Http\Controllers\Admin\Quote;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        Order::create([
            'quote' => $request->quote,
            'author' => $request->author,
        ]);
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно добавлено');
    }
}
