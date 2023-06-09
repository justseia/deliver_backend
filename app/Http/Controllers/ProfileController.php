<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function info()
    {
        $user = auth()->user();
        return view('profile_info')->with(compact('user'));
    }

    public function update_password(Request $request)
    {
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function info_update(Request $request)
    {
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
        ]);
        return redirect()->route('profile.info');
    }

    public function orders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        return view('profile_orders')->with(compact('orders'));
    }

    public function favorite()
    {
        $favorites = auth()->user()->getFavoriteItems(Menu::class)->get();
        return view('profile_favorite')->with(compact('favorites'));
    }

    public function favorite_add(Menu $menu)
    {
        auth()->user()->favorite($menu);
        return redirect()->back();
    }

    public function favorite_delete(Menu $menu)
    {
        auth()->user()->unfavorite($menu);
        return redirect()->route('profile.favorite');
    }

    public function cards()
    {
        $user_id = auth()->user()->id;
        $cards = CreditCard::where('user_id', $user_id)->get();
        return view('profile_cards')->with(compact('cards'));
    }

    public function cards_add(Request $request)
    {
        $user_id = auth()->user()->id;
        CreditCard::create([
            'number' => $request->number,
            'date' => $request->date,
            'cvv' => $request->cvv,
            'name' => $request->name,
            'user_id' => $user_id,
        ]);
        return redirect()->route('profile.cards');
    }
}
