
<script defer="defer" src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>

    <link href="/tail/tailwind.css" rel="stylesheet"/>

<!-- page -->
<main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <!-- header page -->
    <header
        class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
        <!-- logo -->
        <div class="bcon">
            <button type="button" class="btn" @click="asideOpen = !asideOpen">
                <i class="bx bx-menu"></i>
            </button>
            <div class="ubtn">
                <x-dropdown alignment="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                                <div class="-mr-2 flex items-center sm:hidden"></x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="black" viewBox="0 0 24 24">
                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

</div>

</header>

<div class="flex">
<!-- aside -->
<aside class="as" x-show="asideOpen">
    <a href="#" class="Menu">
        <img src="./images/microhotel1.png" alt="" srcset="" class="hi">
            <span>
                <h3>
                    <i class="bx bx-home">Dashboard</i></h3>
                
            </span>
        </a>
        <div>
            <a href="manage_room" class="Menu">
                <span>
                    <h3>
                        <i class="bx bx-bed">Manage Rooms</i>
                    </h3>
                </span>
            </a>
        </div>
        <div>
            <a href="#" class="menu">
                <span>
                    <h3>
                        <i class="bx bx-note">Booking History</i>
                    </h3>
                </span>
            </a>
        </div>

        <div>
            <a
                href="#"
                class="Menu"
                @click="profileOpen = !profileOpen"
                @click.outside="profileOpen = false">
                <span>
                    <h3>
                        <i class="bx bx-bx bx-user">Accounts</i>
                    </h3>
                </span>
                <div
                    class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md"
                    x-show="profileOpen"
                    x-transition="x-transition">

                    <div class="flex flex-col space-y-3 p-2">

                        <a href="guestList" class="transition  bx bx-bx bx-user">Guest</a>
                        <br>
                            <a href="#" class="transition  bx bx-bx bx-user">Front Desk</a>
                        </div>
                    </a>
                </div>
                <a href="report" class="Menu">
                    <span>
                        <h3>
                            <i class="bx bx-note">Reports</i>
                        </h3>
                    </span>
                </a>
            </aside>
        </div>
               

                    <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label for="">Registered Guest</label>
                            <h1>{{ $totalGuest }}</h1>
                            <i href="{{ url('admin/Users.php')}}" class="text-white"></i>
                            <a href="guestList">Views</a>
                         
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label for="">Registered Frontdesk</label>
                            <h1>{{ $totalFront }}</h1>
                            <a href="{{ url('admin/Users.php')}}" class="text-white">View</a>
                           
                            <a href="#">Views</a>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label for="">Rooms</label>
                            <h1>2</h1>
                            <a href="{{ url('admin/Users.php')}}" class="text-white">View</a>
                        </div>
                    </div>

                </div>
            </main>

            <script>
                document.addEventListener("alpine:init", () => {
                    Alpine.data("layout", () => ({profileOpen: false, asideOpen: true}));
                });
            </script>