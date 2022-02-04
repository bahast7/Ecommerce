@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.productInventory.title_singular') }}:
                    {{ trans('cruds.productInventory.fields.id') }}
                    {{ $productInventory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.productInventory.fields.id') }}
                            </th>
                            <td>
                                {{ $productInventory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.productInventory.fields.quantity') }}
                            </th>
                            <td>
                                {{ $productInventory->quantity }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('product_inventory_edit')
                    <a href="{{ route('admin.product-inventories.edit', $productInventory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.product-inventories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection