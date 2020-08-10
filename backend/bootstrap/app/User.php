<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 * @property integer $id
 * @property string $email
 * @property string $new_email
 * @property string $is_new_email_confirmed
 * @property string $password
 * @property string $city
 * @property string $full_name
 * @property string $remember_token
 * @property boolean $is_workshop
 * @property float $rating
 * @property integer $created_at
 * @property integer $updated_at
 * @property-read Collection|Client[] $clients
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read Collection|Permission[] $permissions
 * @property-read Collection|Role[] $roles
 * @property-read Collection|Token[] $tokens
 * @property-read Collection|ShopBrand[] $workshopMakes
 * @property-read Collection|ShopPaymentOption[] $workshopPaymentOptions
 * @property-read Collection|ShopItem[] $workshopServices
 * @property-read Collection|SparePart[] $workshopSpareParts
 * @property-read ShopSchedule $workshopSchedule
 * @property-read ShopSetting $workshopSettings
 * @property-read ShopWarranty $workshopWarranty
 * @property-read int|null $clients_count
 * @property-read int|null $notifications_count
 * @property-read Collection|ItemRequestOffer[] $offers
 * @property-read int|null $offers_count
 * @property-read int|null $permissions_count
 * @property-read Collection|Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read Collection|ItemRequest[] $requests
 * @property-read int|null $requests_count
 * @property-read int|null $roles_count
 * @property-read int|null $tokens_count
 * @property-read int|null $workshop_makes_count
 * @property-read int|null $workshop_payment_options_count
 * @property-read int|null $workshop_services_count
 * @property-read int|null $workshop_spare_parts_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereFullName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsNewEmailConfirmed($value)
 * @method static Builder|User whereIsWorkshop($value)
 * @method static Builder|User whereNewEmail($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|ShopFeedback[] $feedbacks
 * @property-read int|null $feedbacks_count
 * @property-read Collection|ShopFeedback[] $reviews
 * @property-read int|null $reviews_count
 * @property-read Collection|ShopCertificate[] $workshopCertificates
 * @property-read int|null $workshop_certificates_count
 * @property-read ShopLogo $workshopLogo
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    public const USER_ROLE_ADMIN = 'admin';
    public const USER_ROLE_WORKSHOP = 'workshop';
    public const USER_ROLE_USER = 'user';
    public const USER_ROLE_GUEST = 'guest';
    public const USER_ROLE_MODERATOR = 'moderator';

    public const RELATION_WORKSHOP_MAKES = 'shopBrands';
    public const RELATION_WORKSHOP_PAYMENT_OPTIONS = 'shopPaymentOptions';
    public const RELATION_WORKSHOP_SERVICES = 'shopServices';
    public const RELATION_WORKSHOP_SCHEDULE = 'shopSchedule';
    public const RELATION_WORKSHOP_SETTINGS = 'shopSettings';
    public const RELATION_WORKSHOP_WARRANTY = 'shopWarranty';
    public const RELATION_WORKSHOP_SPARE_PARTS = 'shopSpareParts';
    public const RELATION_WORKSHOP_LOGO = 'shopLogo';
    public const RELATION_WORKSHOP_CERTIFICATES = 'shopCertificates';
    public const RELATION_OFFERS = 'offers';

    public const RELATIONS = [
        self::RELATION_WORKSHOP_MAKES,
        self::RELATION_WORKSHOP_PAYMENT_OPTIONS,
        self::RELATION_WORKSHOP_SERVICES,
        self::RELATION_WORKSHOP_SCHEDULE,
        self::RELATION_WORKSHOP_SETTINGS,
        self::RELATION_WORKSHOP_WARRANTY,
        self::RELATION_WORKSHOP_SPARE_PARTS,
        self::RELATION_OFFERS,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'full_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_new_email_confirmed',
        'new_email',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $casts = ['is_new_email_confirmed' => 'boolean'];

    /*********************************************************************************************************************
     *************************************** WORKSHOP RELATIONS **********************************************************
     *********************************************************************************************************************/

    /**
     * @return HasMany
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'shop_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function offers(): HasMany
    {
        return $this->hasMany(ItemRequestOffer::class, 'shop_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function shopSettings(): HasOne
    {
        return $this->hasOne(ShopSetting::class);
    }

    /**
     * @return HasOne
     */
    public function shopWarranty(): HasOne
    {
        return $this->hasOne(ShopWarranty::class);
    }

    /**
     * @return HasOne
     */
    public function shopSchedule(): HasOne
    {
        return $this->hasOne(ShopSchedule::class);
    }

    /**
     * @return HasOne
     */
    public function shopLogo(): HasOne
    {
        return $this->hasOne(ShopLogo::class, 'shop_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function shopCertificates(): HasMany
    {
        return $this->hasMany(ShopCertificate::class, 'shop_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function shopSpareParts(): BelongsToMany
    {
        return $this->belongsToMany(
            SparePart::class,
            'shops_spare_parts',
            'user_id',
            'spare_part_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function shopPaymentOptions(): BelongsToMany
    {
        return $this->belongsToMany(
            ShopPaymentOption::class,
            'shops_payment_options',
            'user_id',
            'payment_option_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function shopItems(): BelongsToMany
    {
        return $this->belongsToMany(
            ShopItem::class,
            'shops_items',
            'user_id',
            'item_request_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function shopBrands(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                ShopBrand::class,
                'shops_brands',
                'user_id',
                'shop_brand_id'
            )
            ->withPivot(['to', 'from']);
    }

    /**
     * @return HasMany
     */
    public function feedbacks(): HasMany
    {
        return $this->hasMany(ShopFeedback::class, 'shop_id', 'id');
    }

    /*********************************************************************************************************************
     *************************************** USER CUSTOMER RELATIONS *****************************************************
     *********************************************************************************************************************/

    /**
     * @return HasMany
     */
    public function requests(): HasMany
    {
        return $this->hasMany(ItemRequest::class);
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ShopFeedback::class, 'customer_id', 'id');
    }

    /*********************************************************************************************************************
     *************************************** ROLE HELPERS *****************************************************
     *********************************************************************************************************************/

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->hasRole([self::USER_ROLE_USER]);
    }

    /**
     * @return bool
     */
    public function isShop(): bool
    {
        return $this->hasRole([self::USER_ROLE_WORKSHOP]);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole([self::USER_ROLE_ADMIN]);
    }
}
