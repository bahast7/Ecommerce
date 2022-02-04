<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('paymenttype.payment_type_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type_name">{{ trans('cruds.paymenttype.fields.payment_type_name') }}</label>
        <input class="form-control" type="text" name="payment_type_name" id="payment_type_name" required wire:model.defer="paymenttype.payment_type_name">
        <div class="validation-message">
            {{ $errors->first('paymenttype.payment_type_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymenttype.fields.payment_type_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymenttype.payment_type_api_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type_api_key">{{ trans('cruds.paymenttype.fields.payment_type_api_key') }}</label>
        <input class="form-control" type="text" name="payment_type_api_key" id="payment_type_api_key" required wire:model.defer="paymenttype.payment_type_api_key">
        <div class="validation-message">
            {{ $errors->first('paymenttype.payment_type_api_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymenttype.fields.payment_type_api_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.paymenttype_payment_type_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type_image">{{ trans('cruds.paymenttype.fields.payment_type_image') }}</label>
        <x-dropzone id="payment_type_image" name="payment_type_image" action="{{ route('admin.paymenttypes.storeMedia') }}" collection-name="paymenttype_payment_type_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.paymenttype_payment_type_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymenttype.fields.payment_type_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.paymenttypes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>