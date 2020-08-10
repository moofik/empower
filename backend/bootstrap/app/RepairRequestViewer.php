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
 * @property integer $repair_request_id
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
class RepairRequestViewer extends Model
{
    protected $table = 'repair_request_viewer';

    /**
     * @return BelongsTo
     */
    public function workshop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'workshop_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function repairRequest(): BelongsTo
    {
        return $this->belongsTo(ItemRequest::class, 'repair_request_id', 'id');
    }
}
