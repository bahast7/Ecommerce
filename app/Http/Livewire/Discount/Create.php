<?php

namespace App\Http\Livewire\Discount;

use App\Models\Discount;
use Livewire\Component;

class Create extends Component
{
    public Discount $discount;

    public array $listsForFields = [];

    public function mount(Discount $discount)
    {
        $this->discount         = $discount;
        $this->discount->active = '0';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.discount.create');
    }

    public function submit()
    {
        $this->validate();

        $this->discount->save();

        return redirect()->route('admin.discounts.index');
    }

    protected function rules(): array
    {
        return [
            'discount.name' => [
                'string',
                'required',
            ],
            'discount.desc' => [
                'string',
                'required',
            ],
            'discount.discount_percent' => [
                'numeric',
                'required',
            ],
            'discount.active' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['active'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['active'] = $this->discount::ACTIVE_SELECT;
    }
}
