<?php

namespace App;

use DateTimeInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class ShopSettings
 *
 * @package App
 * @property int $id
 * @property string $workshop_name
 * @property string $workshop_address
 * @property string $company_name
 * @property string $zip_code
 * @property string $business_id
 * @property string $city
 * @property string $workshop_phone
 * @property integer $employee
 * @property DateTimeInterface $founded
 * @property string $marketingText
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|ShopSetting newModelQuery()
 * @method static Builder|ShopSetting newQuery()
 * @method static Builder|ShopSetting query()
 * @method static Builder|ShopSetting whereBusinessId($value)
 * @method static Builder|ShopSetting whereCity($value)
 * @method static Builder|ShopSetting whereCompanyName($value)
 * @method static Builder|ShopSetting whereCreatedAt($value)
 * @method static Builder|ShopSetting whereEmployee($value)
 * @method static Builder|ShopSetting whereFounded($value)
 * @method static Builder|ShopSetting whereId($value)
 * @method static Builder|ShopSetting whereUpdatedAt($value)
 * @method static Builder|ShopSetting whereUserId($value)
 * @method static Builder|ShopSetting whereWorkshopAddress($value)
 * @method static Builder|ShopSetting whereWorkshopName($value)
 * @method static Builder|ShopSetting whereWorkshopPhone($value)
 * @method static Builder|ShopSetting whereZipCode($value)
 * @mixin Eloquent
 * @property-read User $workshop
 */
class ShopSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_setting';

    /**
     * @var array
     */
    protected $fillable = [
        'shop_name',
        'shop_address',
        'company_name',
        'zip_code',
        'business_id',
        'city',
        'shop_phone',
        'employee',
        'founded'
    ];

    /**
     * @var array
     */
    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = ['founded' => 'datetime:Y'];

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(User::class);
    }
}
