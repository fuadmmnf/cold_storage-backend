<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Delivery\CreateDeliveryRequest;
use App\Http\Requests\Delivery\CreateGatepassRequest;
use App\Repositories\Interfaces\DeliveryRepositoryInterface;
use Illuminate\Http\Request;

class DeliveryController extends ApiController
{
    //
    private $deliveryRepository;

    /**
     * DeliveryController constructor.
     */
    public function __construct(DeliveryRepositoryInterface $deliveryRepository)
    {
        $this->middleware('auth:api');
        $this->deliveryRepository = $deliveryRepository;
    }

    public function fetchRecentDeliveries(){
        $deliveries = $this->deliveryRepository->getRecentDeliveries();
        return response()->json($deliveries);
    }

    public function createDelivery(CreateDeliveryRequest $request){

        $delivery = $this->deliveryRepository->saveDelivery($request->validated());
        if(!$delivery){
            return response()->json('delivery limit exceeding bags left', 400);
        }
        return response()->json($delivery, 201);
    }


    public function createDeliveryGatepass(CreateGatepassRequest $request){
        $gatepass = $this->deliveryRepository->saveGatepass($request->validated());
        return response()->json($gatepass, 201);
    }
}
