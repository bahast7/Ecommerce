@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.productInventory.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('product_inventory_create')
                    <a class="btn btn-indigo" href="{{ route('admin.product-inventories.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.productInventory.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('product-inventory.index')

    </div>
</div>
@endsection