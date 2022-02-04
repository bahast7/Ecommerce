@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.shoppingSession.title_singular') }}:
                    {{ trans('cruds.shoppingSession.fields.id') }}
                    {{ $shoppingSession->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.shoppingSession.fields.id') }}
                            </th>
                            <td>
                                {{ $shoppingSession->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shoppingSession.fields.user') }}
                            </th>
                            <td>
                                @if($shoppingSession->user)
                                    <span class="badge badge-relationship">{{ $shoppingSession->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shoppingSession.fields.total') }}
                            </th>
                            <td>
                                {{ $shoppingSession->total }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('shopping_session_edit')
                    <a href="{{ route('admin.shopping-sessions.edit', $shoppingSession) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.shopping-sessions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection