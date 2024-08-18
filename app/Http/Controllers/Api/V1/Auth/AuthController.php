<?php
namespace App\Http\Controllers\Api\V1\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;


class AuthController extends Controller {


    /**
     * @param LoginRequest $request
     * @return \App\Http\Response\Response
     * Login function using email and password and return jwt token
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);



        $user = User::where(['email' =>$credentials['email']])->first();

        if(!$user)
            return $this->response->statusFail( "Wrong Credentials! ");


        if (! $token = auth('api')->login($user)) {
            return $this->response->statusFail(['message' => trans("Wrong Credentials! ")]);
        }
        $user->token = $token;
        $data = ['data' => new LoginResource($user), "message" => "Logged in successfully"];
        return $this->response->statusOk($data);
    }


}
