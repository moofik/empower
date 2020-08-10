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
 * Class Brands
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ItemRequest[] $repairRequest
 * @property-read int|null $repair_request_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|ShopBrand newModelQuery()
 * @method static Builder|ShopBrand newQuery()
 * @method static Builder|ShopBrand query()
 * @method static Builder|ShopBrand whereCreatedAt($value)
 * @method static Builder|ShopBrand whereId($value)
 * @method static Builder|ShopBrand whereName($value)
 * @method static Builder|ShopBrand whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ShopBrand extends Model implements HasPivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_brand';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot($this->getPivotFields());
    }

    /**
     * @return HasMany
     */
    public function itemRequests(): HasMany
    {
        return $this->hasMany(ItemRequest::class);
    }

    /**
     * @return array
     */
    public function getPivotFields(): array
    {
        return ['to', 'from'];
    }
}
