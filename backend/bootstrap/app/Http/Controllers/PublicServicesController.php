<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublicServicesCollection;
use App\ShopItem;
use Illuminate\Http\Request;

class PublicServicesController extends Controller
{
    public function mainServices()
    {
        return new PublicServicesCollection(ShopItem::main()->get());
    }
}
