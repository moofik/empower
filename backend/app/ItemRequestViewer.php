<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class RepairRequestViewer
 *
 * @package App
 * @property User $workshop
 * @property ItemRequest $repairRequest
 * @property integer $workshop_id
 * @property integer $item_request_id
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ItemRequestViewer newModelQuery()
 * @method static Builder|ItemRequestViewer newQuery()
 * @method static Builder|ItemRequestViewer query()
 * @method static Builder|ItemRequestViewer whereCreatedAt($value)
 * @method static Builder|ItemRequestViewer whereId($value)
 * @method static Builder|ItemRequestViewer whereRepairRequestId($value)
 * @method static Builder|ItemRequestViewer whereUpdatedAt($value)
 * @method static Builder|ItemRequestViewer whereWorkshopId($value)
 * @mixin Eloquent
 */
class ItemRequestViewer extends Model
{
    protected $table = 'item_request_viewer';

    /**
     * @return BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function itemRequest(): BelongsTo
    {
        return $this->belongsTo(ItemRequest::class, 'item_request_id', 'id');
    }
}
