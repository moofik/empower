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
        $repairRequestViewer = $itemRequest
            ->itemRequestViewers()
            ->where('workshop_id',  $user->id)
            ->where('repair_request_id', $itemRequest->id)
            ->first();

        if (null === $repairRequestViewer) {
            $repairRequestViewer = new ItemRequestViewer();
            $repairRequestViewer->shop()->associate($user);
            $repairRequestViewer->itemRequest()->associate($itemRequest);
            $itemRequest->itemRequestViewers()->save($repairRequestViewer);
        }

        return $repairRequestViewer;
    }

    /**
     * @param ItemRequest $repairRequest
     * @return int
     */
    public function getViewersCountThroughRelation(ItemRequest $repairRequest): int
    {
        return $repairRequest->repairRequestViewers->count();
    }
}
