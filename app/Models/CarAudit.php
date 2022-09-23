<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $car_id
 * @property int $user_id
 * @property string $action
 * @property string $data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Car $car
 * @property User $user
 */
class CarAudit extends Model
{
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'car_id',
        'user_id',
        'action',
        'data',
    ];

    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
