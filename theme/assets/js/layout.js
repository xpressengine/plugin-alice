$(document).ready(function () {

  $(".btn-toggle").click(function () {

    var menuHeight; // 메뉴 height 값
    var navFlag;    // 열림, 닫힘 체크 값

    menuHeight = $(".nav-list").css("height");
    navFlag = $(".nav-list").hasClass("open");

    if (navFlag) {
      $(".nav-list").animate({
          height: "0px"
        }
        , 250, function () {
          $(".nav-list").removeClass("open").css("height", "");
          $("header").removeClass("open");
          $(".plugin_area").css("display", "block");
        });
      $("html").css("position", "");
      $("header").animate({
        height: "60px"
      }, 250);
    } else {
      $(".nav-list").css("height", "0px").addClass("open");
      $("header").addClass("open");
      $("html").css("position", "fixed").css("left", "0").css("right", "0");
      $(".plugin_area").css("display", "none");
      $(".nav-list").animate({
        height: menuHeight
      }, 250);
      $("header").animate({
        height: "100%"
      }, 250);
    }
  });


  $(function () {
    var currentScrollTop, temporalScroll = 0;
    // 텍스트 애니메이션 flag
    // fixed 메뉴 적용 시 클래스 생성 및 제거를 한번만 적용하기 위한 flag
    var checkflag = true;

    $(window).scroll(function (event) {
      currentScrollTop = $(this).scrollTop();

      // 상단 메뉴 컨트롤 기능
      if (currentScrollTop > 0) {
        // fixed 메뉴 적용
        if (currentScrollTop > temporalScroll & checkflag) {
          $(".desktop header").addClass("fixed-header");
          checkflag = false;
        }
      } else {
        // 기본 메뉴 적용
        if (!checkflag) {
          $(".desktop header").removeClass("fixed-header");
          checkflag = true;
        }
      }
      temporalScroll = currentScrollTop;
    });
  });

  $(document).on('mouseover', 'li.sub-menu', function (e) {
    var $li = $(this);
    var $ul = $li.find('> .sub-menu-list');

    if($ul.length !== 0 && e.target.nodeName === 'A') {
      e.preventDefault();

      $ul.slideDown('fast');
      $li.addClass('open');
    }
  });

  $(document).on('mouseleave', 'li.sub-menu', function () {
    var $li = $(this);
    var $ul = $li.find('> .sub-menu-list');

    if($li.hasClass('open')) {
      $ul.slideUp('fast');
      $li.removeClass('open');
    }
  });

  $(document).on('click', '.nav-list-button', function () {
    var $this = $(this);
    var $li = $this.parent();

    if($li.hasClass('open')) {
      $this.next().slideUp('fast');
      $li.removeClass('open');

    } else {
      $li.siblings().removeClass('open').find('> .sub-menu-list').slideUp('fast');
      $this.next().slideDown('fast');
      $li.addClass('open');

    }
  });

  $('.sub-menu-list li a').on('click', function () {

    var windowWidth = $(window).width();
    var $this = $(this).next("ul");

    if(!$this.length) {
      return;
    }

    var $parent = $this.parent(); //li
    var $parentContainer = $parent.closest("ul");
    var initialOffset = $parentContainer.offset().left + $parentContainer.outerWidth(); // 부모의 left 위치 + 부모 width

    if (windowWidth < (initialOffset + $this.outerWidth())) { //서브 메뉴가 window 사이즈를 넘어갈 경우
      $this.css("left", "auto");
      $this.css("right", (
          ($parentContainer.outerWidth())
          + ($this.outerWidth() - $this.innerWidth())
        ) + "px");
    } else {
      $this.css("left", $parentContainer.outerWidth() + "px");
      $this.css("right", "auto");
    }
  });

});
