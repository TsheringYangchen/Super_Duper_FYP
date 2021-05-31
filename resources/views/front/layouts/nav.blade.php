
<nav class="navbar navbar-expand-lg navbar-dark fixed-top"  style="background-color: #40739e">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> 
        <span class="navbar-toggler-icon"></span> 
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/bin') }}">Issue BIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ein') }}">Issue EIN</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/download') }}">Download</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/licensee-login') }}">View License Status</a>
                </li>
                @if (auth()->check())
                <li>
                    <?php $image=auth()->user()->avatar;?>
                    <avatar><img style="height:40px;width:40px;border-radius:50%;" src="{{ url('uploads/avatars').'/'.$image}}" alt="{{$image}}"/></avatar>
                </li>
                <?php?>
                @endif
                
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       
                       {{ auth()->check() ? auth()->user()->name : 'Account' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        @if (!auth()->check())
                            <a class="dropdown-item " href="{{  url('user/login') }}">Sign In</a>
                        @else
                            <a class="dropdown-item" href="{{  url('user/profile') }}"><i class="fa fa-user"></i> User Profile</a>
                            
                            <hr>
                            <a class="dropdown-item" href="{{  url('/user/profile/change-password') }}"><i class="fa fa-key"></i> Change Password</a>
                            <hr>
                            <a class="dropdown-item" href="{{  url('user/logout') }}"><i class="fa fa-lock"></i> Logout</a>
                        @endif
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
