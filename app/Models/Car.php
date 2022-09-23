<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property int $year
 * @property int $manufactured
 * @property string $plate
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Car extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'brand',
        'model',
        'year',
        'manufactured',
        'plate',
    ];
}
