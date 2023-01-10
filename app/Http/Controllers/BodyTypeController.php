<?php

namespace App\Http\Controllers;

use App\Http\Resources\BodyTypeCollection;
use App\Http\Resources\BodyTypeResource;
use App\Models\BodyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BodyTypeController extends Controller
{
    //GET
    //localhost:8000/api/bodyTypes
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return BodyTypeResource::collection(BodyType::all());
        return new BodyTypeCollection(BodyType::all());
    }


    //POST
    //localhost:8000/api/bodyTypes
    //BODY = BodyType Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $bodyType = BodyType::create($input);
        return response()->json([
            "success" => true,
            "message" => "Body Type created successfully.",
            "data" => $bodyType
        ]);
    }

    //GET
    //localhost:8000/api/bodyTypes/{bodyTypeID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    public function show($bodyTypeID)
    {
        $bodyType = BodyType::find($bodyTypeID);
        return is_null($bodyType) ? response()->json('Data not found', 404) : new BodyTypeResource($bodyType);
    }


    //PUT/PATCH
    //localhost:8000/api/bodyTypes/{bodyTypeID}
    //BODY = BodyType Model

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodyType $bodyType)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'number_of_strings' => 'required|integer',
            'is_electric' => 'required|boolean',
            'orientation' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $bodyType->name = $input['name'];
        $bodyType->number_of_strings = $input['number_of_strings'];
        $bodyType->is_electric = $input['is_electric'];
        $bodyType->orientation = $input['orientation'];
        $bodyType->save();
        return response()->json([
            "success" => true,
            "message" => "Body Type updated successfully.",
            "data" => $bodyType
        ]);
    }


    //DELETE
    //localhost:8000/api/bodyTypes/{bodyTypeID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $bodyTypeID
     * @return \Illuminate\Http\Response
     */
    public function destroy($bodyTypeID)
    {
        $bodyType = BodyType::where('id', $bodyTypeID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Body Type deleted successfully.",
            "data" => $bodyType
        ]);
    }
}
