<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('paymentDetail.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.paymentDetail.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="paymentDetail.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('paymentDetail.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentDetail.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentDetail.payment_type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type">{{ trans('cruds.paymentDetail.fields.payment_type') }}</label>
        <x-select-list class="form-control" required id="payment_type" name="payment_type" :options="$this->listsForFields['payment_type']" wire:model="paymentDetail.payment_type_id" />
        <div class="validation-message">
            {{ $errors->first('paymentDetail.payment_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentDetail.fields.payment_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentDetail.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.paymentDetail.fields.status') }}</label>
        <select class="form-control" wire:model="paymentDetail.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('paymentDetail.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentDetail.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payment-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>