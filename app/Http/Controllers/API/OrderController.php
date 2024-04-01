<?php


namespace App\Http\Controllers\API;

use App\Helper\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::all();
        return response()->json(["message" => HttpResponses::SUCCESS->message(), "orders" => $allOrders], HttpResponses::SUCCESS->value);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => "required"
            ]
        );

        $newOrder = Order::create([
            "name" => $request->name
        ]);
        $result = [
            "message" => HttpResponse::SUCCESS->message(),
            "data" => $newOrder
        ];
        return response()->json($result, HttpResponse::SUCCESS->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $orderId)
    {

        // return response()->json([
        //     'getting orderID from function argument ' => $orderId,
        //     'getting orderID from request route method ' => $request->route('order')
        // ]);
        // $order = Order::find($request->route('order'));

        $order = Order::find($orderId);
        if (!$order) return response()->json(["message" => "order not found"], 404);

        $result = [
            "message" => "Order below",
            "data" => $order
        ];
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            "name" => $request->name
        ]);

        $result = [
            "message" => "Order Updated Successfully",
            "data" => $order
        ];
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $result = [
            "message" => "Order Deleted Successfully"
        ];
        return response()->json($result);
    }
}
