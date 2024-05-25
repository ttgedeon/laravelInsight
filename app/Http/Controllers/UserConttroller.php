<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepository;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\User;

class UserConttroller extends Controller
{
    public function __construct(public UserRepository $userRepository)
    {
        // $this->middleware("auth")->only(['index', "show", "store", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        return UserResource::collection($this->userRepository->all($request->query->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): UserResource|JsonResponse
    {
        $user = $this->userRepository->store($request->validated());
        if ($user) {
            return new UserResource($user);
        }
        return response()->json(["message" => "Could not store the resource"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): UserResource|JsonResponse
    {
        $user = $this->userRepository->getById($id);
        if ($user) {
            return new UserResource($user);
        }
        return response()->json(["message" => "Could not find the resource"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): UserResource|JsonResponse
    {
        $user = $this->userRepository->update($user, $request->validated());
        if ($user) {
            return new UserResource($user);
        }
        return response()->json(["message" => "Could not update the resource"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): Response
    {
        $deleteUser = $user->delete();
        if ($deleteUser) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        return response()->setStatusCode(Response::HTTP_BAD_REQUEST);
    }
}
