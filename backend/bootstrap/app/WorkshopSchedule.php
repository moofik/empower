<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class ShopSchedule
 *
 * @package App
 * @property string $monday_active
 * @property string $monday_from
 * @property string $monday_to
 * @property string $tuesday_active
 * @property string $tuesday_from
 * @property string $tuesday_to
 * @property string $wednesday_active
 * @property string $wednesday_from
 * @property string $wednesday_to
 * @property string $thursday_from
 * @property string $thursday_active
 * @property string $thursday_to
 * @property string $friday_from
 * @property string $friday_active
 * @property string $friday_to
 * @property string $saturday_active
 * @property string $saturday_from
 * @property string $saturday_to
 * @property string $sunday_active
 * @property string $sunday_from
 * @property string $sunday_to
 * @property int $id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|ShopSchedule newModelQuery()
 * @method static Builder|ShopSchedule newQuery()
 * @method static Builder|ShopSchedule query()
 * @method static Builder|ShopSchedule whereCreatedAt($value)
 * @method static Builder|ShopSchedule whereFridayActive($value)
 * @method static Builder|ShopSchedule whereFridayFrom($value)
 * @method static Builder|ShopSchedule whereFridayTo($value)
 * @method static Builder|ShopSchedule whereId($value)
 * @method static Builder|ShopSchedule whereMondayActive($value)
 * @method static Builder|ShopSchedule whereMondayFrom($value)
 * @method static Builder|ShopSchedule whereMondayTo($value)
 * @method static Builder|ShopSchedule whereSaturdayActive($value)
 * @method static Builder|ShopSchedule whereSaturdayFrom($value)
 * @method static Builder|ShopSchedule whereSaturdayTo($value)
 * @method static Builder|ShopSchedule whereSundayActive($value)
 * @method static Builder|ShopSchedule whereSundayFrom($value)
 * @method static Builder|ShopSchedule whereSundayTo($value)
 * @method static Builder|ShopSchedule whereThursdayActive($value)
 * @method static Builder|ShopSchedule whereThursdayFrom($value)
 * @method static Builder|ShopSchedule whereThursdayTo($value)
 * @method static Builder|ShopSchedule whereTuesdayActive($value)
 * @method static Builder|ShopSchedule whereTuesdayFrom($value)
 * @method static Builder|ShopSchedule whereTuesdayTo($value)
 * @method static Builder|ShopSchedule whereUpdatedAt($value)
 * @method static Builder|ShopSchedule whereUserId($value)
 * @method static Builder|ShopSchedule whereWednesdayActive($value)
 * @method static Builder|ShopSchedule whereWednesdayFrom($value)
 * @method static Builder|ShopSchedule whereWednesdayTo($value)
 * @mixin Eloquent
 */
class WorkshopSchedule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workshop_schedule';

    /**
     * @var array
     */
    protected $hidden = ['user_id', 'id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = [
        'monday_active' => 'boolean',
        'tuesday_active' => 'boolean',
        'wednesday_active' => 'boolean',
        'thursday_active' => 'boolean',
        'friday_active' => 'boolean',
        'saturday_active' => 'boolean',
        'sunday_active' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'monday_active',
        'monday_from',
        'monday_to',
        'tuesday_active',
        'tuesday_from',
        'tuesday_to',
        'wednesday_active',
        'wednesday_from',
        'wednesday_to',
        'thursday_active',
        'thursday_from',
        'thursday_to',
        'friday_active',
        'friday_from',
        'friday_to',
        'saturday_active',
        'saturday_from',
        'saturday_to',
        'sunday_active',
        'sunday_from',
        'sunday_to',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
