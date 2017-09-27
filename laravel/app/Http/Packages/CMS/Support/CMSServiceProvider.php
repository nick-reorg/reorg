<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 5:28 PM
 */

namespace App\Http\Packages\CMS\Support;

use App;
use App\Http\Packages\CMS\Gateways\CMSGateway;
use App\Http\Packages\CMS\Gateways\CMSRecordGateway;
use App\Http\Packages\CMS\Gateways\CMSRecordSearchGateway;
use App\Providers\GlobalServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class CMSServiceProvider
 * @package App\Http\Packages\CMS\Support
 */
class CMSServiceProvider extends ServiceProvider
{
    /**
     * @return array
     */
    public function provides()
    {
        return array(
            CMSGateway::class,
            CMSRecordGateway::class,
            CMSRecordSearchGateway::class,
        );
    }

    /**
     *
     */
    public function register()
    {
        $this->app->bind(CMSGateway::class, function($app) {
                $client = GlobalServiceProvider::getHttpClient();
                return new CMSGateway($client);
            }
        );

        $this->app->bind(CMSRecordSearchGateway::class, function($app) {
                $searchClient = GlobalServiceProvider::getSearchClient();
                return new CMSRecordSearchGateway($searchClient);
            }
        );
    }

    /**
     * @return CMSGateway
     */
    public static function getCMSGateway()
    {
        return App::make(CMSGateway::class);
    }

    /**
     * @return CMSRecordGateway
     */
    public static function getCMSRecordGateway()
    {
        return App::make(CMSRecordGateway::class);
    }

    /**
     * @return CMSRecordSearchGateway
     */
    public static function getCMSRecordSearchGateway()
    {
        return App::make(CMSRecordSearchGateway::class);
    }
}
