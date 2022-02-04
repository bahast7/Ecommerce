<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('userpayment_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Userpayment" format="csv" />
                <livewire:excel-export model="Userpayment" format="xlsx" />
                <livewire:excel-export model="Userpayment" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.userpayment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.userpayment.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.userpayment.fields.payment_type') }}
                            @include('components.table.sort', ['field' => 'payment_type.payment_type_name'])
                        </th>
                        <th>
                            {{ trans('cruds.userpayment.fields.account_number') }}
                            @include('components.table.sort', ['field' => 'account_number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userpayments as $userpayment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $userpayment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $userpayment->id }}
                            </td>
                            <td>
                                @if($userpayment->user)
                                    <span class="badge badge-relationship">{{ $userpayment->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($userpayment->paymentType)
                                    <span class="badge badge-relationship">{{ $userpayment->paymentType->payment_type_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $userpayment->account_number }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('userpayment_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.userpayments.show', $userpayment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('userpayment_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.userpayments.edit', $userpayment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('userpayment_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $userpayment->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $userpayments->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush