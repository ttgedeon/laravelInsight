<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Contracts\UserRepository;
use Carbon\Carbon;

class RegisteredUser extends Controller
{
    public function __construct(
        public UserRepository $userRepository
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreUserRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $this->userRepository->store($request->validated());
        return response()->json([
            "token" => $user->createToken($user->email, expiresAt: Carbon::now()->addWeek())->plainTextToken,
            "user" => new UserResource($user)
        ]);

    }
}
