<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuitarCollection;
use App\Http\Resources\GuitarResource;
use App\Models\Guitar;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuitarController extends Controller
{
    //GET
    //localhost:8000/api/guitars
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return GuitarResource::collection(Guitar::all());
        return new GuitarCollection(Guitar::all());
    }

    //GET
    //localhost:8000/api/guitars/{guitarID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $guitarID
     * @return \Illuminate\Http\Response
     */
    public function show($guitarID)
    {
        $guitar = Guitar::find($guitarID);
        return is_null($guitar) ? response()->json('Data not found', 404) : new GuitarResource($guitar);
    }


    //DELETE
    //localhost:8000/api/guitars/{guitarID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $guitarID
     * @return \Illuminate\Http\Response
     */
    public function destroy($guitarID)
    {
        $guitar = Guitar::where('id', $guitarID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Guitar deleted successfully.",
            "data" => $guitar
        ]);
    }
}
