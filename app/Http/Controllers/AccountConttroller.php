<?php

namespace App\Http\Controllers;

use App\Contracts\AccountRepository;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Resources\AccountResource;
use App\Http\Resources\UserResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AccountConttroller extends Controller
{

    public function __construct(public AccountRepository $accountRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return AccountResource::collection($this->accountRepository->all($request->query->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request): AccountResource|JsonResponse
    {
        $account = $this->accountRepository->store($request->validated());
        if ($account) {
            return new AccountResource($account);
        }
        return response()->json(["message" => "Could not store the account"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): AccountResource|JsonResponse
    {
        $account = $this->accountRepository->getById($id);
        if ($account) {
            return new AccountResource($account);
        }
        return response()->json(["message" => "Could not retrieve the specified resource"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAccountRequest $request, string $id)
    {
        $account = $this->accountRepository->update($id, $request->validated());
        if ($account) {
            return new AccountResource($account);
        }
        return response()->json(["message" => "Could not update the specified resource"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account): Response
    {
        $deletedAccount = $this->accountRepository->destroy($account);
        if ($deletedAccount) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        return response()->setStatusCode(Response::HTTP_BAD_REQUEST);
    }
}
