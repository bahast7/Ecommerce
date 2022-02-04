<?php

namespace App\Http\Livewire\OrderDetail;

use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public OrderDetail $orderDetail;

    public array $listsForFields = [];

    public function mount(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->orderDetail->save();

        return redirect()->route('admin.order-details.index');
    }

    protected function rules(): array
    {
        return [
            'orderDetail.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'orderDetail.total' => [
                'numeric',
                'required',
            ],
            'orderDetail.payment_id' => [
                'integer',
                'exists:payment_details,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']    = User::pluck('name', 'id')->toArray();
        $this->listsForFields['payment'] = PaymentDetail::pluck('amount', 'id')->toArray();
    }
}
