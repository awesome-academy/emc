<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = config('setting.paginate');
        $filters = request()->only('key');

        if($filters){
            $products = Product::where('name', 'like', '%'.$filters['key'].'%')
                ->orderBy('id','DESC')->paginate($paginate);
        }
        else{
            $products = $this->productRepo->paginate('id', 'DESC', $paginate);
        }

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $storage_path = storage_path(config('setting.path_image_product'));
            $image_name = 'images/products/' . $request->image->getClientOriginalName();
            $request->image->move($storage_path, $image_name);

            $product = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $image_name,
                'id_category' => $request->id_category,
            ];
            $this->productRepo->create($product);

            return redirect()->back()->with([
                'createProductSuccess' => trans('admin.create_product_success')
            ]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = $this->productRepo->findOrFail($id);
            return view('admin.products.edit', ['product' => $product]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $storage_path = storage_path(config('setting.path_image_product'));
            $image_name = 'images/products/' . $request->image->getClientOriginalName();
            $request->image->move($storage_path, $image_name);

            $product = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $image_name,
                'id_category' => $request->id_category,
            ];
            $this->productRepo->update($id, $product);

            return redirect()->back()->with([
                'updateProductSuccess' => trans('admin.update_product_success')
            ]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
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
            $this->productRepo->delete($id);

            return redirect()->back()->with([
                'deleteProductSuccess' => trans('admin.delete-product-success')
            ]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
