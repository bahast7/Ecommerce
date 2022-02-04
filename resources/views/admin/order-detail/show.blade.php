@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orderDetail.title_singular') }}:
                    {{ trans('cruds.orderDetail.fields.id') }}
                    {{ $orderDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $orderDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.user') }}
                            </th>
                            <td>
                                @if($orderDetail->user)
                                    <span class="badge badge-relationship">{{ $orderDetail->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.total') }}
                            </th>
                            <td>
                                {{ $orderDetail->total }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.payment') }}
                            </th>
                            <td>
                                @if($orderDetail->payment)
                                    <span class="badge badge-relationship">{{ $orderDetail->payment->amount ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_detail_edit')
                    <a href="{{ route('admin.order-details.edit', $orderDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.order-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection