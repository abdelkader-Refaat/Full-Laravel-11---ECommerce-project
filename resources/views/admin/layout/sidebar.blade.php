<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('admin/img/abdelkader.jpeg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5 text-gray-500">{{__('admin_sidebar.name')}}</h1>
        <p class="text-gray-200">{{__('admin_sidebar.position')}}</p>
      </div>
    </div>
    <ul class="list-unstyled">



            <li class={{ Route::currentRouteName() == 'admin.dashboard' ? "active" : ''}}><a href="{{route('admin.dashboard')}}"> <i class="icon-home"></i>{{trans('master.Home')}} </a></li>
                <li class={{ Route::currentRouteName() == 'categories.index' ? "active" : ''}}><a href="{{route('categories.index')}}"> <i class="icon-grid"></i>{{trans('master.category')}} </a></li>
                <li class={{ Route::currentRouteName() == 'products.index' ? "active" : ''}}><a href="{{route('products.index')}}"> <i class="icon-grid"></i>{{trans('master.product')}} </a></li>
                <li class={{ Route::currentRouteName() == 'admin.orders' ? "active" : ''}}><a href="{{route('admin.orders')}}"> <i class="icon-grid"></i>{{trans('master.order')}} </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
        </ul>
    </nav>
