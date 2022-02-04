<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('shoppingSession.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.shoppingSession.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="shoppingSession.user_id" />
        <div class="validation-message">
            {{ $errors->first('shoppingSession.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shoppingSession.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shoppingSession.total') ? 'invalid' : '' }}">
        <label class="form-label required" for="total">{{ trans('cruds.shoppingSession.fields.total') }}</label>
        <input class="form-control" type="number" name="total" id="total" required wire:model.defer="shoppingSession.total" step="0.01">
        <div class="validation-message">
            {{ $errors->first('shoppingSession.total') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shoppingSession.fields.total_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.shopping-sessions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>