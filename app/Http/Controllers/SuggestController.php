<?php

namespace App\Http\Controllers;

use App\Models\SuggestProduct;
use App\Http\Requests\SuggestProductRequest;
use App\Repositories\SuggestProduct\SuggestProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestController extends Controller
{
    protected $suggestRepo;

    public function __construct(SuggestProductRepositoryInterface $suggestRepo)
    {
        $this->middleware('auth');
        $this->suggestRepo = $suggestRepo;
    }

    public function create()
    {
        return view('suggest.create');
    }

    public function store(SuggestProductRequest $request)
    {
        $storage_path = storage_path(config('setting.path_image_suggest'));
        $image_name = 'images/products/' . $request->image->getClientOriginalName();
        $request->image->move($storage_path, $image_name);

        $suggestPro = [
            'id_user' => Auth::user()->id,
            'name_product' => $request->name_product,
            'image' => $image_name,
            'description' => $request->description,
            'status' => \App\Models\SuggestProduct::UNCONFIRM,
        ];
        $this->suggestRepo->create($suggestPro);

        return redirect()->back()->with(['suggest_success' => trans('home.suggest-success')]);
    }
}
