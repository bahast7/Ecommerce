@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.paymentDetail.title_singular') }}:
                    {{ trans('cruds.paymentDetail.fields.id') }}
                    {{ $paymentDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('payment-detail.edit', [$paymentDetail])
        </div>
    </div>
</div>
@endsection