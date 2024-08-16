<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

/**
 *@OA\post(
 *  path="/aoi/v1/Login",
 *  summary="Login Api",
 *tags={"Api"},
 * @OA\RequestBody(
 *          request="Request Body",
 *          description="Request Body",
 *          @OA\MediaType(
 *                  mediaType="application/json",
 *                  @OA\Schema(
 *                      @OA\Property (
 *                          property="email",
 *                          title="email",
 *                          type="string",
 *                          example="mohamedelserag4488@gmail.com",
 *                          description="Email"
 *                      ),
 *                   @OA\Property (
 *                           property="password",
 *                           title="password",
 *                           type="string",
 *                           example="123456",
 *                           description="Password"
 *                       )
 *                  )
 *          )
 *      ),
 *@OA\Response(
 *  response=200,
 *  description="Success message",
 *     content={
 *              @OA\MediaType(
 *                   mediaType="application/json",
 *                  @OA\Schema(
 *                      @OA\Property(
 *                          property="meta",
 *                          type="object",
 *                          description="Meta Data",
 *                          @OA\Property(
 *                              property="status",
 *                              type="string",
 *                              example="OK",
 *                              description="Response Status"
 *                          )
 *                      ),
 *                      @OA\Property(
 *                          property="response",
 *                          type="object",
 *                          description="Data and messages Response",
 *                          @OA\Property(
 *                               property="status",
 *                               type="string",
 *                               example="OK",
 *                               description="Response Status"
 *                           ),
 *                          @OA\Property(
 *                                property="message",
 *                                type="string",
 *                                example="User founded successfully",
 *                                description="User founded successfully"
 *                            ),
 *                          @OA\Property(
 *                              property="data",
 *                              type="object",
 *                              description="User Data",
 *                              @OA\Property(
 *                                  property="name",
 *                                  type="string",
 *                                  example="Mohamed Elserag",
 *                                  description="Admin Name"
 *                              ),
 *                              @OA\Property(
 *                                 property="email",
 *                                 type="string",
 *                                 example="admin@email.com",
 *                                 description="User founded successfully"
 *                             ),
 *                              @OA\Property(
 *                                   property="token",
 *                                   type="string",
 *                                   example="Jwt Token",
 *                                   description="Jwt Token"
 *                               ),
 *                          )
 *
 *                      )
 *              )
 *          )
 *
 *          }
 *),

 *)
 */
class LoginController extends Controller {


    /**
     * @param LoginRequest $request
     * @return \App\Http\Response\Response
     * Login function using email and password and return jwt token
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);



        $user = \App\Models\User::where(['email' =>$credentials['email']])->first();

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
