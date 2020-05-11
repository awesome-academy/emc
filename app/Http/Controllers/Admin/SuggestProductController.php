<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuggestProduct;
use App\Repositories\SuggestProduct\SuggestProductRepositoryInterface;
use Illuminate\Http\Request;

class SuggestProductController extends Controller
{
    protected $suggestRepo;

    public function __construct(SuggestProductRepositoryInterface $suggestRepo)
    {
        $this->suggestRepo = $suggestRepo;
    }
    public function index()
    {
        $paginate = config('setting.paginate');
        $suggests = $this->suggestRepo->paginate('id', 'DESC', $paginate);

        return view('admin.suggests.index', ['suggests' => $suggests]);
    }

    public function confirm($id)
    {
        try {
            $order['status'] = SuggestProduct::CONFIRM;
            $this->suggestRepo->update($id,$order);

            return redirect()->back()->with(['confirmSuccess' => trans('admin.confirm-success')]);
        } catch (ModelNotFoundException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function delete($id)
    {
        $this->suggestRepo->delete($id);

        return redirect()->back()->with(['deleteSuggestSuccess' => trans('admin.delete-suggest-success')]);
    }
}
