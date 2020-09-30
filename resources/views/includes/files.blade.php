@foreach ($files as $file)
    <tr>
        <td class="td-name"><a href="{{asset("vault/$parent/$file->name")}}" download>{{basename($file->name)}}</a></td>
        <td class="td-date">{{date($dateformat, $file->mtime)}}</td>
        <td class="td-icon size"  rawsize="{{$file->size}}"><p>{{$file->size}}</p></td>
    </tr>
@endforeach
