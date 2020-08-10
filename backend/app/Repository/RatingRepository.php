<?php


namespace App\Repository;


use App\Rating;

class RatingRepository
{
    /**
     * @param int $shopId
     * @param int $customerId
     * @return Rating|null
     */
    public function getLastRatingForShopAndCustomer(int $shopId, int $customerId): ?Rating
    {
        return Rating::where('shop_id', $shopId)
            ->where('customer_id', $customerId)
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->first();
    }
}
