sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ route('admin.dashboard') }}">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
           <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Forms</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="{{ route('admin.add') }}">Add New Administrator</a></li>
              <li><a href="{{ route('admin.product.add') }}">Add New Product</a></li>
              <!-- <li><a href="@{{ route('insurer.add') }}">Add New Insurer</a></li>
              <li><a href="@{{ route('project.show') }}">Create Project</a></li>
              <li><a href="@{{ route('photo.show') }}">Upload Photo</a></li> -->
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Tables</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="{{ route('admin.list') }}">Show Administrators</a></li>
              <li><a href="{{ route('admin.user.list') }}">Show Users</a></li>
              <li><a href="{{ route('admin.list.product') }}">Show Products</a></li>
              <li><a href="{{ route('admin.list.invoices') }}">Show Invoices</a></li>
              <!-- <li><a href="@{{ route('admin.list.photo') }}">Show Photos</a></li>
              <li><a href="@{{ route('type.lawyer.add') }}">Type of Lawyers</a></li> -->

            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end