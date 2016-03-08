<?php
/**
 * ConfigController class
 *
 * PHP version 5
 *
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice\Controllers
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @copyright   2000-2014 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Plugins\Alice\Controllers;

use App\Http\Controllers\Controller;
use Presenter;
use XeTheme;
use Xpressengine\Http\Request;
use Xpressengine\Plugins\Alice\Plugin as Alice;

/**
 * @category    Alice
 * @package     Xpressengine\Plugins\Alice\Controllers
 * @author      XE Team (khongchi) <khongchi@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class ConfigController extends Controller
{
    protected $configId = 'theme/alice@main';

    public function edit(Request $request)
    {

        $config = XeTheme::getThemeConfig($this->configId);

        // mode
        $sel_mode = [
            ['value' => '', 'text' => 'none'],
            ['value' => 'green_mode', 'text' => 'green'],
            ['value' => 'red_mode', 'text' => 'red'],
            ['value' => 'yellow_mode', 'text' => 'yellow'],
        ];

        // snb
        $sel_no_snb = [
            ['value'=>'', 'text'=>'사용'],
            ['value'=>'no_snb', 'text'=>'사용 안 함'],
        ];

        // bg_none
        $sel_bg_none = [
            ['value'=>'bg_none', 'text'=>'숨김'],
            ['value'=>'', 'text'=>'보임'],
        ];

        // header_scroll
        $sel_header_scroll = [
            ['value'=>'blue_scroll', 'text'=>'blue'],
            ['value'=>'white_scroll', 'text'=>'white'],
            ['value'=>'black_scroll', 'text'=>'black'],
        ];

        $alias = Alice::getIdWith('option.update');
        $formAction = route($alias);

        return Presenter::make(
            Alice::getIdWith('views.config'),
            [
                'config' => $config,
                'action' => $formAction,
                'sel_mode' => $sel_mode,
                'sel_no_snb' => $sel_no_snb,
                'sel_bg_none' => $sel_bg_none,
                'sel_header_scroll' => $sel_header_scroll,
            ]
        );
    }

    public function update(Request $request)
    {
        $config = $request->only(
            [
                'title',
                'mainmenu',
                'submenu1',
                'submenu1_title',
                'submenu2',
                'submenu2_title',
                'slide_img1',
                'slide_img2',
                'slide_img3',
                'slide_video',
                'sub_bg',
                'sidemenu2',
                'sidemenu_title',
                'mode',
                'no_snb',
                'bg_none',
                'header_scroll',
            ]
        );

        $oldConfig = \XeTheme::getThemeConfig($this->configId);

        // process images
        /** @var \Xpressengine\Storage\Storage $storage */
        $storage = app('xe.storage');
        /** @var MediaManager $media */
        $media = app('xe.media');

        $imageInputs = [
            'slide_img1',
            'slide_img2',
            'slide_img3',
            'slide_video',
            'sub_bg',
        ];

        foreach ($imageInputs as $key) {
            $uploadedFile = array_get($config, $key);
            $configId = $key.'Id';
            $configPath = $key.'Path';
            if ($uploadedFile !== null) {
                // remove old logo file
                if (isset($oldConfig[$configId])) {
                    $oldFileId = $oldConfig[$configId];
                    $oldFile = $storage->get($oldFileId);
                    if ($oldFile) {
                        $storage->remove($oldFile);
                    }
                }

                $file = $storage->upload($uploadedFile, Alice::getId(), null, 'plugin');

                $mediaFile = $media->make($file);
                $fileId = $file->getId();
                $filePath = $mediaFile->url();

                $config[$configId] = $fileId;
                $config[$configPath] = $filePath;
            } else {
                $config[$configId] = array_get($oldConfig, $configId);
                $config[$configPath] = array_get($oldConfig, $configPath);
            }
        }

        \XeTheme::setThemeConfig($this->configId, $config);

        return \Redirect::back()->with('alert', ['type' => 'success', 'message' => '저장되었습니다.']);
    }


}
