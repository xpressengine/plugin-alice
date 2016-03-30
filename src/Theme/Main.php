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

use Xpressengine\Plugins\Alice\Plugin as Alice;
use Xpressengine\Theme\AbstractTheme;

/**
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class Main extends AbstractTheme
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

        $mainMenu = $this->getMenu($config, 'mainMenu');
        $subMenu = $this->getMenu($config, 'subMenu');

        // render html
        return \View::make(Alice::getIdWith('views.main'), compact('config', 'mainMenu', 'subMenu'));
    }

    protected function loadAssets()
    {
        $this->loadBaseAssets();
    }

}
