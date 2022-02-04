@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.paymentDetail.title_singular') }}:
                    {{ trans('cruds.paymentDetail.fields.id') }}
                    {{ $paymentDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.paymentDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $paymentDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentDetail.fields.amount') }}
                            </th>
                            <td>
                                {{ $paymentDetail->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentDetail.fields.payment_type') }}
                            </th>
                            <td>
                                @if($paymentDetail->paymentType)
                                    <span class="badge badge-relationship">{{ $paymentDetail->paymentType->payment_type_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentDetail.fields.status') }}
                            </th>
                            <td>
                                {{ $paymentDetail->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_detail_edit')
                    <a href="{{ route('admin.payment-details.edit', $paymentDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payment-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection