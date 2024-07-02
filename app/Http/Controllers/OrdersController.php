<?php

namespace App\Http\Controllers;

use App\Constants\OrderStatus;
use App\Constants\Role;
use App\Services\OrderService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @param OrderService
     * @param RoleService
     */
    public function __construct(OrderService $orderService, RoleService $roleService) {
        $this->orderService = $orderService;
        $this->roleService = $roleService;
    }

    public function showPage(Request $request) {
        $userRole = $this->roleService->getUserRoleByUserId(Auth::id());

        if ($userRole->role_id == Role::$USER_ID) {
            $orders = $this->orderService->getUserOrders();
            return view('orders', ['orders' => $orders]);
        }

        $orders = $this->orderService->getAll();
        return view(
            'master/orders',
            [
                'orders' => $orders,
                'statuses' => [
                    OrderStatus::$CREATED,
                    OrderStatus::$IN_PROGRESS,
                    OrderStatus::$DONE
                ]
            ]
        );
    }

    public function showOrder($id = '') {
        $userRole = $this->roleService->getUserRoleByUserId(Auth::id());

        if ($userRole->role_id == Role::$USER_ID) {
            return redirect(route('index'));
        }

        $order = $this->orderService->getById($id);

        if ($order) {
            return view(
                'master/order',
                [
                    'order' => $order,
                    'statuses' => [
                        OrderStatus::$CREATED,
                        OrderStatus::$IN_PROGRESS,
                        OrderStatus::$DONE
                    ]
                ]
            );
        }

        return redirect(route('index'));
    }

    public function createOrder(Request $request) {
        if (!$request->comment) {
            return redirect(route('orders'))->withErrors([
                'errors' => 'Заявка должна содержать описание' 
            ]);
        }

        $this->orderService->create($request->comment);
        return back()->with('success', 'Заявка успешно создана');
    }

    public function editOrder(Request $request) {
        $this->orderService->edit(
            $request->id,
            $request->status,
            $request->warranty_case,
            $request->resolution
        );
        return back()->with('success', 'Заявка успешно изменена');
    }
}
