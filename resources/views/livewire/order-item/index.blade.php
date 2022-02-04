<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('order_item_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OrderItem" format="csv" />
                <livewire:excel-export model="OrderItem" format="xlsx" />
                <livewire:excel-export model="OrderItem" format="pdf" />
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
                            {{ trans('cruds.orderItem.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.order') }}
                            @include('components.table.sort', ['field' => 'order.total'])
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.product') }}
                            @include('components.table.sort', ['field' => 'product.name'])
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.quantity') }}
                            @include('components.table.sort', ['field' => 'quantity'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orderItems as $orderItem)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $orderItem->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $orderItem->id }}
                            </td>
                            <td>
                                @if($orderItem->order)
                                    <span class="badge badge-relationship">{{ $orderItem->order->total ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($orderItem->product)
                                    <span class="badge badge-relationship">{{ $orderItem->product->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $orderItem->quantity }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('order_item_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.order-items.show', $orderItem) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('order_item_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.order-items.edit', $orderItem) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('order_item_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $orderItem->id }})" wire:loading.attr="disabled">
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
            {{ $orderItems->links() }}
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