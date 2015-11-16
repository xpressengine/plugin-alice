<?php
/**
 * Main class
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
use Xpressengine\Plugins\Alice\Plugin as Alice;
use Xpressengine\Theme\AbstractTheme;

/**
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class Sub extends AbstractTheme
{
    use BaseThemeTrait;

    protected static $supportDesktop = true;
    protected static $supportMobile = true;

    /**
     * 테마를 출력한다.
     *
     * @return string
     */
    public function render()
    {
        // load assets
        $this->loadAssets();

        // get configuration data of theme
        $config = $this->getConfig();

        // get menu & selected menu
        $mainMenu = $this->getMenu($config, 'mainmenu', true);
        $selectedMenu = $this->selectedMenu;

        // get submenus
        $subMenus = [];
        if ($config['submenu1_title']) {
            $subMenus[$config['submenu1_title']] = $this->getMenu($config, 'submenu1');
        }
        if ($config['submenu2_title']) {
            $subMenus[$config['submenu2_title']] = $this->getMenu($config, 'submenu2');
        }

        if ($config['no_snb'] !== 'no_snb') {
            //$ctClass = 'container section';
            $sideMenu = $this->getMenu($config, 'mainmenu', true);
        }

        $config['sub'] = 'sub';
        $config['no_spot'] = '';
        $config['ct_class'] = 'container section';

        // render html
        return \View::make(
            Alice::getIdWith('views.sub'),
            compact('config', 'mainMenu', 'subMenus', 'selectedMenu', 'sideMenu')
        );
    }

    protected function loadAssets()
    {
        $this->loadBaseAssets();
    }

}
