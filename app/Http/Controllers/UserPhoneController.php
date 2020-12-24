<?php

namespace App\Http\Controllers;

use App\Models\UserPhone;
use Illuminate\Http\Request;

class UserPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = UserPhone::query();
        if ($page = $request->input('page')) {
            return \response()->json($query->paginate($page, 10)->toArray());
        } else {
            return \response()->json($query->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = new UserPhone();
        $phone->fill($request->toArray());
        $phone->save();

        return response()->json(['message' => 'Successfully registration!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserAddress $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPhone $phone)
    {
        $phone->fill($request->toArray());
        return \response()->json($phone->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserPhone $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPhone $phone)
    {
        $phone->delete();
        return \response()->json($phone->toArray());
    }
}
