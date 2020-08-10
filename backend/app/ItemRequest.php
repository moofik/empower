<?php

namespace App;

use App\Model\CastNullAttributes;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class ItemRequest
 *
 * @package App
 * @property integer $id
 * @property string $how_fast_time
 * @property string $drive
 * @property string $registration_number
 * @property string $city
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property boolean $is_incoming
 * @property boolean $is_incoming_accepted
 * @property Collection|ItemRequestViewer[] $repairRequestViewers
 * @property Collection|ItemRequestOffer[] $itemRequestOffers
 * @property Collection|User[] $ownerUser
 * @property int $user_id
 * @property int|null $workshop_id
 * @property int $make_id
 * @property int $service_id
 * @property int $spare_parts_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool|null $is_closed
 * @property-read User|null $applicantWorkshop
 * @property-read int|null $repair_request_offers_count
 * @property-read int|null $repair_request_viewers_count
 * @property-read ShopBrand $workshopMake
 * @property-read ShopItem $workshopService
 * @property-read SparePart $workshopSpareParts
 * @method static Builder|ItemRequest newModelQuery()
 * @method static Builder|ItemRequest newQuery()
 * @method static Builder|ItemRequest query()
 * @method static Builder|ItemRequest whereCity($value)
 * @method static Builder|ItemRequest whereCreatedAt($value)
 * @method static Builder|ItemRequest whereDescription($value)
 * @method static Builder|ItemRequest whereDrive($value)
 * @method static Builder|ItemRequest whereEmail($value)
 * @method static Builder|ItemRequest whereHowFastTime($value)
 * @method static Builder|ItemRequest whereId($value)
 * @method static Builder|ItemRequest whereIsClosed($value)
 * @method static Builder|ItemRequest whereIsIncoming($value)
 * @method static Builder|ItemRequest whereIsIncomingAccepted($value)
 * @method static Builder|ItemRequest whereMakeId($value)
 * @method static Builder|ItemRequest whereName($value)
 * @method static Builder|ItemRequest wherePhone($value)
 * @method static Builder|ItemRequest whereRegistrationNumber($value)
 * @method static Builder|ItemRequest whereServiceId($value)
 * @method static Builder|ItemRequest whereSparePartsId($value)
 * @method static Builder|ItemRequest whereUpdatedAt($value)
 * @method static Builder|ItemRequest whereUserId($value)
 * @method static Builder|ItemRequest whereWorkshopId($value)
 * @mixin Eloquent
 */
class ItemRequest extends Model
{
    use CastNullAttributes;

    protected $table = 'item_request';

    protected $with = [
        'ownerUser',
        'applicantShop',
        'shopMake',
        'shopItem',
        'shopSpareParts',
        'itemRequestViewers',
        'itemRequestOffers',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_closed' => 'boolean',
        'is_incoming' => 'boolean',
        'is_incoming_accepted' => 'boolean',
    ];

    public function ownerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function applicantShop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }

    public function shopBrand(): BelongsTo
    {
        return $this->belongsTo(ShopBrand::class, 'make_id', 'id');
    }

    public function shopItem(): BelongsTo
    {
        return $this->belongsTo(ShopItem::class, 'service_id', 'id');
    }

    public function shopSpareParts(): BelongsTo
    {
        return $this->belongsTo(SparePart::class, 'spare_parts_id', 'id');
    }

    public function itemRequestViewers(): HasMany
    {
        return $this->hasMany(ItemRequestViewer::class, 'item_request_id', 'id');
    }

    public function itemRequestOffers(): HasMany
    {
        return $this->hasMany(ItemRequestOffer::class, 'item_request_id', 'id');
    }
}
