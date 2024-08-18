<?php
namespace App\Http\Controllers\Api\V1\Meals;
use App\Http\Resources\MealsResource;
use App\Models\Meal;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;


class MealsController extends Controller {



    public function list(Request $request)
    {
        $meals = Meal::where('available_quantity', '>' ,0)->get();

        $data = ['data' => MealsResource::collection($meals)];
        return $this->response->statusOk($data);
    }


}
