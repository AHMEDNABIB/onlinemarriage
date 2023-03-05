<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div class="parent-icon"><i class="lni lni-users"></i></div> --}}
        <div>
            <h4 class="logo-text">
                <a href="{{ route('admin.dashboard') }}">
                    {{-- <img src="{{ asset(isset(settings()->main_logo)?settings()->main_logo:'') }}" alt="" height="30px" width="150"> --}}

                    <h5>Bd Marraige</h5>
                </a>

            </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->path() == 'admin/dashboard' ? 'bg-dark':'' }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        

        {{-- admin --}}
        @if(admin()->roles == "super")
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">Admin</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.create') }}" class="{{ request()->path() == 'admin/create' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
                </li>
                <li>
                    <a href="{{ route('admin.allAdmin') }}" class="{{ request()->path() == 'admin/all-admin' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>All Admin</a>
                </li>
                <li>
                    <a href="{{ route('admin.trashList') }}" class="{{ request()->path() == 'admin/trash-list' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
                </li>
            </ul>
        </li>
        @endif
        
        {{-- profile --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.profile.create') }}" class="{{ request()->path() == 'admin/profile/create' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Create Profile</a>
                </li>

                <li>
                    <a href="{{ route('admin.profile.search') }}" class="{{ request()->path() == 'admin/profile/search' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>search Profile</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.profile.index') }}" class="{{ request()->path() == 'admin/profile/' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>All Profile</a>
                </li>
   
            </ul>
        </li>





        {{-- marriage --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">Marriage</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.marriage.new') }}" class="{{ request()->path() == 'admin/marriage/new' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>New Marriage</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.marriage.index') }}" class="{{ request()->path() == 'admin/marriage/index' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>All Marriage</a>
                </li>


                {{-- ReMarriage --}}

                <li>
                    <a href="javascript:;" class="has-arrow"><i class="bx bx-right-arrow-alt"> </i>Remarriage</a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.marriage.permission') }}" class="{{ request()->path() == 'admin/marriage/permission' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Permission Letter</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.marriage.divorce') }}" class="{{ request()->path() == 'admin/marriage/divorce' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Divorce</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.marriage.death') }}" class="{{ request()->path() == 'admin/marriage/death' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Death</a>
                        </li>
                        
                    </ul>
                </li>


                <li>
                    <a href="{{ route('admin.marriage.dowanload') }}" class="{{ request()->path() == 'admin/marriage/dowanload' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i> Marriage Dowanlaod From</a>
                </li>
                <li>
                    <a href="{{ route('admin.marriage.rules') }}" class="{{ request()->path() == 'admin/marriage/rules' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i> Marriage Rules</a>
                </li>


               
            </ul>
        </li>


        {{-- divorce --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">Divorce</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.divorce.create') }}" class="{{ request()->path() == 'admin/divorce/create' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Divorce</a>
                </li>
                 <li>
                    <a href="{{ route('admin.divorce.add') }}" class="{{ request()->path() == 'admin/divorce/add' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Divorce Annulment</a>
                </li>
                <li>
                    <a href="{{ route('admin.divorce.dowanload') }}" class="{{ request()->path() == 'admin/divorce/dowanload' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i> Divorce Dowanlaod From</a>
                </li>
                <li>
                    <a href="{{ route('admin.divorce.index') }}" class="{{ request()->path() == 'admin/divorce/' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>All Divorce</a>
                </li>
               
            </ul>
        </li>

        {{-- shop --}}
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-shopping-bag"></i>
                </div>
                <div class="menu-title">Shop</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.shop.add') }}" class="{{ request()->path() == 'admin/shop/add' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Add Shop</a>
                </li>
                <li>
                    <a href="{{ route('admin.shop.index') }}" class="{{ request()->path() == 'admin/shop/index' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>All Shop</a>
                </li>
                <li>
                    <a href="{{ route('admin.shop.trash_list') }}" class="{{ request()->path() == 'admin/shop/trash-list' ? 'bg-dark':'' }}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
                </li>
            </ul>
        </li> --}}




        {{-- contact us --}}
        <li>
            <a href="{{ route('admin.contact_us') }}" class="{{ request()->path() == 'admin/contact-us' ? 'bg-dark':'' }}">
                <div class="parent-icon"><i class='lni lni-phone'></i>
                </div>
                <div class="menu-title">Contact Us</div>
            </a>
        </li>

        {{-- Settings --}}
        <li>
            <a href="{{ route('admin.settings') }}" class="{{ request()->path() == 'admin/settings' ? 'bg-dark':'' }}">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
