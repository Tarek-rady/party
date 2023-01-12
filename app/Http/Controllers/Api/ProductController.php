<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\IngredentResource;
use App\Http\Resources\ProductDetailsResource;
use App\Repositories\Sql\CategoryRepository;
use App\Repositories\Sql\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait;

    protected $productRepo , $categoryRepo;
    public function __construct(ProductRepository $productRepo , CategoryRepository $categoryRepo)
    {
      $this->productRepo = $productRepo ;
      $this->categoryRepo = $categoryRepo ;
    }

    public function product_details($id)
    {
        $product = $this->productRepo->findOne($id);
        $data['product'] = new ProductDetailsResource($product) ;
        $data['ingredents'] = IngredentResource::collection($product->ingredents) ;

        return $this->ApiResponse($data , '' , 200);

    }

    public function categoryServices()
    {
       $categoryServices = $this->categoryRepo->getWhere(['type' => 'service']);
       $data['categoryServices'] = CategoryResource::collection($categoryServices) ;

       return $this->ApiResponse($data , '' , 200);
    }
}
