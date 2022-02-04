@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.paymenttype.title_singular') }}:
                    {{ trans('cruds.paymenttype.fields.id') }}
                    {{ $paymenttype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.paymenttype.fields.id') }}
                            </th>
                            <td>
                                {{ $paymenttype->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymenttype.fields.payment_type_name') }}
                            </th>
                            <td>
                                {{ $paymenttype->payment_type_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymenttype.fields.payment_type_api_key') }}
                            </th>
                            <td>
                                {{ $paymenttype->payment_type_api_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymenttype.fields.payment_type_image') }}
                            </th>
                            <td>
                                @foreach($paymenttype->payment_type_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('paymenttype_edit')
                    <a href="{{ route('admin.paymenttypes.edit', $paymenttype) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.paymenttypes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection