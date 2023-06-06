<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CreditCard;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function pay()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $sum_cart = $carts->sum(function ($cart) {
            return $cart->menu->cost * $cart->count;
        });
        $sum_cart += 1000;
        if ($sum_cart >= 30000) {
            $sum_cart = $sum_cart * 0.9;
        }
        $credit_cart = CreditCard::where('user_id', auth()->user()->id)->get();
        return view('pay')
            ->with(compact('sum_cart'))
            ->with(compact('credit_cart'));
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $count_cart = $carts->sum(function ($cart) {
            return $cart->count;
        });
        $sum_cart = $carts->sum(function ($cart) {
            return $cart->menu->cost * $cart->count;
        });
        return view('cart')
            ->with(compact('carts'))
            ->with(compact('sum_cart'))
            ->with(compact('count_cart'));
    }

    public function add(Menu $menu, Request $request)
    {
        $user_id = auth()->user()->id;

        if ($cart = Cart::where('menu_id', $menu->id)->first()) {
            $cart->update([
                'user_id' => $user_id,
                'menu_id' => $menu->id,
                'count' => $cart->count + $request->count_cart,
            ]);
            return redirect()->back();
        }

        Cart::create([
            'user_id' => $user_id,
            'menu_id' => $menu->id,
            'count' => $request->count_cart,
        ]);
        return redirect()->back();
    }

    public function up(Cart $cart)
    {
        $cart->count++;
        $cart->save();
        return redirect()->route('cart.index');
    }

    public function down(Cart $cart)
    {
        if ($cart->count == 1) {
            $cart->delete();
            return redirect()->route('cart.index');
        }

        $cart->count--;
        $cart->save();
        return redirect()->route('cart.index');
    }

    public function delete(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index');
    }

    public function order()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $sum_cart = $carts->sum(function ($cart) {
            return $cart->menu->cost * $cart->count;
        });
        $sum_cart += 1000;
        if ($sum_cart >= 30000) {
            $sum_cart = $sum_cart * 0.9;
        }
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $cart->delete();
        Order::create([
            'user_id' => auth()->user()->id,
            'menu_id' => 1,
            'status' => 3,
            'cost' => $sum_cart,
        ]);
        return redirect()->route('profile.info');
    }
}
