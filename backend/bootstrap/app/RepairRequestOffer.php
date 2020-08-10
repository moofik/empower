<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class RepairRequestOffer
 *
 * @package App
 * @property User $workshop
 * @property ItemRequest $repairRequest
 * @property integer $workshop_id
 * @property integer $repair_request_id
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ItemRequestOffer newModelQuery()
 * @method static Builder|ItemRequestOffer newQuery()
 * @method static Builder|ItemRequestOffer query()
 * @method static Builder|ItemRequestOffer whereCreatedAt($value)
 * @method static Builder|ItemRequestOffer whereId($value)
 * @method static Builder|ItemRequestOffer whereRepairRequestId($value)
 * @method static Builder|ItemRequestOffer whereUpdatedAt($value)
 * @method static Builder|ItemRequestOffer whereWorkshopId($value)
 * @mixin Eloquent
 */
class RepairRequestOffer extends Model
{
    protected $table = 'repair_request_offer';

    /**
     * @return BelongsTo
     */
    public function repairRequest(): BelongsTo
    {
        return $this->belongsTo(ItemRequest::class, 'repair_request_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function workshop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'workshop_id', 'id');
    }
}
