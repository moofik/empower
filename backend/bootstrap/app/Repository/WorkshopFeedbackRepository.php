<?php /** @noinspection ALL */


namespace App\Repository;


use App\Service\Database\QueryFilter\ValueFilter;
use App\User;
use App\ShopFeedback;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkshopFeedbackRepository
{
    /**
     * @return ShopFeedback|null
     */
    public function findLatestFeedback(): ?ShopFeedback
    {
        return ShopFeedback::latest()->first();
    }

    /**
     * @return ShopFeedback|null
     */
    public function findLatestFeedbackForShop(int $workshopId): ?ShopFeedback
    {
        return ShopFeedback::where('shop_id', $workshopId)
            ->latest()
            ->first();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function findLatestFeedbackForCustomerWithFilter(int $customerId, ValueFilter $filter): LengthAwarePaginator
    {
        $builder = ShopFeedback::where('customer_id', $customerId);

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }

    /**
     * @param int $workshopId
     * @return LengthAwarePaginator
     */
    public function findFeedbackForShop(int $workshopId, int $limit): LengthAwarePaginator
    {
        return User::findOrFail($workshopId)
            ->feedbacks()
            ->with('image')
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    /**
     * @param int $workshopId
     * @param int $userId
     * @return int
     */
    public function countShopReviewsForUserId(int $workshopId, int $userId): int
    {
        return ShopFeedback::with('image')
            ->whereCustomerId($userId)
            ->whereShopId($workshopId)
            ->count();
    }

    /**
     * @param $limit
     * @return LengthAwarePaginator
     */
    public function findLatestFeedbacks($limit)
    {
        return ShopFeedback::latest()
            ->paginate($limit);
    }

    /**
     * @param int $shopId
     * @param ValueFilter $filter
     * @return LengthAwarePaginator
     */
    public function findLatestFeedbackForShopWithFilter(int $shopId, ValueFilter $filter)
    {
        $builder = ShopFeedback::where('shop_id', $customerId);

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }
}
