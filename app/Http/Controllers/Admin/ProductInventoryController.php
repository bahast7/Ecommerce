<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductInventory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductInventoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_inventory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.product-inventory.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_inventory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.product-inventory.create');
    }

    public function edit(ProductInventory $productInventory)
    {
        abort_if(Gate::denies('product_inventory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.product-inventory.edit', compact('productInventory'));
    }

    public function show(ProductInventory $productInventory)
    {
        abort_if(Gate::denies('product_inventory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.product-inventory.show', compact('productInventory'));
    }
}
