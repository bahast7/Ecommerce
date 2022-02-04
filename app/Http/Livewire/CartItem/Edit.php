<?php

namespace App\Http\Livewire\CartItem;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingSession;
use Livewire\Component;

class Edit extends Component
{
    public CartItem $cartItem;

    public array $listsForFields = [];

    public function mount(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.cart-item.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->cartItem->save();

        return redirect()->route('admin.cart-items.index');
    }

    protected function rules(): array
    {
        return [
            'cartItem.session_id' => [
                'integer',
                'exists:shopping_sessions,id',
                'required',
            ],
            'cartItem.product_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'cartItem.quantity' => [
                'numeric',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['session'] = ShoppingSession::pluck('total', 'id')->toArray();
        $this->listsForFields['product'] = Product::pluck('name', 'id')->toArray();
    }
}
