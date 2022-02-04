@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.userAddress.title_singular') }}:
                    {{ trans('cruds.userAddress.fields.id') }}
                    {{ $userAddress->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.id') }}
                            </th>
                            <td>
                                {{ $userAddress->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.user') }}
                            </th>
                            <td>
                                @if($userAddress->user)
                                    <span class="badge badge-relationship">{{ $userAddress->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.address_line_one') }}
                            </th>
                            <td>
                                {{ $userAddress->address_line_one }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.address_line_two') }}
                            </th>
                            <td>
                                {{ $userAddress->address_line_two }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.city') }}
                            </th>
                            <td>
                                {{ $userAddress->city }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.postal_code') }}
                            </th>
                            <td>
                                {{ $userAddress->postal_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.country') }}
                            </th>
                            <td>
                                {{ $userAddress->country }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.userAddress.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $userAddress->phone_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('user_address_edit')
                    <a href="{{ route('admin.user-addresses.edit', $userAddress) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.user-addresses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection