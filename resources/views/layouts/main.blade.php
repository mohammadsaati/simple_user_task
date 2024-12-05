<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @foreach(config('theme.css.global.links') as $linkStyle)
        <link href="{{ $linkStyle }}" rel="stylesheet">
    @endforeach

    @foreach(config('theme.css.global.links') as $style)
        <link href="{{ $style }}" rel="stylesheet">
    @endforeach
</head>
<body>
@yield('content')

@foreach(config('theme.js.global.links') as $linkJs)
    <script src="{{ $linkJs }}" ></script>
@endforeach

@foreach(config('theme.js.global.normal') as $js)
    <script src="{{ $js }}" ></script>
@endforeach


@stack('scripts')
</body>
</html>
