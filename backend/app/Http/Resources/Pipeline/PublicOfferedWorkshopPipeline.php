<?php


namespace App\Http\Resources\Pipeline;


use App\Http\Resources\Policy\PublicWorkshopPolicy;
use App\Http\Resources\Transformer\Shop\AddWorkshopPublicFields;
use Moofik\LaravelResourceExtenstion\Pipeline\ExtensionPipeline;

class PublicOfferedWorkshopPipeline extends ExtensionPipeline
{
    public function __construct()
    {
        $this
            ->addPolicy(new PublicWorkshopPolicy())
            ->addTransformer(new AddWorkshopPublicFields());
    }
}
