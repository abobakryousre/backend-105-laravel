<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::all();
        return response()->json(["orders" => $allOrders]);
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
            "message" => "Order Created Successfully",
            "data" => $newOrder
        ];
        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $order = Order::find($request->route('order'));
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
