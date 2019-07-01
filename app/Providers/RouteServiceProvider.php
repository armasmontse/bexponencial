<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapStudentRoutes();
        $this->mapParentRoutes();
        $this->mapSchoolRoutes();

        $this->mapAdminRoutes();

        $this->mapBexpoRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
     protected function mapWebRoutes()
     {
         Route::group([
             'middleware' => 'web',
             'namespace' => $this->namespace,
             'as' => 'client::'
         ], function ($router) {
             require base_path('routes/web.php');
         });
     }

     /**
      * These routes are typically user page.
      *
      * @return void
      */


     /**
      * Define the "admin" routes for the application.
      *
      * These routes are typically dashboard.
      *
      * @return void
      */
     protected function mapAdminRoutes()
     {
         Route::group([
             'middleware' => ["web",'admin'],
             'namespace' => $this->namespace,
             'prefix' => 'admin',
             'as' => 'admin::'
         ], function ($router) {
             require base_path('routes/admin.php');
         });
     }

     /**
      * Define the "cltvo" routes for the application.
      *
      * These routes are typically stateless.
      *
      * @return void
      */
     protected function mapBexpoRoutes()
     {
         Route::group([
             'middleware' => ['web', 'bexpo','api'],
             'namespace' => $this->namespace,
             'prefix' => 'bexpo',
             'as' => 'bexpo::'
         ], function ($router) {
             require base_path('routes/bexpo.php');
         });
     }
     /**
      * These routes are typically user page.
      *
      * @return void
      */
     protected function mapParentRoutes()
     {
         Route::group([
             'middleware' => ['web','parents','api'],
             'namespace' => $this->namespace,
             'prefix' => 'parents',
             'as' => 'parent::'
         ], function ($router) {
             require base_path('routes/parents.php');
         });
     }

     /**
      * These routes are typically user page.
      *
      * @return void
      */
     protected function mapSchoolRoutes()
     {
         Route::group([
             'middleware' => ['web','schools','api'],
             'namespace' => $this->namespace,
             'prefix' => 'schools',
             'as' => 'school::'
         ], function ($router) {
             require base_path('routes/schools.php');
         });
     }
     /**
      * These routes are typically user page.
      *
      * @return void
      */
     protected function mapStudentRoutes()
     {
         Route::group([
             'middleware' => ['web','students','api'],
             'namespace' => $this->namespace,
             'prefix' => 'students',
             'as' => 'student::'
         ], function ($router) {
             require base_path('routes/students.php');
         });
     }
     /**
      * Define the "api" routes for the application.
      *
      * These routes are typically stateless.
      *
      * @return void
      */
     protected function mapApiRoutes()
     {
         Route::group([
             'middleware' =>  ['web','api','students'],
             'namespace' => $this->namespace,
             'prefix' => 'api',
             'as' => 'api::'
         ], function ($router) {
             require base_path('routes/api.php');
         });
     }
}
