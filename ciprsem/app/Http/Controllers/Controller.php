<?php

namespace App\Http\Controllers;


use App\Article;
use App\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        //its just a dummy data object.
       // $connection = Model::resolveConnection();



        $loc = $this->getCurrentLocale();

        $background = Setting::where('id',1)->first();

        $translated = Article::whereNull('title_fr')
            ->whereNull('body_fr')
            ->whereNull('title_en')
            ->whereNull('body_en')
            ->whereNull('title_ar')
            ->whereNull('body_ar')
            ->OrwhereNull('title_fr')
            ->OrwhereNull('body_fr')
            ->OrwhereNull('title_en')
            ->OrwhereNull('body_en')
            ->OrwhereNull('title_ar')
            ->OrwhereNull('body_ar')
            ->count();

        // Sharing is caring
        View::share(['background'=>$background,'loc'=>$loc,'translated'=>$translated]);
    }

    public function getCurrentLocale()
    {

        return LaravelLocalization::getCurrentLocale();
    }
}
