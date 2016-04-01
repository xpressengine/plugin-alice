@section('page_title')
    <h2>Alice 테마 설정</h2>
@stop

@section('page_description')
    테마를 설정합니다.
@stop


<form role="form" action="{{ $action }}" method="post" id="_theme" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-group">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{xe_trans('alice::defaultConfig')}}</h3>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn-link panel-toggle pull-right"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="sr-only">{{xe_trans('xe::close')}}</span></a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::logo')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="logoType" value="image" @if($config->get('logoType', 'image') == 'image') checked="checked" @endif >{{xe_trans('xe::image')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="logoType" value="text" @if($config->get('logoType', 'image') == 'text') checked="checked" @endif>{{xe_trans('xe::text')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::logoText')}}</label>
                                        <div class="input-group">
                                            {!! uio('langText', ['placeholder'=>'Alice', 'langKey'=>$config->get('logoText', null), 'name'=>'logoText']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! uio('formImage', ['name' => 'logoImage', 'label' => xe_trans('alice::logoImage'), 'description' => xe_trans('alice::logoImageDescription'), 'image' => $config->get('logoImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::useColorSet')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="useColorSet" value="true" @if($config->get('useColorSet', true) == true) checked="checked" @endif >{{xe_trans('use')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="useColorSet" value="false" @if($config->get('useColorSet', true) == false) checked="checked" @endif >{{xe_trans('disuse')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! uio('formSelect', ['label'=>xe_trans('alice::colorSetValue'), 'name'=>'colorSetValue', 'options'=> [
                                        ['value'=>'', 'text' => xe_trans('xe::default')],
                                        ['value'=>'blue-theme', 'text' => 'Blue'],
                                        ['value'=>'red-theme', 'text' => 'Red'],
                                    ], 'selected'=> $config->get('colorSetValue', '')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="xi-download"></i>{{xe_trans('xe::save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{xe_trans('alice::mainPageConfig')}}</h3>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="btn-link panel-toggle pull-right"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="sr-only">{{xe_trans('xe::close')}}</span></a>
                        </div>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'mainMenu', 'id'=>'mainMenu', 'label'=>xe_trans('alice::selectMainMenu'), 'selected'=> $config->get('mainMenu', null) ]) !!}
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::mainContentsAreaType')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mainContentsAreaType" value="extend" @if($config->get('mainContentsAreaType', 'extend') == 'extend') checked="checked" @endif >{{xe_trans('alice::extend')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="mainContentsAreaType" value="fixed" @if($config->get('mainContentsAreaType', 'extend') == 'fixed') checked="checked" @endif >{{xe_trans('alice::fixed')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! uio('formSelect', ['label'=>xe_trans('alice::mainMenuTheme'), 'name'=>'mainMenuTheme', 'options'=> [
                                        ['value'=>'', 'text' => 'Default'],
                                        ['value'=>'black-header', 'text' => 'Black'],
                                        ['value'=>'white-header', 'text' => 'White'],
                                    ], 'selected'=> $config->get('mainMenuTheme', '')]) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! uio('formSelect', ['label'=>xe_trans('alice::mainMenuFixPosition'), 'name'=>'mainMenuFixPosition', 'options'=> [
                                        ['value'=>'', 'text' => xe_trans('xe::use')],
                                        ['value'=>'none-fixed-header', 'text' => xe_trans('xe::disuse')],
                                    ], 'selected'=> $config->get('mainMenuFixPosition', '')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-right">
                                <button type="sumit" class="btn btn-primary"><i class="xi-download"></i>{{xe_trans('xe::save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{xe_trans('alice::subPageConfig')}}</h3>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="btn-link panel-toggle pull-right"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="sr-only">{{xe_trans('xe::close')}}</span></a>
                        </div>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! uio('formSelect', ['label'=>xe_trans('alice::selectSubMenuThemeAndTopBanner'), 'name'=>'subMenuThemeAndTopBanner', 'options'=> [
                                        ['value'=>'', 'text' => xe_trans('alice::BackgroundTransparentAndImageBanner')],
                                        ['value'=>'white-header', 'text' => xe_trans('alice::BackgroundWhiteAndImageBanner')],
                                        ['value'=>'txt-banner white-header', 'text' => xe_trans('alice::BackgroundWhiteAndTextBanner')],
                                        ['value'=>'no-spot white-header', 'text' => xe_trans('alice::BackgroundWhiteAndWithoutBanner')],
                                        ['value'=>'black-header', 'text' => xe_trans('alice::BackgroundBlackAndImageBanner')],
                                        ['value'=>'txt-banner black-header', 'text' => xe_trans('alice::BackgroundBlackAndTextBanner')],
                                        ['value'=>'no-spot black-header', 'text' => xe_trans('alice::BackgroundBlackAndWithoutBanner')],
                                    ], 'selected'=> $config->get('subMenuThemeAndTopBanner', '1')]) !!}
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::subContentsAreaType')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="subContentsAreaType" value="extend" @if($config->get('subContentsAreaType', 'extend') == 'extend') checked="checked" @endif >{{xe_trans('alice::extend')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="subContentsAreaType" value="fixed" @if($config->get('subContentsAreaType', 'extend') == 'fixed') checked="checked" @endif >{{xe_trans('alice::fixed')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::subTopImage')}}</label>
                                        <div class="list-group-item">
                                            {!! uio('formImage', ['name' => 'subTopImage', 'label' => null, 'image' => $config->get('subTopImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="xi-download"></i>{{xe_trans('xe::save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{xe_trans('alice::slideConfig')}} <small>{{xe_trans('alice::slideConfigDescription')}}</small></h3>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="btn-link panel-toggle pull-right"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="sr-only">{{xe_trans('xe::close')}}</span></a>
                        </div>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide1Image')}}</label>
                                        <div class="list-group-item">
                                            {!! uio('formImage', ['name' => 'slide1Image', 'label' => null, 'image' => $config->get('slide1ImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide1TitleText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide1TitleText', null), 'name'=>'slide1TitleText']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide1SubText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide1SubText', null), 'name'=>'slide1SubText']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide2Image')}}</label>
                                        <div class="list-group-item">
                                            {!! uio('formImage', ['name' => 'slide2Image', 'label' => null, 'image' => $config->get('slide2ImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide2TitleText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide2TitleText', null), 'name'=>'slide2TitleText']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide2SubText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide2SubText', null), 'name'=>'slide2SubText']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide3Image')}}</label>
                                        <div class="list-group-item">
                                            {!! uio('formImage', ['name' => 'slide3Image', 'label' => null, 'image' => $config->get('slide3ImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide3TitleText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide3TitleText', null), 'name'=>'slide3TitleText']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::slide3SubText')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('slide3SubText', null), 'name'=>'slide3SubText']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="xi-download"></i>{{xe_trans('xe::save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{xe_trans('xe::footerConfig')}}</h3>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="btn-link panel-toggle pull-right"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="sr-only">{{xe_trans('xe::close')}}</span></a>
                        </div>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'subMenu', 'id'=>'subMenu', 'label'=>xe_trans('alice::selectSubMenu'), 'selected'=> $config->get('subMenu', null) ]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::footerLogo')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="footerLogoType" value="image" @if($config->get('footerLogoType', 'image') == 'image') checked="checked" @endif >{{xe_trans('xe::image')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="footerLogoType" value="text" @if($config->get('footerLogoType', 'image') == 'text') checked="checked" @endif >{{xe_trans('xe::text')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::footerLogoText')}}</label>
                                        {!! uio('langText', ['placeholder'=>'', 'langKey'=>$config->get('footerLogoText', null), 'name'=>'footerLogoText']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::footerLogoImage')}} <small>{{xe_trans('alice::footerLogoImageDescription')}}</small></label>
                                        <div class="list-group-item">
                                            {!! uio('formImage', ['name' => 'footerLogoImage', 'label' => null, 'image' => $config->get('footerLogoImagePath'), 'types' => ['jpg', 'gif', 'png', 'jpeg'], 'width' => 400, 'height' => 160 ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::footerContents')}}</label>
                                        {!! uio('langTextArea', ['placeholder'=>'', 'langKey'=>$config->get('footerContents', null), 'name'=>'footerContents']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::copyRight')}}</label>
                                        <textarea name="copyRight" rows="2" cols="40" class="form-control">{!! $config->get('copyRight', '') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::useFooterLinks')}}</label>
                                        <div class="list-group-item">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="useFooterLinks" value="true" @if($config->get('useFooterLinks', true) == false) checked="checked" @endif >{{xe_trans('xe::use')}}
                                                </label>
                                                <label>
                                                    <input type="radio" name="useFooterLinks" value="false" @if($config->get('useFooterLinks', true) == false) checked="checked" @endif >{{xe_trans('xe::disuse')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link1')}}</label>
                                        <input type="text" class="form-control" name="footerLink[]" value="{{!isset($config->get('footerLink', [])[0]) ? '': $config->get('footerLink', [])[0]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link1XEIconName')}}</label>
                                        <input type="text" class="form-control" placeholder="xi-twitter" name="footerLinkIcon[]" value="{{!isset($config->get('footerLinkIcon', [])[0]) ? '': $config->get('footerLinkIcon', [])[0]}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link2')}}</label>
                                        <input type="text" class="form-control" name="footerLink[]" value="{{!isset($config->get('footerLink', [])[1]) ? '': $config->get('footerLink', [])[1]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link2XEIconName')}}</label>
                                        <input type="text" class="form-control" placeholder="xi-facebook" name="footerLinkIcon[]" value="{{!isset($config->get('footerLinkIcon', [])[1]) ? '': $config->get('footerLinkIcon', [])[1]}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link3')}}</label>
                                        <input type="text" class="form-control" name="footerLink[]" value="{{!isset($config->get('footerLink', [])[2]) ? '': $config->get('footerLink', [])[2]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link3XEIconName')}}</label>
                                        <input type="text" class="form-control" name="footerLinkIcon[]" value="{{!isset($config->get('footerLinkIcon', [])[2]) ? '': $config->get('footerLinkIcon', [])[2]}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link4')}}</label>
                                        <input type="text" class="form-control" name="footerLink[]" value="{{!isset($config->get('footerLink', [])[3]) ? '': $config->get('footerLink', [])[3]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link4XEIconName')}}</label>
                                        <input type="text" class="form-control" name="footerLinkIcon[]" value="{{!isset($config->get('footerLinkIcon', [])[3]) ? '': $config->get('footerLinkIcon', [])[3]}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link5')}}</label>
                                        <input type="text" class="form-control" name="footerLink[]" value="{{!isset($config->get('footerLink', [])[4]) ? '': $config->get('footerLink', [])[4]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{xe_trans('alice::link5XEIconName')}}</label>
                                        <input type="text" class="form-control" name="footerLinkIcon[]" value="{{!isset($config->get('footerLinkIcon', [])[4]) ? '': $config->get('footerLinkIcon', [])[4]}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="xi-download"></i>{{xe_trans('xe::save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
