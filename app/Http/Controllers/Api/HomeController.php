<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\Traits\ApiResponseTrait;
use App\Http\Resources\BannerResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Repositories\Sql\BannerRepository;
use App\Repositories\Sql\CategoryRepository;
use App\Repositories\Sql\ProductRepository;

class HomeController extends Controller
{

    use ApiResponseTrait;

    protected $bannerRepo , $categoryRepo , $productRepo;
    public function __construct(BannerRepository $bannerRepo , CategoryRepository $categoryRepo , ProductRepository $productRepo)
    {
       $this->bannerRepo = $bannerRepo ;
       $this->categoryRepo = $categoryRepo ;
       $this->productRepo = $productRepo ;
    }

    public function home()
    {
       $banners = $this->bannerRepo->getAll();
       $categories = $this->categoryRepo->getWhere(['type' => 'category']);
       $products = $this->productRepo->getAll();

       $data['banners'] = BannerResource::collection($banners) ;
       $data['categories'] = CategoryResource::collection($categories) ;
       $data['products'] = ProductResource::collection($products) ;

       return $this->ApiResponse($data , '' , 200);
    }
}
