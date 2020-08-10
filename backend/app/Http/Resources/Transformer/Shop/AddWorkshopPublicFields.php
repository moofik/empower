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

class AddWorkshopPublicFields extends ResourceTransformer
{
    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $paymentOptions = $resource->shopPaymentOptions;
        $data['shop_payment_options'] = new JsonResource($paymentOptions);

        $services = $resource->shopServices;
        $data['shop_services'] = new JsonResource($services);

        $spareParts = $resource->shopSpareParts;
        $data['shop_spare_parts'] = new JsonResource($spareParts);

        $schedule = $resource->shopSchedule;
        $data['shop_schedule'] = new ShopScheduleResource($schedule);

        $warranty = $resource->shopWarranty;
        $data['shop_warranty'] = new ShopWarrantyResource($warranty);

        $settings = $resource->shopSettings;
        $data['shop_settings'] = new ShopSettingsResource($settings);

        $shopImages = $resource->shopImages;
        $data['shop_logo'] = new ShopLogo($shopImages);
        $data['shop_certificates'] = new ShopCertificate($shopImages);

        foreach ($resource->shopBrands as $key => $brand) {
            $data['shop_brand'][$key] = $brand->toArray();
            $data['shop_brand'][$key]['from'] = $brand->pivot['from'];
            $data['shop_brand'][$key]['to'] = $brand->pivot['to'];
        }

        return $data;
    }
}
