<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/content-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/content-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/content-pages*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.contentManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-folder">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tags">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentTag.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentPage.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('courses_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/course-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/course-subjects*') ? 'menu-open' : '' }} {{ request()->is('admin/course-chapter-groups*') ? 'menu-open' : '' }} {{ request()->is('admin/course-chapters*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.coursesManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('course_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-categories.index") }}" class="nav-link {{ request()->is('admin/course-categories') || request()->is('admin/course-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-folder">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.courseCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_subject_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-subjects.index") }}" class="nav-link {{ request()->is('admin/course-subjects') || request()->is('admin/course-subjects/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tags">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.courseSubject.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_chapter_group_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-chapter-groups.index") }}" class="nav-link {{ request()->is('admin/course-chapter-groups') || request()->is('admin/course-chapter-groups/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-map-marker">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.courseChapterGroup.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_chapter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-chapters.index") }}" class="nav-link {{ request()->is('admin/course-chapters') || request()->is('admin/course-chapters/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-folder-open">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.courseChapter.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>