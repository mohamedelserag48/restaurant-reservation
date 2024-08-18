<?php
namespace App\Http\Controllers\Api\V1\Reservation;
use App\Http\Requests\CheckAvailabilityRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\DiningTable;
use App\Models\Reservation;
use App\Http\Controllers\Controller;


class ReservationController extends Controller {


    public function reserve(ReservationRequest $request)
    {
        try {
            $data = $request->only(['dining_table_id', 'customer_id','from_time','to_time',
                'date']);
            $checkIfCustomerReserveAtSameTime = Reservation::where(['dining_table_id' => $data['dining_table_id'],
                'customer_id' => $data['customer_id'],'date' => $data['date'],
                'from_time' => $data['from_time'], 'to_time' => $data['to_time']])->first();
            if($checkIfCustomerReserveAtSameTime){
                return $this->response->statusFail(['message' =>"Already reserved", "data" => new ReservationResource($checkIfCustomerReserveAtSameTime)]);
            }
            $reservation = Reservation::create($data);
            return $this->response->statusOk(['message' =>"Reservation saved successfully",
                "data" => new ReservationResource($reservation)]);
        }
        catch (\Exception $e){
            return $this->response->statusFail(['message' =>$e->getMessage()]);
        }

    }

    public function checkAvailability(CheckAvailabilityRequest $request)
    {
        $fromTime = $request->input('from_time');
        $toTime = $request->input('to_time');
        $date = $request->input('date');
        $guests = $request->input('guests');
        $diningTableTable = (new DiningTable)->getTable();
        $reservationTable = (new Reservation())->getTable();

        // Get Only tables that can match reservation guests number and dates not reserved at this times
        $availableTables = \DB::table($diningTableTable.' as dtable')
            ->leftJoin($reservationTable.' as reserveT', function ($join) use ($fromTime, $toTime, $date) {
                $join->on('dtable.id', '=', 'reserveT.dining_table_id')
                    ->where(function ($query) use ($fromTime, $toTime,$date) {
                        $query->whereBetween('reserveT.from_time', [$fromTime, $toTime])
                            ->orWhereBetween('reserveT.to_time', [$fromTime, $toTime])
                            ->orWhere(function ($query) use ($fromTime, $toTime) {
                                $query->where('reserveT.from_time', '<', $fromTime)
                                    ->where('reserveT.to_time', '>', $toTime);
                            })->where('reserveT.date',$date);
                    });
            })
            ->where('dtable.capacity', '>=', $guests)
            ->whereNull('reserveT.id')
            ->select('dtable.*')
            ->get();


        return $this->response->statusOk(["tables" => $availableTables]);

    }


}
