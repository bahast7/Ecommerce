<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('discount.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.discount.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="discount.name">
        <div class="validation-message">
            {{ $errors->first('discount.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.desc') ? 'invalid' : '' }}">
        <label class="form-label required" for="desc">{{ trans('cruds.discount.fields.desc') }}</label>
        <input class="form-control" type="text" name="desc" id="desc" required wire:model.defer="discount.desc">
        <div class="validation-message">
            {{ $errors->first('discount.desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.desc_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.discount_percent') ? 'invalid' : '' }}">
        <label class="form-label required" for="discount_percent">{{ trans('cruds.discount.fields.discount_percent') }}</label>
        <input class="form-control" type="number" name="discount_percent" id="discount_percent" required wire:model.defer="discount.discount_percent" step="0.01">
        <div class="validation-message">
            {{ $errors->first('discount.discount_percent') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.discount_percent_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.active') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.discount.fields.active') }}</label>
        <select class="form-control" wire:model="discount.active">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['active'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('discount.active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.active_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>