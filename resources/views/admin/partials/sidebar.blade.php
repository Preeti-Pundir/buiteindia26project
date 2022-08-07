<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
            <i class="app-menu__icon fa fa-briefcase"></i>
            <span class="app-menu__label">Brands</span>
        </a>
    </li>
</body>
</html>