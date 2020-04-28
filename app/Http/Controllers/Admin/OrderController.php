<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = config('setting.paginate');
        $orders = Order::orderBy('id', 'DESC')->paginate($paginate);

        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);

            return view('admin.orders.show', ['order' => $order]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function changeStatus($status,$id)
    {
        try {
            $order['status'] = $status;
            Order::where('id', '=', $id)->update($order);
        } catch (ModelNotFoundException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function changePending($id)
    {
        $status = Order::PENDING;
        $this->changeStatus($status,$id);
        return redirect()->back();
    }

    public function changeConfirm($id)
    {
        $status = Order::CONFIRM;
        $this->changeStatus($status,$id);

        return redirect()->back();
    }

    public function changeCancel($id)
    {
        $status = Order::CANCEL;
        $this->changeStatus($status,$id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            Order::destroy($id);

            return redirect()->back()->with([
                'deleteOrderSuccess' => trans('admin.delete-order-success')
            ]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
