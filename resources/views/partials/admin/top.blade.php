<div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
        <a href="{{ route('admin.dashboard') }}" class="logo">Ismartz</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
    {!! Form::open(array('url' => route('admin.search'), 'class'    =>  "searchform" )) !!}
    <input type="text" class="searchbox" id="searchbox" placeholder="Search">
    <span class="searchbutton"><i class="fa fa-search"></i></span>
    {!! Form::close() !!}
            <!-- End Searchbox -->

    <!-- Start Top Menu -->
    <ul class="topmenu">
        <li><a href="#">Files</a></li>
        <li><a href="http://bit.do/bromq">Authors</a></li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Files <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Videos</a></li>
                <li><a href="#">Pictures</a></li>
                <li><a href="#">Blog Posts</a></li>
            </ul>
        </li>
    </ul>
    <!-- End Top Menu -->

    <!-- Start Sidepanel Show-Hide Button -->
    <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">

        <li class="dropdown link">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Show <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list">
                <li><a href="{{ route('admin.slider.main') }}"><i class="fa falist fa-file-image-o"></i>Main Slider</a></li>
                <li><a href="{{ route('admin.homepage.main-post.index') }}"><i class="fa falist fa-font"></i>Intro Content</a></li>
                <li><a href="{{ route('admin.homepage.features.index') }}"><i class="fa falist fa-font"></i>Built-in Features Content</a></li>
                <li><a href="{{ route('admin.homepage.website.sample.index') }}"><i class="fa falist fa-file-image-o"></i>Sample Website Slider</a></li>
                <li><a href="{{ route('admin.homepage.creative.slider.index') }}"><i class="fa falist fa-file-image-o"></i>Creative Slider</a></li>
                <li><a href="#"><i class="fa falist fa-font"></i>Websites Features Content</a></li>
                <li><a href="#"><i class="fa falist fa-file-image-o"></i>Websites Features Slider</a></li>
                <li><a href="#"><i class="fa falist fa-font"></i>Testimonials</a></li>
                <li><a href="#"><i class="fa falist fa-font"></i>Blog</a></li>
                <li><a href="#"><i class="fa falist fa-money"></i>Pricing Packages</a></li>
                <li><a href="#"><i class="fa falist fa-at"></i>Contact Page</a></li>
            </ul>
        </li>

        <li class="dropdown link">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list">
                <li><a href="{{ route('admin.slider.main.create') }}"><i class="fa falist fa-file-image-o"></i>Main Slider</a></li>
                <li><a href="{{ route('admin.homepage.features.create') }}"><i class="fa falist fa-font"></i>Built-in Features Content</a></li>
                <li><a href="{{ route('admin.homepage.website.sample.create') }}"><i class="fa falist fa-file-image-o"></i>Sample Website Slider</a></li>
                <li><a href="#"><i class="fa falist fa-file-image-o"></i>Creative Slider</a></li>
                <li><a href="#"><i class="fa falist fa-file-image-o"></i>Websites Features Slider</a></li>
                <li><a href="#"><i class="fa falist fa-font"></i>Testimonials</a></li>
                <li><a href="#"><i class="fa falist fa-font"></i>Blog</a></li>
            </ul>
        </li>

        <li class="link">
            <a href="#" class="notifications">6</a>
        </li>

        <li class="dropdown link">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="{{ asset('build/adminAssets/img/profileimg.png') }}" alt="img"><b>Jonathan Doe</b><span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                <li role="presentation" class="dropdown-header">Profile</li>
                <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li>
                <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li>
                <li><a href="#"><i class="fa falist fa-wrench"></i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li>
                <li><a href="#"><i class="fa falist fa-power-off"></i> Logout</a></li>
            </ul>
        </li>

    </ul>
    <!-- End Top Right -->

</div>