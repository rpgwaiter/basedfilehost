<!DOCTYPE html>
<html lang="en">
<head>

@include('includes.head')

</head>
<body>

<div class="container">
    @yield('content')
</div>
@if(count(explode('/', url()->current())) > 4)
    @include('includes.pagescript')
@endif

</body>
</html>
