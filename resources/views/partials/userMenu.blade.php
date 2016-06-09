<!--User menu-->
<section id="user-menu">
    <div class="user-menu-left">
        <img src="{{ asset('build/img/sett.png') }}" alt="image" />
    </div>
    <div class="user-menu-right">
        <ul>
            <li><a href=""><i class="fa fa-briefcase"></i></a></li>
            <li><a href=""><i class="fa fa-envelope-o"></i></a></li>
            <li><a href=""><i class="fa fa-bell-o"></i></a><span class="badge">4</span></li>
            <li><a href=""><i class="fa fa-repeat"></i></a></li>
            <li class="menu-user-avatar"><a href="{{ url("account/".Auth::user()->id) }}"><img src="{{ asset('build/img/client3.jpg') }}" alt="image" /></i>
                </a></li>
            <li><a href=""><img src="{{ asset('build/img/logout.png') }}" alt="image" /></a></li>
        </ul>
    </div>
</section>