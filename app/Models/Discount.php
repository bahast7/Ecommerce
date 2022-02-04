<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const ACTIVE_SELECT = [
        '0' => 'disable',
        '1' => 'active',
    ];

    public $table = 'discounts';

    public $orderable = [
        'id',
        'name',
        'desc',
        'discount_percent',
        'active',
    ];

    public $filterable = [
        'id',
        'name',
        'desc',
        'discount_percent',
        'active',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'desc',
        'discount_percent',
        'active',
    ];

    public function getActiveLabelAttribute($value)
    {
        return static::ACTIVE_SELECT[$this->active] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
