@foreach ($files as $file)
    <tr>
        <td class="td-name" sort-info="{{basename($file->name)}}"><a href="{{asset("vault/$parent/$file->name")}}" download>{{basename($file->name)}}</a></td>
        <td class="td-date" sort-info="{{date($dateformat, $file->mtime)}}">{{date($dateformat, $file->mtime)}}</td>
        <td class="td-icon size" sort-info="{{$file->size}}"><p>{{$file->size}}</p></td>
    </tr>
@endforeach
