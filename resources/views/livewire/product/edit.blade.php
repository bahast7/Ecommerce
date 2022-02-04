<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('product.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.product.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="product.name">
        <div class="validation-message">
            {{ $errors->first('product.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.desc') ? 'invalid' : '' }}">
        <label class="form-label required" for="desc">{{ trans('cruds.product.fields.desc') }}</label>
        <input class="form-control" type="text" name="desc" id="desc" required wire:model.defer="product.desc">
        <div class="validation-message">
            {{ $errors->first('product.desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.desc_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.sku') ? 'invalid' : '' }}">
        <label class="form-label required" for="sku">{{ trans('cruds.product.fields.sku') }}</label>
        <input class="form-control" type="text" name="sku" id="sku" required wire:model.defer="product.sku">
        <div class="validation-message">
            {{ $errors->first('product.sku') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.sku_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.category_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="category">{{ trans('cruds.product.fields.category') }}</label>
        <x-select-list class="form-control" required id="category" name="category" :options="$this->listsForFields['category']" wire:model="product.category_id" />
        <div class="validation-message">
            {{ $errors->first('product.category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.inventory_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="inventory">{{ trans('cruds.product.fields.inventory') }}</label>
        <x-select-list class="form-control" required id="inventory" name="inventory" :options="$this->listsForFields['inventory']" wire:model="product.inventory_id" />
        <div class="validation-message">
            {{ $errors->first('product.inventory_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.inventory_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.product.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="product.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('product.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_main_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="main_image">{{ trans('cruds.product.fields.main_image') }}</label>
        <x-dropzone id="main_image" name="main_image" action="{{ route('admin.products.storeMedia') }}" collection-name="product_main_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_main_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.main_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_images') ? 'invalid' : '' }}">
        <label class="form-label required" for="images">{{ trans('cruds.product.fields.images') }}</label>
        <x-dropzone id="images" name="images" action="{{ route('admin.products.storeMedia') }}" collection-name="product_images" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_images') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.images_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.discount_id') ? 'invalid' : '' }}">
        <label class="form-label" for="discount">{{ trans('cruds.product.fields.discount') }}</label>
        <x-select-list class="form-control" id="discount" name="discount" :options="$this->listsForFields['discount']" wire:model="product.discount_id" />
        <div class="validation-message">
            {{ $errors->first('product.discount_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.discount_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>