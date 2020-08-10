<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\WorkshopLogo
 *
 * @property-read Image $image
 * @property-read User $workshop
 * @method static Builder|ShopLogo newModelQuery()
 * @method static Builder|ShopLogo newQuery()
 * @method static Builder|ShopLogo query()
 * @mixin Eloquent
 * @property int $id
 * @property int $workshop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ShopLogo whereCreatedAt($value)
 * @method static Builder|ShopLogo whereId($value)
 * @method static Builder|ShopLogo whereUpdatedAt($value)
 * @method static Builder|ShopLogo whereWorkshopId($value)
 */
class ShopLogo extends Model
{
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
    public function workshop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'workshop_id', 'id');
    }
}
