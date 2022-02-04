@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orderItem.title_singular') }}:
                    {{ trans('cruds.orderItem.fields.id') }}
                    {{ $orderItem->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orderItem.fields.id') }}
                            </th>
                            <td>
                                {{ $orderItem->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderItem.fields.order') }}
                            </th>
                            <td>
                                @if($orderItem->order)
                                    <span class="badge badge-relationship">{{ $orderItem->order->total ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderItem.fields.product') }}
                            </th>
                            <td>
                                @if($orderItem->product)
                                    <span class="badge badge-relationship">{{ $orderItem->product->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderItem.fields.quantity') }}
                            </th>
                            <td>
                                {{ $orderItem->quantity }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_item_edit')
                    <a href="{{ route('admin.order-items.edit', $orderItem) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.order-items.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection