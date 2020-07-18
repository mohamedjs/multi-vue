
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class=" nav-link active " href="{{ route('admin.home.index') }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Dashboard
            </a>
        </li>

        @can("index", \App\Models\User::class)
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.users.index",['type' => $userTypes::USER]) }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Customers
            </a>
        </li>
        @endcan

        @can("admin", \App\Models\User::class)
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.users.index",['type' => $userTypes::ADMIN]) }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Admin
            </a>
        </li>
        @endcan

        @can("index", \App\Models\Role::class)
            <li class="nav-item">
                <a class="nav-link " href="{{ route("admin.roles.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Roles
                </a>
            </li>
        @endcan

        @can("index", \App\Models\City::class)
            <li class="nav-item">
                <a class="nav-link " href="{{ route("admin.cities.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Cities
                </a>
            </li>
        @endcan

        @can("index", \App\Models\Area::class)
            <li class="nav-item">
                <a class="nav-link " href="{{ route("admin.areas.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Areas
                </a>
            </li>
        @endcan

        @can("index", \App\Models\ContactUs::class)
            <li class="nav-item">
                <a class="nav-link " href="{{ route("admin.contact.us.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Support &nbsp;&nbsp;
                    <span class="badge btn btn-sm btn-danger pull-left contact_number">{{contact_unread()}}</span>
                </a>
            </li>
        @endcan

        @can("index", \App\Models\Category::class)
            <li class="nav-item">
                <a class="nav-link " href="{{ route("admin.categories.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Categories
                </a>
            </li>
        @endcan

        @can("index", \App\Models\Provider::class)
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.providers.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Providers
                </a>
            </li>
        @endcan

        @can("index", \App\Models\Demand::class)
        <li class="nav-item">
            <a class="nav-link" href="{{ route("admin.demands.index") }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Requests &nbsp;&nbsp;
                <span class="badge btn btn-sm btn-danger pull-left request_number">{{demand_unread()}}</span>
            </a>
        </li>
        @endcan

        @can("index", \App\Models\Payment::class)
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.payments.index") }}">
                    <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Payments &nbsp;&nbsp;
                </a>
            </li>
        @endcan

        @if(
        auth()->user()->hasAccess("admin.reports.users") ||
        auth()->user()->hasAccess("admin.reports.providers") ||
        auth()->user()->hasAccess("admin.reports.financials") ||
        auth()->user()->hasAccess("admin.reports.cities")
        )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Reports &nbsp;&nbsp;
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @can("users", \App\Models\User::class)
                        <a class="nav-item dropdown-item" href="{{ route("admin.reports.users",['type' => $userTypes::USER]) }}">
                            <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Users &nbsp;&nbsp;
                        </a>
                    @endcan

                    @can("providers", \App\Models\User::class)
                        <a class="nav-item dropdown-item" href="{{ route("admin.reports.providers") }}">
                            <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Providers &nbsp;&nbsp;
                        </a>
                    @endcan

                    @can("cities", \App\Models\User::class)
                        <a class="nav-item dropdown-item" href="{{ route("admin.reports.cities") }}">
                            <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Cities &nbsp;&nbsp;
                        </a>
                    @endcan

                    @can("financials", \App\Models\User::class)
                        <a class="nav-item dropdown-item" href="{{ route("admin.reports.financials") }}">
                            <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Financial &nbsp;&nbsp;
                        </a>
                    @endcan
                </div>
            </li>
        @endcan
    </ul>
