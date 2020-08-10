<?php


namespace App\Service\RepairRequest;


use App\ItemRequest;
use App\ItemRequestViewer;
use App\User;

class ItemRequestViewsManager
{
    /**
     * @param User $user
     * @param ItemRequest $itemRequest
     * @return ItemRequestViewer either unique or existent viewer model
     */
    public function addUniqueViewer(User $user, ItemRequest $itemRequest): ItemRequestViewer
    {
        $itemRequestViewer = $itemRequest
            ->itemRequestViewers()
            ->where('shop_id',  $user->id)
            ->where('item_request_id', $itemRequest->id)
            ->first();

        if (null === $itemRequestViewer) {
            $itemRequestViewer = new ItemRequestViewer();
            $itemRequestViewer->shop()->associate($user);
            $itemRequestViewer->itemRequest()->associate($itemRequest);
            $itemRequest->itemRequestViewers()->save($itemRequestViewer);
        }

        return $itemRequestViewer;
    }

    /**
     * @param ItemRequest $itemRequest
     * @return int
     */
    public function getViewersCountThroughRelation(ItemRequest $itemRequest): int
    {
        return $itemRequest->itemRequestViewers->count();
    }
}
