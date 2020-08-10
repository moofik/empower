<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\WorkshopFeedback
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shop_id
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $customer
 * @property-read User $shop
 * @method static Builder|ShopFeedback newModelQuery()
 * @method static Builder|ShopFeedback newQuery()
 * @method static Builder|ShopFeedback query()
 * @method static Builder|ShopFeedback whereCreatedAt($value)
 * @method static Builder|ShopFeedback whereCustomerId($value)
 * @method static Builder|ShopFeedback whereId($value)
 * @method static Builder|ShopFeedback whereShopId($value)
 * @method static Builder|ShopFeedback whereText($value)
 * @method static Builder|ShopFeedback whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Image[] $image
 * @property-read int|null $image_count
 * @property string $author
 * @method static Builder|ShopFeedback whereAuthor($value)
 */
class ShopFeedback extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_feedback';

    /**
     * Get the post's image.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

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
