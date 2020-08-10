<?php


namespace App\Http\Resources\Pipeline;


use App\Http\Resources\Policy\PublicWorkshopPolicy;
use App\Http\Resources\Transformer\Shop\AddOnlyEagerLoadedFields;
use App\Http\Resources\Transformer\Shop\AddWorkshopRating;
use App\Repository\ShopRepository;
use Moofik\LaravelResourceExtenstion\Pipeline\ExtensionPipeline;

class PublicWorkshopPipeline extends ExtensionPipeline
{
    public function __construct(ShopRepository $workshopRepository)
    {
        $this
            ->addPolicy(new PublicWorkshopPolicy())
            ->addTransformer(new AddOnlyEagerLoadedFields())
            ->addTransformer(new AddWorkshopRating($workshopRepository));
    }
}
