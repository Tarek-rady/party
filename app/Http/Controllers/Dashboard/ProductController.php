<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Size;
use App\Repositories\Sql\CategoryRepository;
use App\Repositories\Sql\ProductRepository;
use App\Repositories\Sql\SizeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    protected $productRepo , $categoryRepo , $sizeRepo;

    public function __construct(ProductRepository $productRepo , CategoryRepository $categoryRepo , SizeRepository $sizeRepo )
    {
        return $this->productRepo = $productRepo ;
        return $this->categoryRepo = $categoryRepo ;
        return $this->sizeRepo = $sizeRepo ;
    }
    public function index()
    {
        $products = $this->productRepo->getAll();
         return view('dashboard.backend.products.index' , compact('products'));
    }


    public function create()
    {
        $categories = Category::Where('type' , 'category')->get();
        $sizes = Size::orderBy('created_at' , 'DESC')->get();
         return view('dashboard.backend.products.create' , compact('categories' , 'sizes'));
    }


    public function store(Request $request)
    {

        $data = $request->except('img' , 'size_id');



        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products');
        }

        $product =  $this->productRepo->create($data);
        $product->sizes()->sync($request->size_id);






      return redirect(route('admin.products.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        $product = $this->productRepo->findOne($id);


        return view('dashboard.backend.products.show' , compact('product') );


    }


    public function edit($id)
    {
        $product = $this->productRepo->findOne($id);
        $sizes = Size::orderBy('created_at' , 'DESC')->get();
        $categories = Category::Where('type' , 'category')->get();
         return view('dashboard.backend.products.edit' , compact('product' , 'categories' , 'sizes'));
    }


    public function update(Request $request, $id)
    {
        $product = $this->productRepo->findOne($id);

       $data = $request->except('img' , 'size_id');


        if ($request->hasFile('img')) {

            Storage::delete($product->img);

            $data['img'] = $request->file('img')->store('products');

        } else {
            $data['img'] = $product->img;
        }

        $product->update($data);
        $product->sizes()->sync($request->size_id);
      return redirect(route('admin.products.index'))->with('success', __('models.added_successfully'));

    }


    public function destroy($id)
    {
        $product = $this->productRepo->findOne($id);

        if ($product->img) {
            Storage::delete($product->img);
        }
        $product->delete();

        return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }
}
