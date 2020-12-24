<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = UserAddress::query();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new UserAddress();
        $address->fill($request->toArray());
        $address->save();

        return response()->json(['message' => 'Successfully registration!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $address)
    {
        $address->fill($request->toArray());
        return \response()->json($address->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $address)
    {
        $address->delete();
        return \response()->json($address->toArray());
    }
}
