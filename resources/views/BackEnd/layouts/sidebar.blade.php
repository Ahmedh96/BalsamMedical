<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{url('design/BackEnd')}}/assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
      -->
    <div class="logo">
      <a href="{{route('admin.dashbord')}}" class="simple-text logo-mini">
        B
      </a>
      <a href="{{route('admin.dashbord')}}" class="simple-text logo-normal">
        balsam
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.dashbord')}}">
            <i class="material-icons">dashboard</i>
            <p>@lang('lang.Dashbord')
            </p>
          </a>
        </li>
        <!-- Start Users -->
        @can('isAdmin')
        <li class="nav-item {{is_active('users')}}">
          <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="true">
            <i class="material-icons">person</i>
            <p>@lang('lang.Users Management')
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="users">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="material-icons">view_module</i>
                    <span class="sidebar-normal">@lang('lang.Show')</span>
                </a>
              </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('users.create')}}">
                        <i class="material-icons">person_add</i>
                        <span class="sidebar-normal">@lang('lang.Create')</span>
                    </a>
                </li>
            </ul>
          </div>
        </li>
        @endcan
        <!-- End Users -->


        <!-- Start Categories -->
        <li class="nav-item {{is_active('categories')}}">
            <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="true">
                <i class="material-icons">folder</i>
                <p>@lang('lang.Categories')
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="categories">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('categories.index')}}">
                            <i class="material-icons">view_module</i>
                            <span class="sidebar-normal">@lang('lang.Show')</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('categories.create')}}">
                            <i class="material-icons">add</i>
                            <span class="sidebar-normal">@lang('lang.Create')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- End Categories -->

        <!-- Start Pages -->
        <li class="nav-item {{is_active('pages')}}">
            <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="true">
                <i class="material-icons">assignment</i>
                <p>@lang('lang.Pages')
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="pages">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('pages.index')}}">
                            <i class="material-icons">view_module</i>
                            <span class="sidebar-normal">@lang('lang.Show')</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('pages.create')}}">
                            <i class="material-icons">add</i>
                            <span class="sidebar-normal">@lang('lang.Create')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- End Pages -->

        <!-- Start Posts -->
        <li class="nav-item {{is_active('posts')}}">
            <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="true">
                <i class="material-icons">assignment</i>
                <p>@lang('lang.Posts')
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="posts">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('posts.index')}}">
                            <i class="material-icons">view_module</i>
                            <span class="sidebar-normal">@lang('lang.Show')</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('posts.create')}}">
                            <i class="material-icons">add</i>
                            <span class="sidebar-normal">@lang('lang.Create')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- End Posts -->


        <!-- Start Contacts -->
        <li class="nav-item {{is_active('contacts')}}">
            <a class="nav-link" data-toggle="collapse" href="#contacts" aria-expanded="true">
                <i class="material-icons">contacts</i>
                <p>@lang('lang.Contact')
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="contacts">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('contacts.index')}}">
                            <i class="material-icons">view_module</i>
                            <span class="sidebar-normal">@lang('lang.Show')</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('contacts.create')}}">
                            <i class="material-icons">add</i>
                            <span class="sidebar-normal">@lang('lang.Create')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- End Contacts -->

        <!-- Start Settings -->
        <li class="nav-item {{is_active('settings')}}">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="true">
                <i class="material-icons">settings</i>
                <p>@lang('lang.Settings')
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('settings.index')}}">
                            <i class="material-icons">view_module</i>
                            <span class="sidebar-normal">@lang('lang.Show')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- End Settings -->
      </ul>
    </div>
  </div>
