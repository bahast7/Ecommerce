<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/user-addresses*")||request()->is("admin/userpayments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_address_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-addresses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-addresses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.userAddress.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('userpayment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/userpayments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.userpayments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-cc-visa">
                                        </i>
                                        {{ trans('cruds.userpayment.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('basic_information_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/paymenttypes*")||request()->is("admin/product-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.basicInformation.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('paymenttype_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/paymenttypes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.paymenttypes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-amazon-pay">
                                        </i>
                                        {{ trans('cruds.paymenttype.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('product_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/product-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.product-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-atlas">
                                        </i>
                                        {{ trans('cruds.productCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_inventory_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/product-inventories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.product-inventories.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-archive">
                            </i>
                            {{ trans('cruds.productInventory.title') }}
                        </a>
                    </li>
                @endcan
                @can('discount_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/discounts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.discounts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-money-check-alt">
                            </i>
                            {{ trans('cruds.discount.title') }}
                        </a>
                    </li>
                @endcan
                @can('product_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/products*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.products.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-backspace">
                            </i>
                            {{ trans('cruds.product.title') }}
                        </a>
                    </li>
                @endcan
                @can('shopping_session_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/shopping-sessions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.shopping-sessions.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-luggage-cart">
                            </i>
                            {{ trans('cruds.shoppingSession.title') }}
                        </a>
                    </li>
                @endcan
                @can('cart_item_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/cart-items*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.cart-items.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cart-plus">
                            </i>
                            {{ trans('cruds.cartItem.title') }}
                        </a>
                    </li>
                @endcan
                @can('payment_detail_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/payment-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payment-details.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-credit-card">
                            </i>
                            {{ trans('cruds.paymentDetail.title') }}
                        </a>
                    </li>
                @endcan
                @can('order_detail_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/order-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.order-details.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fab fa-first-order-alt">
                            </i>
                            {{ trans('cruds.orderDetail.title') }}
                        </a>
                    </li>
                @endcan
                @can('order_item_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/order-items*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.order-items.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cart-arrow-down">
                            </i>
                            {{ trans('cruds.orderItem.title') }}
                        </a>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/content-categories*")||request()->is("admin/content-tags*")||request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-book">
                            </i>
                            {{ trans('cruds.contentManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('content_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.contentCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-tags">
                                        </i>
                                        {{ trans('cruds.contentTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-pages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file">
                                        </i>
                                        {{ trans('cruds.contentPage.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/task-statuses*")||request()->is("admin/task-tags*")||request()->is("admin/tasks*")||request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-list">
                            </i>
                            {{ trans('cruds.taskManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('task_status_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-statuses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tasks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tasks.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.task.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_calendar_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-calendars.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-calendar">
                                        </i>
                                        {{ trans('cruds.taskCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('faq_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/faq-categories*")||request()->is("admin/faq-questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-question">
                            </i>
                            {{ trans('cruds.faqManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('faq_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/faq-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.faq-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.faqCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/faq-questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.faq-questions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-question">
                                        </i>
                                        {{ trans('cruds.faqQuestion.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>