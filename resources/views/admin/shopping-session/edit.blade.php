@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.shoppingSession.title_singular') }}:
                    {{ trans('cruds.shoppingSession.fields.id') }}
                    {{ $shoppingSession->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('shopping-session.edit', [$shoppingSession])
        </div>
    </div>
</div>
@endsection