<?php
/**
 * BaseThemeTrait trait This file is part of the Xpressengine package.
 *
 * PHP version 5
 *
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @copyright   2000-2014 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Plugins\Alice\Theme;

use Frontend;
use Xpressengine\Menu\Models\Menu;
use Xpressengine\Plugins\Alice\Plugin as Alice;

/**
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
trait BaseThemeTrait
{
    protected $selectedMenu;

    /**
     * load Assets
     *
     * @param null $theme
     *
     * @return void
     */
    protected function loadBaseAssets()
    {
        $this->loadStyleSheet();
        $this->loadScript();
        Frontend::meta()->name('viewport')->content(
            'width=device-width, initial-scale=1, maximum-scale=1.0'
        )->load();
    }

    /**
     * loadStyleSheet
     *
     * @return void
     */
    protected function loadStyleSheet()
    {
        // css of theme
        Frontend::css(
            [
                Alice::asset('assets/css/swiper2.css'),
                Alice::asset('assets/css/materialize.css'),
                Alice::asset('assets/css/xo_font.css'),
                Alice::asset('assets/css/theme.css'),
            ]
        )->load();
    }

    /**
     * loadScript
     *
     * @return void
     */
    protected function loadScript()
    {
        // js for IE, by core
        Frontend::js(
            [
                'assets/vendor/html5shiv/dist/html5shiv.min.js',
                'assets/vendor/respond/dest/respond.min.js'
            ]
        )->appendTo('head')->target('lt IE 9')->load();

        // by theme
        Frontend::js(
            [
                Alice::asset('assets/js/init.js'),
                Alice::asset('assets/js/materialize.js'),
                Alice::asset('assets/js/swiper2.js'),
            ]
        )->appendTo('head')->load();
    }

    protected function getMenu($config, $menuName, $setSelected = false)
    {
        $menuId = array_get($config, $menuName);
        $selectedMenuItem = null;
        $menuItems = [];
        if ($menuId !== null) {
            $mainmenu = Menu::find($menuId);
            $menuItems = $mainmenu->items;
            $currentInstanceId = getCurrentInstanceId() ;
            if ($currentInstanceId !== null && $mainmenu->hasItem($currentInstanceId)) {
                $mainmenu->setItemSelected($currentInstanceId);

                if($setSelected) {
                    $this->selectedMenu = $mainmenu->getItem($currentInstanceId);
                }
            }
        }

        return $menuItems;

    }

    /**
     * 테마의 설정 데이터를 반환한다.
     *
     * @return array
     */
    protected static function getConfig()
    {
        return static::$handler->getThemeConfig('theme/alice@main');
    }

    public static function getSettingsURI()
    {
        return route(Alice::getIdWith('option.edit'));
    }

    /**
     * 테마 편집 페이지에서 편집할 수 있는 파일의 목록을 반환한다.
     *
     * @return array
     */
    public static function getEditFiles()
    {
        return [
            'template' => [
                'main.blade.php' => Alice::getPath('views/main.blade.php'),
                'site.blade.php' => Alice::getPath('views/site.blade.php'),
                'sub.blade.php' => Alice::getPath('views/sub.blade.php'),
                'theme.blade.php' => Alice::getPath('views/theme.blade.php'),
            ],
            'stylesheets' => [
                'theme.css' => Alice::getPath('assets/css/theme.css'),
            ]
        ];
    }

}
