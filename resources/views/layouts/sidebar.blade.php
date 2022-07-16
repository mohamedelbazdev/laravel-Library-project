<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/site/books" class="brand-link">
        <img src="{{ asset('upload/images/R.jpg') }}" alt="Admin Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Library
</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('vendors/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admins.index') }}" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               {{-- Categories --}}
                <li class="nav-item menu">
                    <a href="#" class="nav-link {{ Request::is('admin/category')? 'active':''}} {{ Request::is('admin/category/create')? 'active':''}}"">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('category.create') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Books --}}
                <li class="nav-item menu  " >
                    <a href="#" class="nav-link {{ Request::is('admin/books') ? 'active':'' }} {{ Request::is('admin/books/create')? 'active':''}}">
                        <i class="fas fa-book-open"></i>

                        <p>
                            Books
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">
                            <a href="{{ route('books.create') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Books</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Books</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Users --}}
                <li class="nav-item menu " >
                    <a href="#" class="nav-link  {{ Request::is('users') ? 'active':'' }} {{ Request::is('users/create') ? 'active':'' }}">

                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link  " >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All users</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Admins --}}
                <li class="nav-item menu" >
                    <a href="#" class="nav-link  {{ Request::is('admin/admins') ? 'active':'' }} {{ Request::is('admin/admins/create') ? 'active':'' }} ">

                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.create') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All admins</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Authors --}}
                <li class="nav-item menu {{ Request::is('authors')? 'active':'';}}" >
                    <a href="#" class="nav-link ">

                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Author
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('authors.create') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Author</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('authors.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Authors</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


