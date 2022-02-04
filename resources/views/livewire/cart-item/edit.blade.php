<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('cartItem.session_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="session">{{ trans('cruds.cartItem.fields.session') }}</label>
        <x-select-list class="form-control" required id="session" name="session" :options="$this->listsForFields['session']" wire:model="cartItem.session_id" />
        <div class="validation-message">
            {{ $errors->first('cartItem.session_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cartItem.fields.session_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cartItem.product_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="product">{{ trans('cruds.cartItem.fields.product') }}</label>
        <x-select-list class="form-control" required id="product" name="product" :options="$this->listsForFields['product']" wire:model="cartItem.product_id" />
        <div class="validation-message">
            {{ $errors->first('cartItem.product_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cartItem.fields.product_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cartItem.quantity') ? 'invalid' : '' }}">
        <label class="form-label required" for="quantity">{{ trans('cruds.cartItem.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required wire:model.defer="cartItem.quantity" step="0.01">
        <div class="validation-message">
            {{ $errors->first('cartItem.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cartItem.fields.quantity_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.cart-items.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>