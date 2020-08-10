<?php

namespace App;

use App\Service\Database\Relations\HasPivot;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * Class WorkshopPaymentOption
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|ShopPaymentOption newModelQuery()
 * @method static Builder|ShopPaymentOption newQuery()
 * @method static Builder|ShopPaymentOption query()
 * @method static Builder|ShopPaymentOption whereCreatedAt($value)
 * @method static Builder|ShopPaymentOption whereId($value)
 * @method static Builder|ShopPaymentOption whereName($value)
 * @method static Builder|ShopPaymentOption whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ShopPaymentOption extends Model implements HasPivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_option';

    /**
     * @var array
     */
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return array
     */
    public function getPivotFields(): array
    {
        return [];
    }
}
