<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('productInventory.quantity') ? 'invalid' : '' }}">
        <label class="form-label required" for="quantity">{{ trans('cruds.productInventory.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required wire:model.defer="productInventory.quantity" step="0.01">
        <div class="validation-message">
            {{ $errors->first('productInventory.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productInventory.fields.quantity_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.product-inventories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>