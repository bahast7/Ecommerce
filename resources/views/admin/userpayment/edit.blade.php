@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.userpayment.title_singular') }}:
                    {{ trans('cruds.userpayment.fields.id') }}
                    {{ $userpayment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('userpayment.edit', [$userpayment])
        </div>
    </div>
</div>
@endsection