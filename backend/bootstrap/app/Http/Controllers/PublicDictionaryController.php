<?php

namespace App\Http\Controllers;

use App\ShopSetting;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicDictionaryController extends Controller
{
    public function cities()
    {
        return new JsonResource(ShopSetting::distinct()->get('city')->pluck('city'));
    }
}
