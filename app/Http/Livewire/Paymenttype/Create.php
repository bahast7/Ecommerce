<?php

namespace App\Http\Livewire\Paymenttype;

use App\Models\Paymenttype;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Paymenttype $paymenttype;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Paymenttype $paymenttype)
    {
        $this->paymenttype = $paymenttype;
    }

    public function render()
    {
        return view('livewire.paymenttype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->paymenttype->save();
        $this->syncMedia();

        return redirect()->route('admin.paymenttypes.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->paymenttype->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'paymenttype.payment_type_name' => [
                'string',
                'required',
            ],
            'paymenttype.payment_type_api_key' => [
                'string',
                'required',
            ],
            'mediaCollections.paymenttype_payment_type_image' => [
                'array',
                'required',
            ],
            'mediaCollections.paymenttype_payment_type_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
