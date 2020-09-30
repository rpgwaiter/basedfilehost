@foreach ($dirs as $dir)
    @if ($parent != "")
        <tr class="click-row" onclick="window.location='{{asset("$spath/$parent/$dir->name")}}';">
    @else
        <tr class="click-row" onclick="window.location='{{asset("$spath/$dir->name")}}';">
    @endif
            <td class="col-9 td-name" sort-info="{{$dir->name}}">{{$dir->name}}</td>
            <td class="col-2 td-date" sort-info="{{date ($dateformat, $dir->mtime)}}">{{date ($dateformat, $dir->mtime)}}</td>
            <td class="col-1 td-icon">
                <a href="{{asset("$spath/$parent/$dir->name")}}"><i class="fa fa-folder" aria-hidden="true"></i></a>
            </td>
        </tr>
@endforeach
