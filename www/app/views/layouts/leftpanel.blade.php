<aside id="left-panel">

    {{-- User info --}}
    <div class="login-info">
                    <span>
                        <img src="/img/avatars/sunny.png" alt="me" class="online" />
                        <a href="javascript:void(0);" id="show-shortcut">
                            @if (Auth::user())
                            {{ Auth::user()->name }}
                            @else
                            Convidado
                            @endif<i class="fa fa-angle-down"></i>
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
                <a href="{{ URL::to('moradores/') }}" title="Moradores"><i class="fa fa-lg fa-fw fa-male"></i> <span class="menu-item-parent">Moradores</span></a>
            </li>
            <li class="">
                <a href="{{ URL::to('users/') }}" title="Usuários"><i class="fa fa-lg fa-fw fa-male"></i> <span class="menu-item-parent">Usuários</span></a>
            </li>
        </ul>
    </nav>
    {{-- End menu --}}
    <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>