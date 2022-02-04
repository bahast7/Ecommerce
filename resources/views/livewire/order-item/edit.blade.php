<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orderItem.order_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="order">{{ trans('cruds.orderItem.fields.order') }}</label>
        <x-select-list class="form-control" required id="order" name="order" :options="$this->listsForFields['order']" wire:model="orderItem.order_id" />
        <div class="validation-message">
            {{ $errors->first('orderItem.order_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderItem.fields.order_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderItem.product_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="product">{{ trans('cruds.orderItem.fields.product') }}</label>
        <x-select-list class="form-control" required id="product" name="product" :options="$this->listsForFields['product']" wire:model="orderItem.product_id" />
        <div class="validation-message">
            {{ $errors->first('orderItem.product_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderItem.fields.product_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderItem.quantity') ? 'invalid' : '' }}">
        <label class="form-label" for="quantity">{{ trans('cruds.orderItem.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" wire:model.defer="orderItem.quantity" step="0.01">
        <div class="validation-message">
            {{ $errors->first('orderItem.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderItem.fields.quantity_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.order-items.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>