<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsernameRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    use ApiResponse;

    public function storeUsername(UsernameRequest $request) {
        try {
            $name = $request->validated('name');
            User::create(['name' => $name]);
            return $this->successResponse(
                ['username' => $name],
                "Welcome $name!",
                201
            );
        } catch (\Exception $exception) {
            Log::error("store username\n" . $exception->getMessage());
            return $this->errorResponse('Something went wrong', 500);
        }
    }

    public function updateInfo(UpdateUserRequest $request) {
        try {
            $user = User::where('name', $request->name)->first();
            $data = $request->validated();
            $user->update($data);
            return $this->successResponse(['user' => $user], 'Data has been updated');
        } catch (\Exception $exception) {
            Log::error("update info\n" . $exception->getMessage());
            return $this->errorResponse('Something went wrong', 500);
        }
    }

}
