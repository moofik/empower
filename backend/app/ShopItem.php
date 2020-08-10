<?php

namespace App;

use App\Service\Database\Relations\HasPivot;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class Services
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property bool $is_additional
 * @method ShopItem main() get main services
 * @method ShopItem additional() get additional services
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ItemRequest[] $repairRequest
 * @property-read int|null $repair_request_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|ShopItem newModelQuery()
 * @method static Builder|ShopItem newQuery()
 * @method static Builder|ShopItem query()
 * @method static Builder|ShopItem whereCreatedAt($value)
 * @method static Builder|ShopItem whereId($value)
 * @method static Builder|ShopItem whereIsAdditional($value)
 * @method static Builder|ShopItem whereName($value)
 * @method static Builder|ShopItem whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ShopItem extends Model implements HasPivot
{
    /**
     * @var array
     */
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_item';

    /**
     * @var array
     */
    protected $fillable = ['name', 'is_additional'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function itemRequest(): HasMany
    {
        return $this->hasMany(ItemRequest::class);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeMain(Builder $query)
    {
        return $query->where('is_additional', false);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeAdditional(Builder $query)
    {
        return $query->where('is_additional', true);
    }

    /**
     * @param  int  $value
     * @return bool
     */
    public function getIsAdditionalAttribute(int $value): bool
    {
        return (bool) $value;
    }

    /**
     * @return array
     */
    public function getPivotFields(): array
    {
        return [];
    }
}

