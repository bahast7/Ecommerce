<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('userAddress.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.userAddress.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="userAddress.user_id" />
        <div class="validation-message">
            {{ $errors->first('userAddress.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.address_line_one') ? 'invalid' : '' }}">
        <label class="form-label required" for="address_line_one">{{ trans('cruds.userAddress.fields.address_line_one') }}</label>
        <input class="form-control" type="text" name="address_line_one" id="address_line_one" required wire:model.defer="userAddress.address_line_one">
        <div class="validation-message">
            {{ $errors->first('userAddress.address_line_one') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.address_line_one_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.address_line_two') ? 'invalid' : '' }}">
        <label class="form-label" for="address_line_two">{{ trans('cruds.userAddress.fields.address_line_two') }}</label>
        <input class="form-control" type="text" name="address_line_two" id="address_line_two" wire:model.defer="userAddress.address_line_two">
        <div class="validation-message">
            {{ $errors->first('userAddress.address_line_two') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.address_line_two_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.city') ? 'invalid' : '' }}">
        <label class="form-label required" for="city">{{ trans('cruds.userAddress.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" required wire:model.defer="userAddress.city">
        <div class="validation-message">
            {{ $errors->first('userAddress.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.postal_code') ? 'invalid' : '' }}">
        <label class="form-label" for="postal_code">{{ trans('cruds.userAddress.fields.postal_code') }}</label>
        <input class="form-control" type="text" name="postal_code" id="postal_code" wire:model.defer="userAddress.postal_code">
        <div class="validation-message">
            {{ $errors->first('userAddress.postal_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.postal_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.country') ? 'invalid' : '' }}">
        <label class="form-label required" for="country">{{ trans('cruds.userAddress.fields.country') }}</label>
        <input class="form-control" type="text" name="country" id="country" required wire:model.defer="userAddress.country">
        <div class="validation-message">
            {{ $errors->first('userAddress.country') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.country_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('userAddress.phone_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone_number">{{ trans('cruds.userAddress.fields.phone_number') }}</label>
        <input class="form-control" type="text" name="phone_number" id="phone_number" required wire:model.defer="userAddress.phone_number">
        <div class="validation-message">
            {{ $errors->first('userAddress.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userAddress.fields.phone_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.user-addresses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>