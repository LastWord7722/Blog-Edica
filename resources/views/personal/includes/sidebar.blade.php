<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-cyan elevation-4">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light"> Personal Cabinet</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block">User {{auth()->user()->name}}</a>
                    </div>
                </div>

                <li class="nav-item">
                    <a href="{{route('personal.home')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            Main
                        </p>
                    </a>


                    <a href="{{route('personal.like.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-regular fa-heart"></i>
                        <p>
                            Like
                        </p>
                    </a>


                    <a href="{{route('personal.comment.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-regular fa-file-lines"></i>
                        <p>
                            Comments
                        </p>
                    </a>

                </li>
            </div>

        </ul>

    </nav>

</aside>
