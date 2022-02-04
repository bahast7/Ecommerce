<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orderDetail.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.orderDetail.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="orderDetail.user_id" />
        <div class="validation-message">
            {{ $errors->first('orderDetail.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.total') ? 'invalid' : '' }}">
        <label class="form-label required" for="total">{{ trans('cruds.orderDetail.fields.total') }}</label>
        <input class="form-control" type="number" name="total" id="total" required wire:model.defer="orderDetail.total" step="0.01">
        <div class="validation-message">
            {{ $errors->first('orderDetail.total') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.total_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.payment_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment">{{ trans('cruds.orderDetail.fields.payment') }}</label>
        <x-select-list class="form-control" required id="payment" name="payment" :options="$this->listsForFields['payment']" wire:model="orderDetail.payment_id" />
        <div class="validation-message">
            {{ $errors->first('orderDetail.payment_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.payment_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.order-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>