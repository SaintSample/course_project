<?php

namespace App\Http\Controllers;

use App\Http\Resources\PassportResource;
use App\Models\Passport;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Passport::query()
            ->with($request->input('_with'));
        if ($page = $request->input('page')) {
            return \response()->json($query->paginate($page, 10)->toArray());
        } else {
            return \response()->json($query->get());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $passport = new Passport();
        $passport->fill($request->toArray());
        $passport->save();
        return \response()->json($passport->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  Passport  $passport
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Passport $passport)
    {
        return \response()->json($passport->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Passport  $passport
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Passport $passport)
    {
        $passport->fill($request->toArray());
        $passport->save();
        return \response()->json($passport->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Passport $passport
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Passport $passport): \Illuminate\Http\JsonResponse
    {
        $passport->delete();
        return \response()->json($passport->toArray());
    }
}
