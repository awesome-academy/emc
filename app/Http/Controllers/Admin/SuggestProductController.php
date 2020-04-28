<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuggestProduct;

class SuggestProductController extends Controller
{
    public function index()
    {
        $paginate = config('setting.paginate');
        $suggests = SuggestProduct::orderBy('id', 'DESC')->paginate($paginate);

        return view('admin.suggests.index', ['suggests' => $suggests]);
    }

    public function confirm($id)
    {
        try {
            $order['status'] = SuggestProduct::CONFIRM;
            SuggestProduct::where('id', '=', $id)->update($order);

            return redirect()->back()->with(['confirmSuccess' => trans('admin.confirm-success')]);
        } catch (ModelNotFoundException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function delete($id)
    {
        SuggestProduct::destroy($id);

        return redirect()->back()->with(['deleteSuggestSuccess' => trans('admin.delete-suggest-success')]);
    }
}
