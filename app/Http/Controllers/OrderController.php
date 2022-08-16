<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use Illuminate\Database\Eloquent\Model;
//use App\models\Order;
Use App\Models\Order;
Use App\Models\product;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
        {
            $orders = $this->orderRepository->listOrders();
           // $this->setPageTitle('Orders', 'List of all orders');
           
            //$orders =  order::all();
           //dd('asdfadf');
           
            return view('admin.orders.index', compact('orders'));
        }

    //     public function index()
    // {
    //     // $orders = auth()->user()->orders; // n + 1 issues

    //     $orders = auth()->user()->orders()->with('products')->get(); // fix n + 1 issues

    //     return view('my-orders')->with('orders', $orders);
    // }

    public function show($orderNumber)
        {
            $order = $this->orderRepository->findOrderByNumber($orderNumber);

            //$this->setPageTitle('Order Details', $orderNumber);
            return view('admin.orders.show', compact('order'));
        }

    //     public function show(Order $order)
    // {
    //     if (auth()->id() !== $order->user_id) {
    //         return back()->withErrors('You do not have access to this!');
    //     }

    //     $products = $order->products;

    //     return view('my-order')->with([
    //         'order' => $order,
    //         'products' => $products,
    //     ]);
    // }
}
