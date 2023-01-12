<?php

namespace App\Providers;

        use App\Repositories\Sql\PartnerRepository;
        use App\Repositories\Contract\PartnerRepositoryInterface;

        use App\Repositories\Sql\NotificationRepository;
        use App\Repositories\Contract\NotificationRepositoryInterface;

        use App\Repositories\Sql\ItemRepository;
        use App\Repositories\Contract\ItemRepositoryInterface;

        use App\Repositories\Sql\OrderRepository;
        use App\Repositories\Contract\OrderRepositoryInterface;

        use App\Repositories\Sql\BannerRepository;
        use App\Repositories\Contract\BannerRepositoryInterface;

        use App\Repositories\Sql\ServiceRepository;
        use App\Repositories\Contract\ServiceRepositoryInterface;

        use App\Repositories\Sql\IngredentRepository;
        use App\Repositories\Contract\IngredentRepositoryInterface;

        use App\Repositories\Sql\SizeRepository;
        use App\Repositories\Contract\SizeRepositoryInterface;

        use App\Repositories\Sql\RateRepository;
        use App\Repositories\Contract\RateRepositoryInterface;

        use App\Repositories\Sql\ProductRepository;
        use App\Repositories\Contract\ProductRepositoryInterface;

        use App\Repositories\Sql\CategoryRepository;
        use App\Repositories\Contract\CategoryRepositoryInterface;

        use App\Repositories\Sql\ContactCompanyRepository;
        use App\Repositories\Contract\ContactCompanyRepositoryInterface;

        use App\Repositories\Sql\CouponRepository;
        use App\Repositories\Contract\CouponRepositoryInterface;



    use App\Repositories\Sql\CustomerRepository;
    use App\Repositories\Contract\CustomerRepositoryInterface;






use App\Repositories\Sql\UserRepository;
use App\Repositories\Contract\UserRepositoryInterface;



use App\Repositories\Contract\BaseRepositoryInterface;
// repository

use App\Repositories\Sql\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);

        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);

        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);

        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        $this->app->bind(IngredentRepositoryInterface::class, IngredentRepository::class);

        $this->app->bind(SizeRepositoryInterface::class, SizeRepository::class);

        $this->app->bind(RateRepositoryInterface::class, RateRepository::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->bind(ContactCompanyRepositoryInterface::class, ContactCompanyRepository::class);

        $this->app->bind(CouponRepositoryInterface::class, CouponRepository::class);



        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);






        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
    }

    public function boot()
    {
        //
    }
}
