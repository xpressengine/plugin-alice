@section('page_title')
    <h2>Alice 테마 설정</h2>
@stop

@section('page_description')
    테마를 설정합니다.
@stop


<form role="form" action="{{ $action }}" method="post" id="_theme" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel">
            <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#styleSetting">
                <div class="row">
                    <p class="txt_tit">내용 및 스타일</p>
                    <div class="right_btn pull-right">
                        <!-- [D] 메뉴 닫기 시 버튼 클래스에 card_close 추가 및 item_container none/block 처리-->
                        <button type="button" class="btn_clse ico_gray pull-left"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="blind">메뉴닫기</span></button>
                    </div>
                </div>
            </div>
            <div id="styleSetting" class="panel-collapse collapse in" role="tabpanel">
            <div class="panel-body">
                <div class="row">
                    {{-- 사이트 타이틀 --}}
                    <div class="col-md-12">
                        {!! uio('formText', ['id'=>'title', 'label'=>'제목', 'placeholder'=>'제목을 입력하세요', 'value'=>array_get($config, 'title', null),'name'=>'title']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- 컬러셋 --}}
                    <div class="col-md-4">
                        {!! uio('formSelect', ['label'=>'컬러셋', 'name'=>'mode', 'options'=> $sel_mode, 'selected'=>array_get($config, 'mode')]) !!}
                    </div>
                    {{-- 헤더 배경 --}}
                    <div class="col-md-4">
                        {!! uio('formSelect', ['label'=>'헤더배경', 'name'=>'bg_none', 'options'=> $sel_bg_none, 'selected'=>array_get($config, 'bg_none')]) !!}
                    </div>
                    {{-- 스크롤시 헤더 색상 --}}
                    <div class="col-md-4">
                        {!! uio('formSelect', ['label'=>'헤더 스크롤색상', 'name'=>'header_scroll', 'options'=> $sel_header_scroll, 'selected'=>array_get($config, 'header_scroll')]) !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#menuSetting">
                <div class="row">
                    <p class="txt_tit">메뉴</p>
                    <div class="right_btn pull-right">
                        <!-- [D] 메뉴 닫기 시 버튼 클래스에 card_close 추가 및 item_container none/block 처리-->
                        <button type="button" class="btn_clse ico_gray pull-left"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="blind">메뉴닫기</span></button>
                    </div>
                </div>
            </div>
            <div id="menuSetting" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body">
                <div class="row">
                    {{-- 메인메뉴 --}}
                    <div class="col-md-12">
                        {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'mainmenu', 'id'=>'mainmenu', 'label'=>'메인메뉴', 'selected'=> array_get($config, 'mainmenu', null) ]) !!}
                    </div>

                    {{-- 사이드바 --}}
                    <div class="col-md-12">
                        {!! uio('formSelect', ['label'=>'사이드바 사용', 'name'=>'no_snb', 'options'=> $sel_no_snb, 'selected'=> array_get($config, 'no_snb')]) !!}
                    </div>
                    {{-- 사이드바 메뉴 제목 --}}
                    <div class="col-md-6">
                        {!! uio('formText', ['id'=>'sidemenu_title', 'label'=>'하단메뉴2 제목', 'placeholder'=>'좌측메뉴의 제목을 입력하세요', 'value'=>array_get($config, 'sidemenu_title', null),'name'=>'sidemenu_title']) !!}
                    </div>
                    {{-- 사이드바 메뉴 제목 --}}
                    <div class="col-md-6">
                        {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'sidemenu2', 'id'=>'sidemenu2', 'label'=>'하단메뉴2', 'selected'=> array_get($config, 'sidemenu2', null) ]) !!}
                    </div>

                    {{-- 하단 메뉴 1 제목--}}
                    <div class="col-md-6">
                        {!! uio('formText', ['id'=>'submenu1_title', 'label'=>'하단메뉴1 제목', 'placeholder'=>'하단메뉴1의 제목을 입력하세요', 'value'=>array_get($config, 'submenu1_title', null),'name'=>'submenu1_title']) !!}
                    </div>
                    {{-- 하단 메뉴 1 --}}
                    <div class="col-md-6">
                        {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'submenu1', 'id'=>'submenu1', 'label'=>'하단메뉴1', 'selected'=> array_get($config, 'submenu1', null) ]) !!}
                    </div>
                    {{-- 하단 메뉴 2 제목 --}}
                    <div class="col-md-6">
                        {!! uio('formText', ['id'=>'submenu2_title', 'label'=>'하단메뉴2 제목', 'placeholder'=>'하단메뉴2의 제목을 입력하세요', 'value'=>array_get($config, 'submenu2_title', null),'name'=>'submenu2_title']) !!}
                    </div>
                    {{-- 하단 메뉴 2 --}}
                    <div class="col-md-6">
                        {!! uio('uiobject/xpressengine@menuSelector', ['name'=>'submenu2', 'id'=>'submenu2', 'label'=>'하단메뉴2', 'selected'=> array_get($config, 'submenu2', null) ]) !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#imageSetting">
                <div class="row">
                    <p class="txt_tit">이미지</p>
                    <div class="right_btn pull-right">
                        <!-- [D] 메뉴 닫기 시 버튼 클래스에 card_close 추가 및 item_container none/block 처리-->
                        <button type="button" class="btn_clse ico_gray pull-left"><i class="xi-angle-down"></i><i class="xi-angle-up"></i><span class="blind">메뉴닫기</span></button>
                    </div>
                </div>
            </div>
            <div id="imageSetting" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! uio('formImage', ['name' => 'slide_img1', 'label' => '슬라이드 이미지 1', 'image' => array_get($config,'slide_img1Path'), 'width' => 400, 'height' => 160 ]) !!}
                    </div>
                    <div class="col-md-12">
                        {!! uio('formImage', ['name' => 'slide_img2', 'label' => '슬라이드 이미지 2', 'image' => array_get($config,'slide_img2Path'), 'width' => 400, 'height' => 160 ]) !!}
                    </div>
                    <div class="col-md-12">
                        {!! uio('formImage', ['name' => 'slide_img3', 'label' => '슬라이드 이미지 3', 'image' => array_get($config,'slide_img3Path'), 'width' => 400, 'height' => 160 ]) !!}
                    </div>
                    <div class="col-md-12">
                        {!! uio('formFile', ['name' => 'slide_video', 'label' => '슬라이드 비디오(mp4)', 'file' => array_get($config,'slide_videoId'), 'width' => 400, 'height' => 160, 'types' => 'mp4', 'fileuploadOptions' => [ 'maxFileSize' => 10000000 ] ]) !!}
                    </div>

                    {{-- 서브 배경--}}
                    <div class="col-md-12">
                        {!! uio('formImage', ['name' => 'sub_bg', 'label' => '서브 헤더 배경', 'image' => array_get($config,'sub_bgPath'), 'width' => 400, 'height' => 160 ]) !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn_blue">변경내용 저장</button>

</form>
