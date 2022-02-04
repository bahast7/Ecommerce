<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('productCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.productCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="productCategory.name">
        <div class="validation-message">
            {{ $errors->first('productCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('productCategory.desc') ? 'invalid' : '' }}">
        <label class="form-label required" for="desc">{{ trans('cruds.productCategory.fields.desc') }}</label>
        <input class="form-control" type="text" name="desc" id="desc" required wire:model.defer="productCategory.desc">
        <div class="validation-message">
            {{ $errors->first('productCategory.desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.desc_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_category_category_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="category_image">{{ trans('cruds.productCategory.fields.category_image') }}</label>
        <x-dropzone id="category_image" name="category_image" action="{{ route('admin.product-categories.storeMedia') }}" collection-name="product_category_category_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_category_category_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.category_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.product-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>