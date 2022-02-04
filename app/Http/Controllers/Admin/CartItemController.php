<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cart_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cart-item.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cart_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cart-item.create');
    }

    public function edit(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cart-item.edit', compact('cartItem'));
    }

    public function show(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->load('session', 'product');

        return view('admin.cart-item.show', compact('cartItem'));
    }
}
