<?php
$notifications = optional(auth()->user())->unreadNotifications;
$notifications_count = optional($notifications)->count();
$notifications_latest = optional($notifications)->take(5);
$total_enquiry = App\Models\Contact::where('is_view', 0)->count();
$total_checkouts = App\Models\Checkout::where('is_viewchackout', 0)->count();
?>

<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand d-sm-flex justify-content-center">
            <img class="sidebar-brand-full" src="{{ asset('img/logo.png') }}" alt="{{ app_name() }}" height="46">
            <img class="sidebar-brand-narrow" src="{{ asset('img/logo-square.jpg') }}" alt="{{ app_name() }}"
                height="46">
        </div>
        <button class="btn-close d-lg-none" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" type="button"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.dashboard') }}">
                <i class="nav-icon fa-solid fa-cubes"></i>&nbsp;@lang('Dashboard')
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.notifications.index') }}">
                <i class="nav-icon fa-regular fa-bell"></i>&nbsp;@lang('Notifications')
                @if ($notifications_count)
                    &nbsp;<span class="badge badge-sm bg-info ms-auto">{{ $notifications_count }}</span>
                @endif
            </a>
        </li> --}}

        {{-- @can('view_posts')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.posts.index') }}">
                    <i class="nav-icon fa-regular fa-file-lines"></i>&nbsp;@lang('Posts')
                </a>
            </li>
        @endcan --}}
        {{-- @can('view_categories')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.categories.index') }}">
                    <i class="nav-icon fa-solid fa-diagram-project"></i>&nbsp;@lang('Categories')
                </a>
            </li>
        @endcan --}}
        @can('Inquiry')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="">
                    <i class="nav-icon fa-solid fa-question"></i>&nbsp;@lang('Contact enquiry')<p class="notify001">
                        {{ $total_enquiry + $total_checkouts }}
                    </p>
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('message.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet"></span>
                            </span> <span id="is_view">Contact enquiry</span>
                            <p class="notify001">
                                {{ $total_enquiry }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inquairy.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet"></span>
                            </span> <span id="is_viewchackout">Property enquiry</span>
                            <p class="notify001">
                                {{ $total_checkouts }}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('CURRENCY')
            <li class="nav-item">
                <a class="nav-link" href="/admin/currency">
                    <i class="nav-icon  fa-solid fa-money-bill-1-wave"></i>&nbsp;@lang('Currency')
                </a>
            </li>
        @endcan


        @can('country')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa fa-address-card" aria-hidden="true"></i>&nbsp;@lang('Address')
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/country">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Country
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/state">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> State
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/city">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> City
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('property')
            <li class="nav-item">
                <a class="nav-link" href="/admin/property">
                    <i class="nav-icon fa-solid fa-store"></i>&nbsp;@lang('Property')
                </a>
            </li>
        @endcan
        @can('facilities')
            <li class="nav-item">
                <a class="nav-link" href="/admin/facility">
                    <i class="nav-icon fa-solid fa-font-awesome"></i>&nbsp;Facilities
                </a>
            </li>
        @endcan
        {{-- @can('rent property')
            <li class="nav-item">
                <a class="nav-link" href="/admin/rent">
                    <i class="nav-icon fa-solid fa-house"></i>&nbsp;@lang('Rent Property')
                </a>
            </li>
        @endcan --}}

        @can('holiday')
            <li class="nav-item">
                <a class="nav-link" href="/admin/holiday">
                    <i class="nav-icon fa-solid fa-hotel"></i>&nbsp;@lang('Holiday Rental')
                </a>
            </li>
        @endcan

        <li class="nav-group" aria-expanded="true">
            <a class="nav-link nav-group-toggle" href="#">
                <i class="nav-icon fa fa-book" aria-hidden="true"></i>&nbsp;About Us
            </a>
            <ul class="nav-group-items compact" style="height: auto;">
                @can('Brand')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/brand">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> &nbsp;@lang('Our Brands')
                        </a>
                    </li>
                @endcan
                @can('professionals')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/professionals">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> &nbsp;@lang('Our Realtors')
                        </a>
                    </li>
                @endcan
                @can('testimonial')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('testimonial.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> &nbsp;@lang('Testimonials')
                        </a>
                    </li>
                @endcan
            </ul>
        </li>

        {{-- @can('view_backups')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.backups.index') }}">
                    <i class="nav-icon fa-solid fa-box-archive"></i>&nbsp;@lang('Backups')
                </a>
            </li>
        @endcan --}}

        @can('view_users')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.users.index') }}">
                    <i class="nav-icon fa-solid fa-user-group"></i>&nbsp;@lang('Users')
                </a>
            </li>
        @endcan
        {{--
        @can('view_roles')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.roles.index') }}">
                    <i class="nav-icon fa-solid fa-user-shield"></i>&nbsp;@lang('Roles')
                </a>
            </li>
        @endcan --}}

        {{-- @can('view_logs')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-solid fa-list-ul"></i>&nbsp;@lang('Logs')
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::dashboard') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Log Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::logs.list') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Daily Log
                        </a>
                    </li>
                </ul>
            </li>
        @endcan --}}
        @can('edit_settings')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.settings') }}">
                    <i class="nav-icon fa-solid fa-gears"></i>&nbsp;@lang('Settings')
                </a>
            </li>
        @endcan

    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" data-coreui-toggle="unfoldable" type="button"></button>
    </div>
</div>
<style>
    p.notify001 {
        color: #fff;
        background-color: #e62525;
        width: 1.5vw;
        height: 3vh;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 41px;
        font-size: 12px;
    }
</style>
