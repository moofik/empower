<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Http\Resources\WorkshopCertificates;
use App\Http\Resources\WorkshopLogo;
use App\Http\Resources\ShopScheduleResource;
use App\Http\Resources\ShopSettingsResource;
use App\Http\Resources\ShopWarrantyResource;
use App\ShopCertificate;
use App\ShopLogo;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddOnlyEagerLoadedFields extends ResourceTransformer
{
    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        if ($resource->relationLoaded('shopPaymentOptions')) {
            $paymentOptions = $resource->shopPaymentOptions;
            $data['shop_payment_options'] = new JsonResource($paymentOptions);
        }

        if ($resource->relationLoaded('shopServices')) {
            $services = $resource->shopServices;
            $data['shop_services'] = new JsonResource($services);
        }

        if ($resource->relationLoaded('shopSpareParts')) {
            $spareParts = $resource->shopSpareParts;
            $data['shop_spare_parts'] = new JsonResource($spareParts);
        }

        if ($resource->relationLoaded('shopSchedule')) {
            $schedule = $resource->shopSchedule;
            $data['shop_schedule'] = new ShopScheduleResource($schedule);
        }

        if ($resource->relationLoaded('shopWarranty')) {
            $warranty = $resource->shopWarranty;
            $data['shop_warranty'] = new ShopWarrantyResource($warranty);
        }

        if ($resource->relationLoaded('shopSettings')) {
            $settings = $resource->shopSettings;
            $data['shop_settings'] = new ShopSettingsResource($settings);
        }

        if ($resource->relationLoaded('workshopImages')) {
            $workshopImages = $resource->shopImages;
            $data['shop_logo'] = new ShopLogo($workshopImages);
            $data['shop_certificates'] = new ShopCertificate($workshopImages);
        }

        if ($resource->relationLoaded('shopBrands')) {
            foreach ($resource->shopBrands as $key => $make) {
                $data['shop_brand'][$key] = $make->toArray();
                $data['shop_brand'][$key]['from'] = $make->pivot['from'];
                $data['shop_brand'][$key]['to'] = $make->pivot['to'];
            }
        }

        return $data;
    }
}
