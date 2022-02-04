<?php

namespace App\Http\Livewire\ProductInventory;

use App\Models\ProductInventory;
use Livewire\Component;

class Create extends Component
{
    public ProductInventory $productInventory;

    public function mount(ProductInventory $productInventory)
    {
        $this->productInventory = $productInventory;
    }

    public function render()
    {
        return view('livewire.product-inventory.create');
    }

    public function submit()
    {
        $this->validate();

        $this->productInventory->save();

        return redirect()->route('admin.product-inventories.index');
    }

    protected function rules(): array
    {
        return [
            'productInventory.quantity' => [
                'numeric',
                'required',
            ],
        ];
    }
}
