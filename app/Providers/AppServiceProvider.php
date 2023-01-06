<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
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

        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        // dd(request()->ip());
        // $ip = request()->ip();
        $ip = '102.129.158.0';
        if($ip == '127.0.0.1'){
            $city = 'gaza';
        }else{
            $country = Http::get('http://geoplugin.net/json.gp?ip='.$ip)->json();
            $city = $country['geoplugin_city'];
        }
        // dd($_SERVER);
       $data =  Http::get('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=f01942a975813106b2ada4f42579b2dd&units=metric')->json();
       $temp = $data['main']['temp'];
       $status = $data['weather'][0]['main'];
       $icon = $data['weather'][0]['icon'];
       $img =  'http://openweathermap.org/img/wn/'.$icon.'@2x.png';
       $weather = "weather on $city: <img width = '25px' src = '$img'> $temp $status";
    //    dd($weather);
         View::share('weather', $weather);
    }
}
