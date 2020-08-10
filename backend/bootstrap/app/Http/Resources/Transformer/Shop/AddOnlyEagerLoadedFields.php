<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Http\Resources\WorkshopCertificates;
use App\Http\Resources\WorkshopLogo;
use App\Http\Resources\ShopScheduleResource;
use App\Http\Resources\ShopSettingsResource;
use App\Http\Resources\ShopWarrantyResource;
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
        if ($resource->relationLoaded('workshopPaymentOptions')) {
            $paymentOptions = $resource->workshopPaymentOptions;
            $data['workshop_payment_options'] = new JsonResource($paymentOptions);
        }

        if ($resource->relationLoaded('workshopServices')) {
            $services = $resource->workshopServices;
            $data['workshop_services'] = new JsonResource($services);
        }

        if ($resource->relationLoaded('workshopSpareParts')) {
            $spareParts = $resource->workshopSpareParts;
            $data['workshop_spare_parts'] = new JsonResource($spareParts);
        }

        if ($resource->relationLoaded('workshopSchedule')) {
            $schedule = $resource->workshopSchedule;
            $data['workshop_schedule'] = new ShopScheduleResource($schedule);
        }

        if ($resource->relationLoaded('workshopWarranty')) {
            $warranty = $resource->workshopWarranty;
            $data['workshop_warranty'] = new ShopWarrantyResource($warranty);
        }

        if ($resource->relationLoaded('workshopSettings')) {
            $settings = $resource->workshopSettings;
            $data['workshop_settings'] = new ShopSettingsResource($settings);
        }

        if ($resource->relationLoaded('workshopImages')) {
            $workshopImages = $resource->workshopImages;
            $data['workshop_logo'] = new WorkshopLogo($workshopImages);
            $data['workshop_certificates'] = new WorkshopCertificates($workshopImages);
        }

        if ($resource->relationLoaded('workshopMakes')) {
            foreach ($resource->workshopMakes as $key => $make) {
                $data['workshop_makes'][$key] = $make->toArray();
                $data['workshop_makes'][$key]['from'] = $make->pivot['from'];
                $data['workshop_makes'][$key]['to'] = $make->pivot['to'];
            }
        }

        return $data;
    }
}
