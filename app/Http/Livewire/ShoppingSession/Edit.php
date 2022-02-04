<?php

namespace App\Http\Livewire\ShoppingSession;

use App\Models\ShoppingSession;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public ShoppingSession $shoppingSession;

    public function mount(ShoppingSession $shoppingSession)
    {
        $this->shoppingSession = $shoppingSession;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.shopping-session.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->shoppingSession->save();

        return redirect()->route('admin.shopping-sessions.index');
    }

    protected function rules(): array
    {
        return [
            'shoppingSession.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'shoppingSession.total' => [
                'numeric',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
