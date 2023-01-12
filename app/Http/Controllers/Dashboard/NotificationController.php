<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\API\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Sql\NotificationRepository;
use App\Repositories\Sql\OrderRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    

    protected $notificatiohRepo , $orderRepo;

    public function __construct(NotificationRepository $notificatiohRepo , OrderRepository $orderRepo)
    {
          $this->notificatiohRepo = $notificatiohRepo ;
          $this->orderRepo = $orderRepo ;
    }

    public function order_notificication($id)
    {
        $notification = $this->notificatiohRepo->findOne($id);

        $notification->update([
           'read' => 1
        ]);

        $order = $this->orderRepo->findWhere(['id' => $notification->order_id ]);
        return view('dashboard.backend.orders.show' , compact('order'));



    }

    public function clear_all_notifications()
    {

        $notifications = $this->notificatiohRepo->getWhere(['read' => 0]);
        foreach ($notifications as $key => $notification) {
            $notification->update([
                'read' => 1
            ]);
        }

        return redirect()->back();

    }
}
