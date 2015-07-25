<a href="javascript:void(0);" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right task-number">{{ count(json_decode($reservedPersonalHours)) }}</span></a>
<ul class="dropdown-menu title-caret dropdown-lg tasks-personal" role="menu">
    <li><p class="drop-title">Вие имате {{ count(json_decode($reservedPersonalHours)) }} @if(count(json_decode($reservedPersonalHours))==1)запазен час! @else запазени часа! @endif </p></li>
    <li class="dropdown-menu-list slimscroll tasks">
        <ul class="list-unstyled">
            @forelse(json_decode($reservedPersonalHours) as $hour)
                <li data-id={{  $hour->id }}>
                    <a href="javascript:void(0);">
                        <div class="task-icon badge badge-info"><i class="icon-clock"></i></div>
                        <div class="pull-right"><input class="check-plugin" type="checkbox"/></div>
                        <p class="task-details" >{{ $hour->name }}-{{ substr($hour->start,(strrpos($hour->start, "T")+1),5) }}</p>
                    </a>
                </li>
            @empty
                <li>
                    <a href="#">
                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                        <p class="task-details">Нямате запазени часове!</p>
                    </a>
                </li>
            @endforelse
        </ul>
    </li>
    <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
</ul>

