@php
if (session()->has("locale"))
{
    app()->setLocale(session()->get("locale"));
}
   
@endphp
<!DOCTYPE html>
<html lang="en" dir="@lang('data.dir')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{trans("data.home")}}</title>
</head>
<body>
<h1>{{__("data.welcome")}}  {{__("data.user")}}</h1>
<hr>
<h2>@lang('data.category')</h2>

<a href="/change/lang/en" >English</a> | <a href="/change/lang/ar">عربي</a>
</body>
</html>