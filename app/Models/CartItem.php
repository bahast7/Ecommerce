<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'cart_items';

    public $orderable = [
        'id',
        'session.total',
        'product.name',
        'quantity',
    ];

    public $filterable = [
        'id',
        'session.total',
        'product.name',
        'quantity',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'session_id',
        'product_id',
        'quantity',
    ];

    public function session()
    {
        return $this->belongsTo(ShoppingSession::class);
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
