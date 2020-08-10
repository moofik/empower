<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Repository\ShopRepository;
use App\User;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddWorkshopRating extends ResourceTransformer
{
    /**
     * @var ShopRepository
     */
    private $workshopRepository;

    /**
     * WorkshopCanBeRated constructor.
     * @param ShopRepository $workshopRepository
     */
    public function __construct(ShopRepository $workshopRepository)
    {
        $this->workshopRepository = $workshopRepository;
    }

    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $rating = $resource
            ->ratings()
            ->avg('rating_score');

        $data['rating'] = (float) $rating;

        return $data;
    }
}
