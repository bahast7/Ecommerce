@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.shoppingSession.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('shopping_session_create')
                    <a class="btn btn-indigo" href="{{ route('admin.shopping-sessions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.shoppingSession.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('shopping-session.index')

    </div>
</div>
@endsection