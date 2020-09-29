<html>
<body>
@foreach ($dirs as $fdir)
    <a href="{{asset("$spath/$parent/$dir->name")}}">{{$dir->name}}</a>
@endforeach
@foreach ($files as $file)
    <a href="{{asset("vault/$parent/$file->name")}}" download>{{basename($file->name)}}</a>
@endforeach
</body>
</html>
