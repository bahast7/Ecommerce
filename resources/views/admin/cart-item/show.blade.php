@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.cartItem.title_singular') }}:
                    {{ trans('cruds.cartItem.fields.id') }}
                    {{ $cartItem->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.cartItem.fields.id') }}
                            </th>
                            <td>
                                {{ $cartItem->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cartItem.fields.session') }}
                            </th>
                            <td>
                                @if($cartItem->session)
                                    <span class="badge badge-relationship">{{ $cartItem->session->total ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cartItem.fields.product') }}
                            </th>
                            <td>
                                @if($cartItem->product)
                                    <span class="badge badge-relationship">{{ $cartItem->product->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cartItem.fields.quantity') }}
                            </th>
                            <td>
                                {{ $cartItem->quantity }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('cart_item_edit')
                    <a href="{{ route('admin.cart-items.edit', $cartItem) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.cart-items.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection