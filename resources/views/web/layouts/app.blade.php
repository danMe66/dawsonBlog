<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PHP面试网') - {{ setting('site_name', 'PHP面试网') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'PHP面试网'))"/>
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'PHP面试网'))"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('layouts._header')

    <div class="container">
        @include('layouts._message')
        @yield('content')
        <div class="ui divider"></div>

    </div>

    @include('layouts._footer')
</div>

{{--@if (config('app.debug'))--}}
{{--    @include('sudosu::user-selector')--}}
{{--@endif--}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/semantic.min.js')}}"></script>
@yield('scripts')

<script type="text/javascript">
    //百度统计
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?84409055f1221299ffd6056602cd2268";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>