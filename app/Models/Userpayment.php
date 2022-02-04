<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userpayment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'userpayments';

    public $orderable = [
        'id',
        'user.name',
        'payment_type.payment_type_name',
        'account_number',
    ];

    public $filterable = [
        'id',
        'user.name',
        'payment_type.payment_type_name',
        'account_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'payment_type_id',
        'account_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(Paymenttype::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
