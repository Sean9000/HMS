
<script defer="defer" src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>

    <link href="/tail/tailwind.css" rel="stylesheet"/>
<!-- Logo -->
<link rel="icon" type="image/png" sizes="16x16" href="../images/logo.png">
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
    <a href="admin_dashboard" class="Menu">
        <img src="./images/microhotel1.png" alt="" srcset="" class="hi">
            <span>
                <h3>
                    <i class="bx bx-home">Dashboard</i></h3>
                
            </span>
        </a>
        <div>
            <a href="manage" class="Menu">
                <span>
                    <h3>
                        <i class="bx bx-bed">Manage Rooms</i>
                    </h3>
                </span>
            </a>
        </div>
        <div>
            <a href="booking" class="menu">
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

               <main>
<div  class="gtable">
<table>
    
<header class="text-center font-bold text-lg">
       
    </header>
    <table class="styled-table">
    <thead class="head">
        <tr class="t_row">
            
            <th class="t_head" >Room Number</th>
            <th class="t_head" >Room Type</th>
            <th  class="t_head">Capacity</th>
            <th  class="t_head">Status</th>
            <th  class="t_head">Rate</th>
            <th  class="t_head">Action</th>
        </tr>
    </thead>
    <tbody class="t_table ">
    @foreach ($rooms as $room)
        <tr class="t_row">
            
            <td class="t_head">{{ $room->room_no }}</td>
            <td class="t_head">{{ $room->room_type }} </td>
            <td class="t_head">{{ $room->capacity }}</td>
            <td class="t_head">{{ $room->status }}</td>
            <td class="t_head">{{ $room->rate }}</td>    
            <td>  <button class="button flex-item items-center">Edit</button></td>
          
        </tr>
        @endforeach
    </tbody>
    </div>
</table>
                </div>
            </main>

            </main>

            <script>
                document.addEventListener("alpine:init", () => {
                    Alpine.data("layout", () => ({profileOpen: false, asideOpen: true}));
                });
            </script>