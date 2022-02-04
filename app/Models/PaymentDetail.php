<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_SELECT = [
        '0' => 'pending',
        '1' => 'paid',
        '2' => 'canceled',
    ];

    public $table = 'payment_details';

    public $orderable = [
        'id',
        'amount',
        'payment_type.payment_type_name',
        'status',
    ];

    public $filterable = [
        'id',
        'amount',
        'payment_type.payment_type_name',
        'status',
    ];

    protected $fillable = [
        'amount',
        'payment_type_id',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function paymentType()
    {
        return $this->belongsTo(Paymenttype::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
