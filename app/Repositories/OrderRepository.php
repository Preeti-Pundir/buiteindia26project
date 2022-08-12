<?php

namespace App\Repositories;

//use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\cart;
use App\Contracts\OrderContract;
use App\Http\Controllers\CartData\CartDataController;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>    Auth::user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,

        ]);

        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum(),
                    'user_id'           =>    Auth::user()->id,
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {

        return Order::where('order_number', $orderNumber)->with(['items'=>function($q){
            $q->with(['order_lot']);
        }])->first();
    }
    public function storeOrderDetailsApi($params)
    {
        $cart = new CartDataController;
        // return get_usermeta_by_key($params['user_id'],'market_id');
        $market_id = get_usermeta_by_key($params['user_id'],'market_id');
        // return 'market_id: '. $market_id;
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => $params['user_id'],
            'status'            =>  'pending',
            'grand_total'       =>  $cart->getTotal($params['user_id']),
            'item_count'        =>  $cart->getTotalQuantity($params['user_id']),
            'payment_status'    =>  0,
            'payment_method'    =>  'test',
            'market_id'         => $market_id,

        ]);

        if ($order) {


            $items =  $cart->get($params['user_id']);
            if( is_array($items) ){
                foreach ($items as $item){
                    // A better way will be to bring the product id with the cart items
                    // you can explore the package documentation to send product id with the cart
                    $product = Product::where('name', $item->name)->first();
                    $totalPriceForEach =$item->quantity * $item->price;
                    $totalPriceForEach = round($totalPriceForEach, 2);
                    $orderItem = new OrderItem([
                        'product_id'    =>  $product->id,
                        'quantity'      =>  $item->quantity,
                        'user_id'           =>   $params['user_id'],
                        'price'         => $totalPriceForEach
                    ]);

                    $order->items()->save($orderItem);
                }
            }else{
                $product = Product::where('name', $items->name)->first();
                $totalPriceForEach =$items->quantity * $items->price;
                $totalPriceForEach = round($totalPriceForEach, 2);
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $items->quantity,
                    'user_id'           =>   $params['user_id'],
                    'price'         => $totalPriceForEach
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;
    }
   
}

