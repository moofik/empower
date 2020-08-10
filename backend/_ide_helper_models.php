<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * Class Services
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property bool $is_additional
 * @method ShopItem main() get main services
 * @method ShopItem additional() get additional services
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ItemRequest[] $repairRequest
 * @property-read int|null $repair_request_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|ShopItem newModelQuery()
 * @method static Builder|ShopItem newQuery()
 * @method static Builder|ShopItem query()
 * @method static Builder|ShopItem whereCreatedAt($value)
 * @method static Builder|ShopItem whereId($value)
 * @method static Builder|ShopItem whereIsAdditional($value)
 * @method static Builder|ShopItem whereName($value)
 * @method static Builder|ShopItem whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ItemRequest[] $itemRequest
 * @property-read int|null $item_request_count
 */
	class ShopItem extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ItemRequest[] $itemRequests
 * @property-read int|null $item_requests_count
 */
	class ShopBrand extends \Eloquent {}
}

namespace App{
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
 * @property-read int|null $shop_brand_count
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ShopBrand[] $shopBrands
 * @property-read int|null $shop_brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ShopCertificate[] $shopCertificates
 * @property-read int|null $shop_certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ShopItem[] $shopItems
 * @property-read int|null $shop_items_count
 * @property-read \App\ShopLogo $shopLogo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ShopPaymentOption[] $shopPaymentOptions
 * @property-read int|null $shop_payment_options_count
 * @property-read \App\ShopSchedule $shopSchedule
 * @property-read \App\ShopSetting $shopSettings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SparePart[] $shopSpareParts
 * @property-read int|null $shop_spare_parts_count
 * @property-read \App\ShopWarranty $shopWarranty
 */
	class User extends \Eloquent {}
}

namespace App{
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
 * @property-read \App\ItemRequest $itemRequest
 * @property-read \App\User $shop
 */
	class ItemRequestViewer extends \Eloquent {}
}

namespace App{
/**
 * Class RepairRequestOffer
 *
 * @package App
 * @property User $workshop
 * @property ItemRequest $repairRequest
 * @property integer $workshop_id
 * @property integer $item_request_id
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
 * @property-read \App\ItemRequest $itemRequest
 * @property-read \App\User $shop
 */
	class ItemRequestOffer extends \Eloquent {}
}

namespace App{
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
	class ShopWarranty extends \Eloquent {}
}

namespace App{
/**
 * App\WorkshopFeedback
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shop_id
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $customer
 * @property-read User $shop
 * @method static Builder|ShopFeedback newModelQuery()
 * @method static Builder|ShopFeedback newQuery()
 * @method static Builder|ShopFeedback query()
 * @method static Builder|ShopFeedback whereCreatedAt($value)
 * @method static Builder|ShopFeedback whereCustomerId($value)
 * @method static Builder|ShopFeedback whereId($value)
 * @method static Builder|ShopFeedback whereShopId($value)
 * @method static Builder|ShopFeedback whereText($value)
 * @method static Builder|ShopFeedback whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Image[] $image
 * @property-read int|null $image_count
 * @property string $author
 * @method static Builder|ShopFeedback whereAuthor($value)
 */
	class ShopFeedback extends \Eloquent {}
}

namespace App{
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
 * @property-read \App\User $shop
 */
	class ShopSetting extends \Eloquent {}
}

namespace App{
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
	class ShopSchedule extends \Eloquent {}
}

namespace App{
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
 * @property-read \App\User $applicantShop
 * @property-read int|null $item_request_offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ItemRequestViewer[] $itemRequestViewers
 * @property-read int|null $item_request_viewers_count
 * @property-read \App\ShopBrand $shopBrand
 * @property-read \App\ShopItem $shopItem
 * @property-read \App\SparePart $shopSpareParts
 */
	class ItemRequest extends \Eloquent {}
}

namespace App{
/**
 * Class WorkshopPaymentOption
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|ShopPaymentOption newModelQuery()
 * @method static Builder|ShopPaymentOption newQuery()
 * @method static Builder|ShopPaymentOption query()
 * @method static Builder|ShopPaymentOption whereCreatedAt($value)
 * @method static Builder|ShopPaymentOption whereId($value)
 * @method static Builder|ShopPaymentOption whereName($value)
 * @method static Builder|ShopPaymentOption whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class ShopPaymentOption extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ItemRequest[] $itemRequests
 * @property-read int|null $item_requests_count
 */
	class SparePart extends \Eloquent {}
}

namespace App{
/**
 * App\Rating
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shop_id
 * @property int $item_request_id
 * @property float $rating_score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $customer
 * @property-read User $shop
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating whereCreatedAt($value)
 * @method static Builder|Rating whereCustomerId($value)
 * @method static Builder|Rating whereId($value)
 * @method static Builder|Rating whereRatingScore($value)
 * @method static Builder|Rating whereRepairRequestId($value)
 * @method static Builder|Rating whereShopId($value)
 * @method static Builder|Rating whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $repair_request_id
 */
	class Rating extends \Eloquent {}
}

namespace App{
/**
 * App\WorkshopLogo
 *
 * @property-read Image $image
 * @property-read User $workshop
 * @method static Builder|ShopLogo newModelQuery()
 * @method static Builder|ShopLogo newQuery()
 * @method static Builder|ShopLogo query()
 * @mixin Eloquent
 * @property int $id
 * @property int $workshop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ShopLogo whereCreatedAt($value)
 * @method static Builder|ShopLogo whereId($value)
 * @method static Builder|ShopLogo whereUpdatedAt($value)
 * @method static Builder|ShopLogo whereWorkshopId($value)
 * @property-read \App\User $shop
 */
	class ShopLogo extends \Eloquent {}
}

namespace App{
/**
 * App\WorkshopCertificate
 *
 * @property int $id
 * @property int $workshop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Image[] $image
 * @property-read int|null $image_count
 * @property-read User $workshop
 * @method static Builder|ShopCertificate newModelQuery()
 * @method static Builder|ShopCertificate newQuery()
 * @method static Builder|ShopCertificate query()
 * @method static Builder|ShopCertificate whereCreatedAt($value)
 * @method static Builder|ShopCertificate whereId($value)
 * @method static Builder|ShopCertificate whereUpdatedAt($value)
 * @method static Builder|ShopCertificate whereWorkshopId($value)
 * @mixin Eloquent
 */
	class ShopCertificate extends \Eloquent {}
}

namespace App{
/**
 * App\Image
 *
 * @property int $id
 * @property string $url
 * @property string $imageable_type
 * @property int $imageable_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $imageable
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image query()
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image whereImageableId($value)
 * @method static Builder|Image whereImageableType($value)
 * @method static Builder|Image whereUpdatedAt($value)
 * @method static Builder|Image whereUrl($value)
 * @mixin Eloquent
 */
	class Image extends \Eloquent {}
}

