<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Brand Logo -->
            <a href="{{route('admin.main.index')}}" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light"> Admin Blog</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('storage/' . auth()->user()->image_avatar)}}" class="img-circle elevation-2"
                             alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin {{auth()->user()->name}}</a>
                    </div>
                </div>

                <li class="nav-item">
                    <a href="{{route('admin.main.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            Main
                        </p>
                    </a>


                    <a href="{{route('admin.user.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-users"></i>
                        <p>
                            User
                        </p>
                    </a>


                    <a href="{{route('admin.post.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-regular fa-file-lines"></i>
                        <p>
                            Post
                        </p>
                    </a>

                    <a href="{{route('admin.comment.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-comment-dots"></i>
                        <p>
                            Comment
                        </p>
                    </a>


                    <a href="{{route('admin.category.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-bars-progress"></i>
                        <p>
                            Category
                        </p>
                    </a>

                    <a href="{{route('admin.tag.index')}}" class="nav-link brand-text font-weight-light">
                        <i class="fa-solid fa-hashtag"></i>
                        <p>
                            Tag
                        </p>
                    </a>

                </li>
            </div>
        </ul>
    </nav>

</aside>
