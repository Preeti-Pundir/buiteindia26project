<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\OrderItem;
use App\models\Item;

class Order extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
    //     'first_name', 'last_name', 'address', 'city', 'country', 'post_code', 'phone_number', 'notes'
    // ];
    protected $table ='orders';
    protected $fillable = [
                  'order_number', 'placed_by', 'total_amout',	'items_qty','Payment_status','Status'
        ];
      
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
        {
            return $this->belongsTo('App\models\Item');
        }
    // public function item(){
    //         return $this->belongsTo(Item::class,'name');
    // }
}
