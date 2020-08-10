<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublicMakeCollection;
use App\ShopBrand;

class PublicMakeController extends Controller
{
    public function makes()
    {
        return new PublicMakeCollection(ShopBrand::all());
    }
}
