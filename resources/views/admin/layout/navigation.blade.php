<aside id="left-panel" class="left-panel ">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="https://ik.imagekit.io/lt20pon3d/icon/Logo-01.jpg?updatedAt=1692619075862&fbclid=IwAR1DphAegngFU_JjPmKmIRqK5BpoBCbRTlDBVpHzlr3OweOYl3Nf2QusA_E" alt="Logo" width="140px" style=" display: inline-block;background-color: #fff;padding: 10px;border: 1px solid white;border-radius: 20px 20px;"></a>
                <a class="navbar-brand hidden" href="./"><img src="https://ik.imagekit.io/lt20pon3d/icon/Logo-01.jpg?updatedAt=1692619075862&fbclid=IwAR1DphAegngFU_JjPmKmIRqK5BpoBCbRTlDBVpHzlr3OweOYl3Nf2QusA_E" alt="Logo" style="border-radius: 5px;"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('back')}}"> <i class="menu-icon fa fa-dashboard fa-lg"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="{{route('blog')}}"> <i class="menu-icon fa fa-user fa-lg"></i>Blog</a>
                    </li>

                    <li>
                        <a href="{{route('contact')}}"> <i class="menu-icon fa fa-users fa-lg"></i>Contact</a>
                    </li>

                    <li>
                        <a href="{{route('enquiry')}}"> <i class="menu-icon fa fa-file fa-lg"></i>Enquiry</a>
                    </li>
                    
                    <li>
                        <a href="{{route('intake.index')}}"> <i class="menu-icon fa fa-file fa-lg"></i>Intake</a>
                    </li>

                    <li>
                        <a href="{{route('jobOpening')}}"> <i class="menu-icon fa fa-gear fa-lg"></i>Job Opening</a>
                    </li>
                    
                    <li>
                        <a href="{{route('jobApply')}}"> <i class="menu-icon fa fa-gear fa-lg"></i>Job Apply</a>
                    </li>

                    <li>
                        <a href="('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> 
                            <i class="menu-icon fa fa-sign-out fa-lg"></i> 
                                Logout 
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->