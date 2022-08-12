<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use Illuminate\Database\Eloquent\Model;
use App\models\Order;

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
            $this->setPageTitle('Orders', 'List of all orders');
           // $orders = Order::all();
           // $orders =  order::all();
           //dd('asdfadf');
            return view('admin.orders.index', compact('orders'));
        }

    public function show($orderNumber)
        {
            $order = $this->orderRepository->findOrderByNumber($orderNumber);

            $this->setPageTitle('Order Details', $orderNumber);
            return view('admin.orders.show', compact('order'));
        }
}
