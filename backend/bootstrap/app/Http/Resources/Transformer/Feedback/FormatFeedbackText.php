<?php


namespace App\Http\Resources\Transformer\Feedback;


use App\Http\Resources\ShopFeedbackResource;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class FormatFeedbackText extends ResourceTransformer
{
    /**
     * @param ShopFeedbackResource $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $data['text'] = nl2br($data['text']);

        return $data;
    }
}
