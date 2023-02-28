<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="{{ asset('css/room_info.css') }}" rel="stylesheet">
  
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Room Information</title>
</head>
<body class="bg-gray-100">
    
    <x-app-layout>
        <x-auth-session-status class="text-center text-base mt-2 mb-3" :status="session('status')" />
        <nav class="container bg-[#82e9e4] h-[50px] mx-auto rounded-b-md">
            <!-- Flex container -->
        <div class="flex items-center justify-between mx-[40px]">
            <!-- Logo -->
            <div class="flex flex-row justify-center items-center">
                <img src="{{ asset('./images/BSBA.png')}}" class="h-[40px]">
                <div class="hidden md:block">
                    <p class="text-sm">School of Business Hospitality<br> and Tourism Management</p>
                </div>
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">Home</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
            </div>
        </div>
        </nav>

       <!-- Icons -->
       <div class="container">
    <div class="progress-container" style="position:relative; left: 400px; top: 30px;">
        <div class="progress" id="progress"></div>
        <div class="circle active"><img src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_dates.png" height="30" width="25" /></div>
        <div class="circle"><img src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_info.png" height="30" width="25"/></div>
        <div class="circle"><img src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_rooms.png" height="30" width="25"/></div>
        <div class="circle"><img src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_confirmation.png" height="30" width="25"/></div>
    </div>
    
    </section>
        <section class="room_details mx-[100px]">
        <p style="position:relative; left: 290px;">Check-in & </p>
        <p style="position:relative; left: 280px;">Check-out Date</p>
        <p style="position:relative; left: 480px; top: -50px;">Guest<br/></p>
        <p style="position:relative; left: 460px; top: -50px;">Information</p>
        <p style="position:relative; left: 650px; top: -100px;">Booking<br/></p>
        <p style="position:relative; left: 650px; top: -100px;">Summary</p>
        <p style="position:relative; left: 806px; top: -150px;">Payment<br/></p>
        <p style="position:relative; left: 790px; top: -150px;">Confirmation</p>
        <div class="mb-10">
        
        <h2
                    class="text-lg font-bold "
                    style="position:relative; left: 8px; top: -120px; color:#4C4C4C; font-size: 30px;">Room 1</h2>

                <div class="bg-gray w-full h-[1px]" style="position:relative;  top: -120px;"></div>
            </div>
            <hr class="new2">
            <div class="flex space-x-5" style="position:relative; left: 10px; top: -120px;">
                {{-- Left --}}
                <div class="flex bg-gray-300 w-[750px] h-[450px] rounded-md">
                    <div class="image mx-4 my-4">
                        <img class="h-[300px] rounded-lg " src="{{ asset('./images/room1.jpg')}}" alt="">
                        <div class="flex space-x-9"></div>
                        <div class="card1" style="position: relative; top: -90px; left: 400px; px; height: 20%; width: 80%; border: 2px solid #E0C822;">

                            <div class="container1">
                                <h4>
                                    <b>Amenities</b>
                                </h4>
                                <hr class="new1">
                                <div class="justify-center ">
                                    <p >Unlimited Wifi</p>
                                    <p >Ac</p>
                                </div>
                             </p>
                            </div>
                        </div>
            
                        <div class="card2" style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s; width: 50%; height: 22%;background-color: white;position: relative;left: -6px; top: -70px;border: 2px solid #E0C822;border-radius: 5px;">

                            <div class="container2">
                                <h4><b>&nbsp Capacity</b>
                                </h4>
                                <hr class="new1">

                                <div class="justify-center ">
                                    {{-- <p >&nbsp {{ $rooms->capacity }} - Persons</p> --}}
                                      <p>&nbsp 3 - Perons</p>
                                
                                </div>

                            </div>
                        </div>
                        <div class="card3" style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 50%;height: 22%;background-color: white;position: relative;left: 195px;top: -162px;border: 2px solid #E0C822;border-radius: 5px;">

                            <div class="container3">
                                <h4><b>&nbsp Beds</b>
                                </h4>
                                <hr class="new1">
                                {{-- <p>&nbsp {{ $rooms->room_type }}</p> --}}
                                  <p>&nbsp Queen Size Bed</p>

                            </div>
                        </div>

                        <div class="card4">

                            <div class="container4">
                               <h1 style="position: relative; top: -230px; left: 430px; font-weight: bold;font-size: 30px;">PHP</h1><p class="font-lg" style="position: relative; top: -275px; 
                               left: 500px; font-weight: bold;font-size: 30px;">1300 /Night</p>
                               {{-- {{ $rooms->rate }} --}}
                                </div>
                            </div>
                    </div>

                    <div class="description mx-4 my-4 ">
                        <h1 class="font-bold mb-2">Description</h1>
                        <p class="w-[300px] font-light font-base">This beautiful hotel room provides
                            HDTV with cable chaneels, work esk with a lamp, free WiFi, and daily
                            housekeeping. The Single bedroom at Dwcc Microhotel can accmodate 2-4 guest and
                            provide all essential amenities to make you stay stress-free</p>
                    </div>
                </div>
                {{-- right --}}
                <div class="bg-gray-300 w-[300px] h-[450px] rounded-md" style="width: 350px;">
                    <div class="">

                        <div>

                            {{-------------------------------------------------- FORM DATE PICKER -----------------------------------------------}}
                            <form method="POST" action="{{ route('registration_form')}}">
                                @csrf
                                <div class="py-2">
                                    <p style="font-weight: 600; position: relative; left: 29px; top: 5px;">Check-in</p>
                                    <input
                                        readonly
                                        type="text"
                                        name="check_in_date"
                                        value="{{ $check_in_date }}"
                                        class="w-full"
                                        id="check_in"
                                        required="required"
                                        style="width: 256px;
                                        position:relative;
                                        top: 10px;
                                        left: 30px;">
                                </div>
                                <div class="py-2">
                                    <p style="font-weight: 600; position: relative; left: 31px; top: 8px;">Check-out</p>
                                    <input
                                        readonly
                                        type="text"
                                        name="check_out_date"
                                        value="{{ $check_out_date }}"
                                        class="w-full"
                                        id="check_out"
                                        required="required"
                                        style="width: 256px;
                                        position:relative;
                                        top: 10px;
                                        left: 30px;">
                                </div>
                                <p style="font-weight: 600; position: relative; left: 31px; top: 20px;">Number of Guest</p>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input
                                        type="number"
                                        step="1"
                                        min="1"
                                        max=""
                                        name="quantity"
                                        value="1"
                                        title="Qty"
                                        class="input-text qty text"
                                        size="4"
                                        pattern=""
                                        inputmode=""><input type="button" value="+" class="plus">

                                </div>
                                <p style="font-weight: 600; position: relative; left: 31px; top: 45px;">Extra Bed</p><br>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input
                                        type="number"
                                        step="1"
                                        min="1"
                                        max=""
                                        name="quantity"
                                        value="1"
                                        title="Qty"
                                        class="input-text qty text"
                                        size="4"
                                        pattern=""
                                        inputmode=""><input type="button" value="+" class="plus">
                                </div>

                            </div>

                            <button type="submit" class="btn bg-yellow-500" id="next">Send booking request</button>
                            {{-- <p style="position: relative;top:45px; left: 75px; color: white;cursor:pointer; font-weight: bold;"></p> --}}
                        </div>
                    </div>
                </div>
                {{-- <a 
                href="{{ url()->previous('') }}" 
                class="bg-[#929290] hover:bg-grey-600 text-white font-bold py-2 px-4 rounded mt-3 ">
                    Back
                </a> --}}
            </div>
           
        </section>

   

    </div>


    <footer class="bg-[#a2eeea] mt-[150px]">
                <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
                    <!-- Logo -->
                    <div
                        class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                        <!-- Logo -->
                        <div>
                            <img src="{{ asset('./images/logom2.png') }}" class="h-[100px]" alt="">
                        </div>
                    </div>

                    <div class="">
                        <h1 class="font-bold text-lg w-full">MICROHOTEL</h1>
                        <p class="text-sm text-gray-900">The DWCC Microhotel is a school-run hotel
                            located inside the Divine Word College of Calapan.</p>
                    </div>

                    <div class="">
                        <h1 class="font-bold text-lg">Contact Us</h1>
                        <p class="text-sm text-gray-900">Gov Infantado St, Calapan City, Oriental Mindoro</p>
                        <p class="text-sm text-gray-900">microhotel@dwcc.edu.ph</p>
                        <p class="text-sm text-gray-900">09123456789</p>
                    </div>

                    <div
                        class="flex flex-col items-center justify-between space-y-12
                        md:flex-col md:space-y-0 md:items-start">
                        <!-- Logo -->
                        <div>
                            <img src="{{ asset('./images/DWCCLOGO.png')}}" class="h-[100px]" alt="">
                        </div>
                    </div>
                </div>

                <div class="bg-[#55AFAB] flex justify-center">
                    <p class="text-sm">Copyright &copy; 2023 DWCC MicroHotel</p>
                </div>
            </footer>
        </x-app-layout>
    </body>
    <script src="{{url('js/progressbar.js')}}"></script>
    <script src="{{url('js/pm1.js')}}"></script>
</html>