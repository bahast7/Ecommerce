<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'order_items';

    public $orderable = [
        'id',
        'order.total',
        'product.name',
        'quantity',
    ];

    public $filterable = [
        'id',
        'order.total',
        'product.name',
        'quantity',
    ];

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function order()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
