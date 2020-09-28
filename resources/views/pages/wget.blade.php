<html>
<body>
@foreach ($folders as $folder)
    <a href="{{asset("$spath/$parent/$folder->name")}}">{{$folder->name}}</a>
@endforeach
@foreach ($files as $file)
    <a href="{{asset("vault/$parent/$file->name")}}" download>{{basename($file->name)}}</a>
@endforeach
</body>
</html>
