<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <i class="fas fa-vr-cardboard"></i>
        </div>
        <div class="nav_title">
            <span>{{__('team.team')}}</span>
        </div>
    </a>
    <ul>

        @if (permissionCheck('team.settings'))
            <li>
                <a href="{{ route('team.settings') }}">  {{__('team.team Settings')}}</a>
            </li>
        @endif
    </ul>
</li>
