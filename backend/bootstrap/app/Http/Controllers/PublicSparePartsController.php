<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublicSparePartsCollection;
use App\SparePart;
use Illuminate\Http\Request;

class PublicSparePartsController extends Controller
{
    public function spareParts()
    {
        return new PublicSparePartsCollection(SparePart::all());
    }
}
