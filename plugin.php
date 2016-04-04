<?php
namespace Xpressengine\Plugins\Alice;

use Route;
use Xpressengine\Plugin\AbstractPlugin;

class Alice extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        $this->route();
    }

    protected function route()
    {
        // settings/alice/options
        Route::settings(
            static::getId(),
            function () {
                Route::group(
                    ['prefix' => "options"],
                    function () {
                        // alice::option
                        $alias = static::getIdWith('option');
                        Route::get('/', ['as' => "$alias.edit", 'uses' => 'ConfigController@edit']);
                        Route::post('/', ['as' => "$alias.update", 'uses' => 'ConfigController@update']);
                    }
                );
            }, ['namespace' => 'Xpressengine\Plugins\Alice\Controllers']
        );
    }

}
