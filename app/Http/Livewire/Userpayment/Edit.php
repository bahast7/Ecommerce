<?php

namespace App\Http\Livewire\Userpayment;

use App\Models\Paymenttype;
use App\Models\User;
use App\Models\Userpayment;
use Livewire\Component;

class Edit extends Component
{
    public Userpayment $userpayment;

    public array $listsForFields = [];

    public function mount(Userpayment $userpayment)
    {
        $this->userpayment = $userpayment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.userpayment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->userpayment->save();

        return redirect()->route('admin.userpayments.index');
    }

    protected function rules(): array
    {
        return [
            'userpayment.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'userpayment.payment_type_id' => [
                'integer',
                'exists:paymenttypes,id',
                'required',
            ],
            'userpayment.account_number' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['payment_type'] = Paymenttype::pluck('payment_type_name', 'id')->toArray();
    }
}
