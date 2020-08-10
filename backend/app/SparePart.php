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
 * Class ShopSpareParts
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
 * @method static Builder|SparePart newModelQuery()
 * @method static Builder|SparePart newQuery()
 * @method static Builder|SparePart query()
 * @method static Builder|SparePart whereCreatedAt($value)
 * @method static Builder|SparePart whereId($value)
 * @method static Builder|SparePart whereName($value)
 * @method static Builder|SparePart whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SparePart extends Model implements HasPivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spare_part';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'shops_spare_parts',
            'spare_part_id',
            'user_id'
        );
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
        return [];
    }
}
