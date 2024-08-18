<?php
namespace App\Http\Controllers\Api\V1\Order;
use App\Http\Requests\CheckAvailabilityRequest;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\AppConfig;
use App\Models\DiningTable;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class OrderController extends Controller {



    public function order(OrderRequest $request)
    {
        try {
            $orderData = $request->only(["reservation_id","dining_table_id","date"]);
            $mealsData = collect($request->get("meals"));
            $orderData["user_id"] = auth('api')->user()->id;
            $orderData["date"] = Carbon::now();
            $orderData['total'] = 0;
            $meals = Meal::whereIn("id", $mealsData->pluck('meal_id')->toArray())->get();
            $orderDetails = [];
            foreach ($meals as $meal) {
                $mealDiscount = $meal->discount / 100 * $meal->price ;
                $amount_to_pay = ($meal->price - $mealDiscount)  * $mealsData->firstWhere('meal_id', $meal->id)["count"];
                $orderData['total'] += $amount_to_pay;
                $meal->available_quantity = $meal->available_quantity -  $mealsData->firstWhere('meal_id', $meal->id)["count"];
                $meal->save();
                $orderDetails[] = [
                    'meal_id' => $meal->id,
                    'count' => $mealsData->firstWhere('meal_id', $meal->id)["count"],
                    'amount_to_pay' =>$amount_to_pay,
                ];
            }
            $order = Order::create($orderData);
            $orderDetails = array_map(function ($detail) use ($order) {
                return array_merge($detail, ['order_id' => $order->id]);
            }, $orderDetails);
            OrderDetails::insert($orderDetails);

            return $this->response->statusOk("Orders successfully");
        }
        catch (\Exception $e){
            return $this->response->statusFail(['message' =>$e->getMessage()]);
        }

    }

    public function checkout(CheckoutRequest $request)
    {
        try {
            $taxesCheck = AppConfig::where("key", "taxes_enabled")->first();
            $order = Order::with(["orderDetails","reservation","diningtable"])->findOrFail($request->input("order_id"));
            if($taxesCheck && $taxesCheck->value){
                $order->taxes = $order->total * 0.14 ;
                $order->service = $order->total * 0.20 ;
            }
            else{
                $order->service = $order->total * 0.15 ;
            }
            $order->save();
            return $this->response->statusOk(["order" => new OrderResource($order)]);

        }catch (\Exception $e){
            return $this->response->statusFail(['message' =>$e->getMessage()]);
        }
    }



}
