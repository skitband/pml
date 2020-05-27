<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pizza;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('pages.index' , [ "orders" => $orders ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pizzas = $request->pizza_size;
        $order = new Order;

        $order->amount = $request->totalAmount;
        $order->save();

        $dataSet = [];

        foreach($request->pizza_size as $key => $pizza){
            
            $dataSet[] = [
                'order_id' => $order->id,
                'pizza_size' => ( $request->pizza_size[$key] == '100' ) ? 'Small' : (( $request->pizza_size[$key] == '150' ) ? 'Medium' : 'Large'),
                'pizza_type' => $request->pizza_type[$key],
                'pizza_crust' => $request->pizza_crust[$key],
                'topping_whole' => ($request->filled('topping_whole')) ? implode(", ", $request->topping_whole) : '',
                'topping_firsthalf' => ($request->filled('topping_firsthalf')) ? implode(", ", $request->topping_firsthalf) : '',
                'topping_secondhalf' => ($request->filled('topping_secondhalf')) ? implode(", ", $request->topping_secondhalf) : '',
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' =>  \Carbon\Carbon::now(),
            ];
        }

        Pizza::insert($dataSet);

        $message = array('message' => 'Success! Order Placed');
        return redirect()->back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        //
        $data = Order::find($order)->pizzas;

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
