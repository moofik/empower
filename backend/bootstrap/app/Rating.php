<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Rating
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shop_id
 * @property int $repair_request_id
 * @property float $rating_score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $customer
 * @property-read User $shop
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating whereCreatedAt($value)
 * @method static Builder|Rating whereCustomerId($value)
 * @method static Builder|Rating whereId($value)
 * @method static Builder|Rating whereRatingScore($value)
 * @method static Builder|Rating whereRepairRequestId($value)
 * @method static Builder|Rating whereShopId($value)
 * @method static Builder|Rating whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Rating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rating';

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }
}
