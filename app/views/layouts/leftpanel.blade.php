<aside id="left-panel">

    {{-- User info --}}
    <div class="login-info">
                    <span>
                        <img src="/img/avatars/sunny.png" alt="me" class="online" />
                        <a href="javascript:void(0);" id="show-shortcut">
                            @if (Sentry::getUser())
                            {{ Sentry::getUser()->first_name }}
                            @else
                            Convidado
                            @endif
                        </a>
                    </span>
    </div>
    {{-- end user info --}}

    {{-- Menu --}}
    <nav>
        <ul>
            <li class="">
                <a href="{{ URL::to('/') }}" title=""><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
            </li>
            <li class="">
                <a href="{{ URL::to('residents/') }}" title="Moradores"><i class="fa fa-lg fa-fw fa-male"></i> <span class="menu-item-parent">Moradores</span></a>
            </li>
            <li class="">
                <a href="{{ URL::to('units/') }}" title="Unidades"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Unidades</span></a>
            </li>
            <li class="">
                <a href="{{ URL::to('users/') }}" title="Usuários"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Usuários</span></a>
            </li>
            <li class="">
                <a href="{{ URL::to('groups/') }}" title="Grupos"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Grupos</span></a>
            </li>
        </ul>
    </nav>
    {{-- End menu --}}
    {{-- <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span> --}}

</aside>