<?php

namespace App\Http\Livewire\OrderItem;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public OrderItem $orderItem;

    public array $listsForFields = [];

    public function mount(OrderItem $orderItem)
    {
        $this->orderItem = $orderItem;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order-item.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->orderItem->save();

        return redirect()->route('admin.order-items.index');
    }

    protected function rules(): array
    {
        return [
            'orderItem.order_id' => [
                'integer',
                'exists:order_details,id',
                'required',
            ],
            'orderItem.product_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'orderItem.quantity' => [
                'numeric',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['order']   = OrderDetail::pluck('total', 'id')->toArray();
        $this->listsForFields['product'] = Product::pluck('name', 'id')->toArray();
    }
}
