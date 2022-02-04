@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.discount.title_singular') }}:
                    {{ trans('cruds.discount.fields.id') }}
                    {{ $discount->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.id') }}
                            </th>
                            <td>
                                {{ $discount->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.name') }}
                            </th>
                            <td>
                                {{ $discount->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.desc') }}
                            </th>
                            <td>
                                {{ $discount->desc }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.discount_percent') }}
                            </th>
                            <td>
                                {{ $discount->discount_percent }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.active') }}
                            </th>
                            <td>
                                {{ $discount->active_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('discount_edit')
                    <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection