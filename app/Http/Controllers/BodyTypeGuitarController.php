<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Http\Request;

class BodyTypeGuitarController extends Controller
{
    public function index($bodyTypeID)
    {
        $guitars = Guitar::get()->where('body_type_id', $bodyTypeID);
        if(is_null($guitars)) {
            return response()->json('Data not found', 404);
        }
        return $guitars;
    }
}
