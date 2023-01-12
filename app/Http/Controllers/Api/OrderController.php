<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartRequest;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Requests\Api\UpdateQtyRequest;
use App\Http\Resources\CartUserResource;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Repositories\Sql\ItemRepository;
use App\Repositories\Sql\NotificationRepository;
use App\Repositories\Sql\OrderRepository;
use App\Repositories\Sql\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    use ApiResponseTrait;


    protected $orderRepo , $itemRepo , $productRepo , $notificationRepo;

    public function __construct(OrderRepository $orderRepo , ItemRepository $itemRepo , ProductRepository $productRepo , NotificationRepository $notificationRepo )
    {
       $this->orderRepo = $orderRepo ;
       $this->itemRepo = $itemRepo ;
       $this->productRepo = $productRepo ;
       $this->notificationRepo = $notificationRepo ;
    }


    public function create_cart(CartRequest $request)
    {
       $product = $this->productRepo->findOne($request->product_id);

        $code = rand(1000, 9999);
        $order = $request->except( 'code', 'status_id' , 'date_waiting' , 'type');
        $order['code'] = $code;
        $order['status_id'] = 1;
        $order['type'] = 'cart';



        $cart = $this->orderRepo->findWhere(['code' => $code ]);



        if ($cart){


            $check_product = $this->itemRepo->getWhere([['product_id', $product->id], ['order_id', $cart->id]])->first();

            //start if check product
            if ($check_product) {

                $qty = $check_product->qty + $request->qty;

                $check_product->update(['qty' => $qty]);
            } else {
                $cart->items()->create([
                    'product_id' => $product->id,
                    'qty' => $request->qty,
                    'price' => $product->price,
                ]);
            } // end if check product


        } else {

            $order_id = $this->orderRepo->getWhere([['code', $order['code'] ], ['type', 'cart']])->first();

            if ($order_id) {


                $order_id->items()->create([
                    'product_id' => $product->id,
                    'qty' => $request->qty,
                    'price' => $product->price,
                ]);
            } else {

                // create new order
                $new_order = $this->orderRepo->create($order);


                // create new items
                $new_order->items()->create([
                    'product_id' => $product->id,
                    'qty' => $request->qty,
                    'price' => $product->price,
                ]);

                // update total order
                $total = $request->qty * $product->price ;
                $new_order->update([
                   'total'  => $total
                ]);

                // save order services
                $new_order->services()->sync($request->service_id);

                // send notifications database
                $this->notificationRepo->create([
                    'title_ar' => 'تم اضافه اوردر جديد' ,
                    'title_en' => 'add new order' ,
                    'order_id' => $new_order->id ,
                ]);






            }


        }


    }

    public function cart_user($order_id)
    {

         $order = $this->orderRepo->findWhere( [ ['id' , $order_id] , ['type' , 'cart'] ]);

         if($order){
            $items = $order->items;
            $data['order_code'] = $order->code;
            $date['products'] = $order->items->count();
            $data['cart']    = CartUserResource::collection($items);

            $data['total_products'] = $order->total;
            $data['total_services'] = $order->services()->sum('price');
            $data['total'] =  strval(number_format($data['total_products'] + $data['total_services'] , 2)) ;

            return $this->ApiResponse($data , '' , 200);



         }else{

            return $this->notFoundResponse();
         }


    }

    public function increase_qty(UpdateQtyRequest $request)
    {
         $item = $this->itemRepo->findWhere(['id' => $request->item_id]);
         $product = $this->productRepo->findWhere(['id' => $item->product_id]);

         if($item){
            $cart = $this->itemRepo->findWhere(['order_id' => $item->order_id]);

            $old_total = $cart->order->total ;
            $total_update = strval( number_format(($request->qty * $item->price)  ,2));
            $total = strval( ($old_total + $total_update) );
            $qty = $request->qty + $item->qty ;

            $cart->update([
               'qty' => $qty
            ]);
            $cart->order->update([
              'total' => $total
            ]);

            return $this->ApiResponse(true , '' , 200);


         }else{

            return $this->notFoundResponse();
         }
    }

    public function decrease_qty(UpdateQtyRequest $request)
    {
         $item = $this->itemRepo->findWhere(['id' => $request->item_id]);
         $product = $this->productRepo->findWhere(['id' => $item->product_id]);

         if($item){
            $cart = $this->itemRepo->findWhere(['order_id' => $item->order_id]);

            $old_total = $cart->order->total ;
            $total_update = strval( number_format(($request->qty * $item->price)  ,2));
            $total = strval( ($old_total - $total_update) );
            $qty = $request->qty - $item->qty ;

            $cart->update([
               'qty' => $qty
            ]);
            $cart->order->update([
              'total' => $total
            ]);

            return $this->ApiResponse(true , '' , 200);


         }else{

            return $this->notFoundResponse();
         }
    }

    public function delete_item($item_id)
    {
       $item = $this->itemRepo->findOne($item_id);

       if($item){

        $total_item = strval( number_format(($item->price * $item->qty) , 2) ) ;
        $total = strval(number_format(($item->order->total -  $total_item) , 2) ) ;

          $item->order->update([
            'total' =>  $total
          ]);

          $item->delete();

          return $this->ApiResponse(true , '' , 200);
       }else{
        return $this->notFoundResponse();
     }
    }

    public function create_order(OrderRequest $request , $order_id)
    {

        $order = $this->orderRepo->findOne($order_id);

        if($order){
            $order->update([
                'address' => $request->address ,
                'address_details' => $request->address_details ,
                'Payment_method' => $request->Payment_method ,
                'type' => 'order' ,
            ]);
        return $this->ApiResponse(true , 'تم اضافه الاوردر بنجاح' , 200);

        }else{
            return $this->notFoundResponse();
        }

    }


}

