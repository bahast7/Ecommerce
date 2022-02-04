<?php

namespace App\Http\Livewire\UserAddress;

use App\Models\User;
use App\Models\UserAddress;
use Livewire\Component;

class Edit extends Component
{
    public UserAddress $userAddress;

    public array $listsForFields = [];

    public function mount(UserAddress $userAddress)
    {
        $this->userAddress = $userAddress;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user-address.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->userAddress->save();

        return redirect()->route('admin.user-addresses.index');
    }

    protected function rules(): array
    {
        return [
            'userAddress.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'userAddress.address_line_one' => [
                'string',
                'required',
            ],
            'userAddress.address_line_two' => [
                'string',
                'nullable',
            ],
            'userAddress.city' => [
                'string',
                'required',
            ],
            'userAddress.postal_code' => [
                'string',
                'nullable',
            ],
            'userAddress.country' => [
                'string',
                'required',
            ],
            'userAddress.phone_number' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
