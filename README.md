# plugin-alice
이 어플리케이션은 Xpressengine3(이하 XE3)의 플러그인 입니다.

이 플러그인은 XE3에서 테마를 제공합니다.

[![License](http://img.shields.io/badge/license-GNU%20LGPL-brightgreen.svg)]

# Installation
### Console
```
$ php artisan plugin:install alice
```

### Web install
- 관리자 > 플러그인 & 업데이트 > 플러그인 목록 내에 새 플러그인 설치 버튼 클릭
- `alice` 검색 후 설치하기

### Ftp upload
- 다음의 페이지에서 다운로드
    * https://store.xpressengine.io/plugins/alice
    * https://github.com/xpressengine/plugin-alice/releases
- 프로젝트의 `plugins` 디렉토리 아래 `alice` 디렉토리명으로 압축해제
- `alice` 디렉토리 이동 후 `composer dump` 명령 실행

# Usage
관리자 > 사이트 맵 > 사이트 메뉴 편집에서 테마를 지정할 메뉴나 아이템을 선택 후 적용해서 사용합니다.

테마 지정은 아래 순서로 가능합니다.
1. 테마를 지정할 메뉴나 아이템 클릭
2. 테마 목록에서 `Alice` Desktop, Mobile 선택
3. 저장

# Option
**Alice 기본 설정**
> 1. 테마 지정 시 `수정` 클릭
> 2. 컬러셋, 이미지, 제목, 내용, 헤더나 푸터의 이미지, 아이콘 주소 등 수정
> 3. 저장

## License
이 플러그인은 LGPL라이선스 하에 있습니다. <https://opensource.org/licenses/LGPL-2.1>
