<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = User::query();
        if ($relations = $request->input('_with')) {
            $query->with($relations);
        }
        if ($page = $request->input('page')) {
            return \response()->json($query->paginate(10)->toArray());
        } else {
            return \response()->json($query->get()->toArray());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return \response()->json($user->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return UserResource
     */
    public function update(Request $request, User $user): Response
    {
        $fillable = $user->getFillable();
        $user->fillable($fillable)->fill($request->only($fillable));
        $user->save();

        return new UserResource($user);

    }
}
