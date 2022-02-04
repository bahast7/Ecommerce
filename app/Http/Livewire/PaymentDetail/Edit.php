<?php

namespace App\Http\Livewire\PaymentDetail;

use App\Models\PaymentDetail;
use App\Models\Paymenttype;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public PaymentDetail $paymentDetail;

    public function mount(PaymentDetail $paymentDetail)
    {
        $this->paymentDetail = $paymentDetail;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->paymentDetail->save();

        return redirect()->route('admin.payment-details.index');
    }

    protected function rules(): array
    {
        return [
            'paymentDetail.amount' => [
                'numeric',
                'required',
            ],
            'paymentDetail.payment_type_id' => [
                'integer',
                'exists:paymenttypes,id',
                'required',
            ],
            'paymentDetail.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['payment_type'] = Paymenttype::pluck('payment_type_name', 'id')->toArray();
        $this->listsForFields['status']       = $this->paymentDetail::STATUS_SELECT;
    }
}
