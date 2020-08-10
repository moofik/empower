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
 * App\WorkshopCertificate
 *
 * @property int $id
 * @property int $workshop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Image[] $image
 * @property-read int|null $image_count
 * @property-read User $workshop
 * @method static Builder|ShopCertificate newModelQuery()
 * @method static Builder|ShopCertificate newQuery()
 * @method static Builder|ShopCertificate query()
 * @method static Builder|ShopCertificate whereCreatedAt($value)
 * @method static Builder|ShopCertificate whereId($value)
 * @method static Builder|ShopCertificate whereUpdatedAt($value)
 * @method static Builder|ShopCertificate whereWorkshopId($value)
 * @mixin Eloquent
 */
class ShopCertificate extends Model
{
    protected $table = 'shop_certificate';

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
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }
}
