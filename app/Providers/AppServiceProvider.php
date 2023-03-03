<?php
declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->bind(QueryBuilder::class,NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,CategoriesQueryBuilder::class);

        //Services
        $this->app->bind(Parser::class, ParserServices::class);
        $this->app->bind(Social::class, SocialServices::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot():void
    {
        Paginator::useBootstrapFour();
    }
}
