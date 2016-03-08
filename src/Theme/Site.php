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

use XeFrontend;
use Xpressengine\Plugins\Alice\Plugin as Alice;
use Xpressengine\Theme\AbstractTheme;

/**
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class Site extends AbstractTheme
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

        $config['sub'] = 'sub';
        $config['bg_none'] = '';
        $config['no_snb'] = 'no_snb';
        $config['no_spot'] = 'no_sopt';
        $config['ct_class'] = 'container section';

        // render html
        return \View::make(
            Alice::getIdWith('views.site'),
            compact('config', 'mainMenu', 'subMenus', 'selectedMenu')
        );
    }

    protected function loadAssets()
    {
        $this->loadBaseAssets();
    }

}
