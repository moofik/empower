<?php


namespace App\Http\Resources\Transformer\Feedback;


use App\ShopFeedback;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddAuthorToFeedback extends ResourceTransformer
{
    /**
     * @param ShopFeedback $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $data['author'] = $resource
            ->customer
            ->full_name;

        return $data;
    }
}
