@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            
            @can('cms_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.cms.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('page_access')
                    <li class="{{ $request->segment(3) == 'pages' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.manage-cms-pages.title')
                            </span>
                        </a>
                    </li>
                    @endcan
                    <li class="{{ $request->segment(3) == 'banners' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.banners.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.manage-banners.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(3) == 'fqas' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.fqas.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.manage-fqas.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(3) == 'testimonials' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.testimonials.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.manage-testimonials.title')
                            </span>
                        </a>
                    </li>
                </ul>

            </li>
            @endcan

            @can('messages_feature_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Messaging Feature</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('contact_messages_access')
                <li class="{{ $request->segment(2) == 'contact_message' ? 'active active-sub' : '' }}">
                        <a href="{{ url('admin/contact_message') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                Contact Messages
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan

            <!-- @can('product_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('brand_access')
                <li class="{{ $request->segment(3) == 'brands' ? 'active active-sub' : '' }}">
                    <a href="{{ route('admin.brands.index') }}">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">
                            Product Brand
                        </span>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
            @endcan -->

            @can('catalog')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Catalog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('category_access')
                    <li class="{{ $request->segment(3) == 'categories' ? 'active active-sub' : '' }}">
                        <a href="{{ url('admin/manager/categories') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    @endcan

                    @can('brand_access')
                    <li class="{{ $request->segment(3) == 'brands' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.brands.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                Product Brand
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('shop_access')
                    <li class="{{ $request->segment(3) == 'shops' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.shops.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                Shops
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('product_access')
                    <li class="{{ $request->segment(3) == 'products' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.products.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                Products
                            </span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
