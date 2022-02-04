<?php

namespace App\Http\Livewire\Product;

use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Product $product;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->initListsForFields();
        $this->mediaCollections = [
            'product_main_image' => $product->main_image,
            'product_images'     => $product->images,
        ];
    }

    public function render()
    {
        return view('livewire.product.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->product->save();
        $this->syncMedia();

        return redirect()->route('admin.products.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->product->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'product.name' => [
                'string',
                'required',
            ],
            'product.desc' => [
                'string',
                'required',
            ],
            'product.sku' => [
                'string',
                'required',
            ],
            'product.category_id' => [
                'integer',
                'exists:product_categories,id',
                'required',
            ],
            'product.inventory_id' => [
                'integer',
                'exists:product_inventories,id',
                'required',
            ],
            'product.price' => [
                'numeric',
                'required',
            ],
            'mediaCollections.product_main_image' => [
                'array',
                'required',
            ],
            'mediaCollections.product_main_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.product_images' => [
                'array',
                'required',
            ],
            'mediaCollections.product_images.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'product.discount_id' => [
                'integer',
                'exists:discounts,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category']  = ProductCategory::pluck('name', 'id')->toArray();
        $this->listsForFields['inventory'] = ProductInventory::pluck('quantity', 'id')->toArray();
        $this->listsForFields['discount']  = Discount::pluck('name', 'id')->toArray();
    }
}
