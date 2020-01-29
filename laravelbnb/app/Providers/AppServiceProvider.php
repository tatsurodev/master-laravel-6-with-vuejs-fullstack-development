<?php

namespace App\Providers;

// use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // migrationの$table->unique()で付与されるindex keyは767bytesまで、mysqlのutf8mb4では1文字4bytesなので
        // 191 * 4 = 764 ok
        // 192 * 4 = 768 too large
        // となりmigrationの際にerrorとなりうるので、$table->string()のdefault lengthを255だと上限に達してしまうので191に変更しておく
        Schema::defaultStringLength(191);

        // apiから返ってくるjsonがdata propertyでwrappingされないようにする
        // JsonResource::withoutWrapping();
    }
}
