<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('userpayment.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.userpayment.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="userpayment.user_id" />
        <div class="validation-message">
            {{ $errors->first('userpayment.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userpayment.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userpayment.payment_type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type">{{ trans('cruds.userpayment.fields.payment_type') }}</label>
        <x-select-list class="form-control" required id="payment_type" name="payment_type" :options="$this->listsForFields['payment_type']" wire:model="userpayment.payment_type_id" />
        <div class="validation-message">
            {{ $errors->first('userpayment.payment_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userpayment.fields.payment_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userpayment.account_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="account_number">{{ trans('cruds.userpayment.fields.account_number') }}</label>
        <input class="form-control" type="text" name="account_number" id="account_number" required wire:model.defer="userpayment.account_number">
        <div class="validation-message">
            {{ $errors->first('userpayment.account_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userpayment.fields.account_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.userpayments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>