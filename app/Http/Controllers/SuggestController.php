<?php

namespace App\Http\Controllers;

use App\Models\SuggestProduct;
use App\Http\Requests\SuggestProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
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
        SuggestProduct::create($suggestPro);

        return redirect()->back()->with(['suggest_success' => trans('home.suggest-success')]);
    }
}
