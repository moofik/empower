<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class ShopWarranty
 *
 * @package App
 * @property int $job_warranty_months
 * @property int $job_warranty_driven
 * @property int $assemblies_warranty_months
 * @property int $assemblies_warranty_driven
 * @property string $additional_info
 * @property int $id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|ShopWarranty newModelQuery()
 * @method static Builder|ShopWarranty newQuery()
 * @method static Builder|ShopWarranty query()
 * @method static Builder|ShopWarranty whereAdditionalInfo($value)
 * @method static Builder|ShopWarranty whereAssembliesWarrantyDriven($value)
 * @method static Builder|ShopWarranty whereAssembliesWarrantyMonths($value)
 * @method static Builder|ShopWarranty whereCreatedAt($value)
 * @method static Builder|ShopWarranty whereId($value)
 * @method static Builder|ShopWarranty whereJobWarrantyDriven($value)
 * @method static Builder|ShopWarranty whereJobWarrantyMonths($value)
 * @method static Builder|ShopWarranty whereUpdatedAt($value)
 * @method static Builder|ShopWarranty whereUserId($value)
 * @mixin Eloquent
 */
class WorkshopWarranty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workshop_warranty';

    /**
     * @var array
     */
    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $fillable = [
        'job_warranty_months',
        'job_warranty_driven',
        'assemblies_warranty_months',
        'assemblies_warranty_driven',
        'additional_info',
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
