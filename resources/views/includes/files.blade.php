@foreach ($files as $file)
    <tr>
        <td class="td-name"><a href="{{asset("vault/$parent/$file->name")}}" download>{{basename($file->name)}}</a></td>
        <td class="td-date">{{date($dateformat, $file->mtime)}}</td>
        <td class="td-icon"><a href="{{asset("vault/$parent/$file->name")}}"
                               data-toggle="popover"
                               title="Est. Download Times (Minutes)"
                               data-content="{{$controller::est_download($file->size)}}"
                               download
            >{{$controller::human_filesize($file->size)}}</a></td>
    </tr>
@endforeach
