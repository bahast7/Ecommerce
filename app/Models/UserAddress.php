<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'user_addresses';

    public $orderable = [
        'id',
        'user.name',
        'address_line_one',
        'address_line_two',
        'city',
        'postal_code',
        'country',
        'phone_number',
    ];

    public $filterable = [
        'id',
        'user.name',
        'address_line_one',
        'address_line_two',
        'city',
        'postal_code',
        'country',
        'phone_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'address_line_one',
        'address_line_two',
        'city',
        'postal_code',
        'country',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
