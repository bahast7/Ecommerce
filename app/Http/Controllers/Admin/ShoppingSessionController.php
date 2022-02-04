<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShoppingSession;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShoppingSessionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shopping_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopping-session.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shopping_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopping-session.create');
    }

    public function edit(ShoppingSession $shoppingSession)
    {
        abort_if(Gate::denies('shopping_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopping-session.edit', compact('shoppingSession'));
    }

    public function show(ShoppingSession $shoppingSession)
    {
        abort_if(Gate::denies('shopping_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoppingSession->load('user');

        return view('admin.shopping-session.show', compact('shoppingSession'));
    }
}
