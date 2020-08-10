<?php

use App\Rating;
use App\ItemRequest;
use App\Repository\ItemRequestRepository;
use App\User;
use App\ShopFeedback;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RepairRequestSeeder extends Seeder
{
    /**
     * @var ItemRequestRepository
     */
    private $repairRequestRepository;

    /**
     * RepairRequestSeeder constructor.
     * @param ItemRequestRepository $repairRequestRepository
     */
    public function __construct(ItemRequestRepository $repairRequestRepository)
    {
        $this->repairRequestRepository = $repairRequestRepository;
    }

    /**
     * @param User $workshop
     * @param ItemRequest $request
     * @throws Exception
     */
    private function offerOrNot(User $workshop, ItemRequest $request)
    {
        if ((bool)random_int(0, 1)) {
            $request
                ->itemRequestOffers()
                ->create(['workshop_id' => $workshop->id, 'item_request_id' => $request->id]);

            $request
                ->itemRequestViewers()
                ->create(['workshop_id' => $workshop->id, 'item_request_id' => $request->id]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ItemRequest::class, 100)->create();

        /** @var User $mainWorkshop */
        $mainWorkshop = User::where('email', 'workshop@alfi.me')->first();

        $this
            ->repairRequestRepository
            ->findSuitableForShopId($mainWorkshop->id)
            ->map(function (ItemRequest $request) use ($mainWorkshop) {
                $this->offerOrNot($mainWorkshop, $request);
            });

        Role::findByName(User::USER_ROLE_SHOP)
            ->users()
            ->get()
            ->map(function (User $workshop) {
                return $this
                    ->repairRequestRepository
                    ->findSuitableForShopId($workshop->id)
                    ->map(function (ItemRequest $request) use ($workshop) {
                        $this->offerOrNot($workshop, $request);
                    });
            });

        $requests = factory(ItemRequest::class, 2)->create();

        $mainUser = User::whereEmail('user@alfi.me')->first();
        $mainWorkshop = User::whereEmail('workshop@alfi.me')->first();

        /** @var ItemRequest $request */
        foreach ($requests as $request) {
            $request->is_incoming_accepted = null;
            $request->is_incoming = true;
            $request->is_closed = false;
            $request->ownerUser()->associate($mainUser);
            $request->applicantShop()->associate($mainWorkshop);
            $request->save();
        }

        $requests = factory(ItemRequest::class, 2)->create();

        /** @var ItemRequest $request */
        foreach ($requests as $request) {
            $request->is_closed = true;
            $request->ownerUser()->associate($mainUser);
            $request->applicantShop()->associate($mainWorkshop);
            $request->save();

            $rating = new Rating();
            $rating->customer()->associate($mainUser);
            $rating->shop()->associate($mainWorkshop);
            $rating->item_request_id = $request->id;
            $rating->rating_score = 5;
            $rating->save();
        }

        $feedback = new ShopFeedback();
        $feedback->customer()->associate($mainUser);
        $feedback->shop()->associate($mainWorkshop);
        $feedback->text = app(\Faker\Generator::class)->realText(200);
        $feedback->save();
    }
}
