<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Requests\SportRequest;
use App\Http\Resources\SportResource;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return SportResource::collection(Sport::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SportRequest $request)
    {
        $sport = Sport::create($request->validated());

        return new SportResource($sport);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        //
        return new SportResource($sport);
    }


    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $validator = Validator::make($input, [
    //         'title' => 'required',
    //         'description' => 'required'
    //     ]);
    //     if($validator->fails()){
    //         return $this->sendError($validator->errors());       
    //     }
    //     $blog = Blog::create($input);
    //     return $this->sendResponse(new BlogResource($blog), 'Post created.');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(SportRequest $request, Sport $sport)
    {
        $sport->update($request->validated());

        return new SportResource($sport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
        $sport->delete();
        return response()->noContent();
    }
}
