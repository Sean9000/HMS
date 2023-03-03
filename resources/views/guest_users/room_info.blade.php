<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <!-- Logo -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/logo.png">
    {{-- <link href="{{ asset('css/room_info.css') }}" rel="stylesheet"> --}}

    <script data-require="jquery@3.1.1" data-semver="3.1.1"
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>Room Information</title>
    <style>

    </style>
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
                        <p class="text-sm">School of Business Hospitality<br>
                            and Tourism Management</p>
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
        <div class="">
            {{-- <div class="flex justify-center space-x-[100px] mt-[35px]">
                <div class="" id="progress"></div>
                <div class="circle active"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_dates.png"
                        height="30" width="25" /></div>
                <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_info.png"
                        height="30" width="25" /></div>
                <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_rooms.png"
                        height="30" width="25" /></div>
                <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_confirmation.png"
                        height="30" width="25" /></div>
            </div> --}}

            <div class="flex justify-center">
                {{-- <p >Check-in & </p>
        <p >Check-out Date</p>
        <p >Guest<br/></p>
        <p >Information</p>
        <p >Booking<br/></p>
        <p >Summary</p>
        <p >Payment<br/></p>
        <p >Confirmation</p> --}}
            </div>

            <section class="room_details mx-[100px] mt-[70px]">
            
                    
                <div class="mb-10 ">
                    <h2 class="text-[30px] text-[#4C4C4C] font-bold ml-7">Room {{ $id }}
                        {{-- {{ $rooms->id }} --}}
                    </h2>
                    <div class="bg-black mx-auto w-[96%] h-[6px]"></div>
                </div>

                <div class="flex  justify-center space-x-3 h-auto">
                    {{-- Left --}}
                    <div class="flex bg-gray-300 w-[800px] h-[450px] rounded-md">
                        <div class="image mx-4 my-4">
                            <img class="h-[305px] " src="{{ asset('./images/room1.jpg') }}" alt="">
                            <div class="flex space-x-9">
                                <div class="bg-white border-2 border-yellow-400 h-[90px] w-[183px] my-3 rounded-md">
                                    <h1 class="font-bold mt-2 ml-1 pl-3">Capacity</h1>
                                    <div class="bg-black w-auto mx-1 h-[1px]">
                                       <p class="p-3">{{ $capacity }} Person</p> 
                                    </div>
                                </div>

                                <div class="bg-white border-2 border-yellow-400 h-[90px] w-[183px] my-3  rounded-md">
                                    <h1 class="font-bold mt-2  ml-1 pl-3 ">Beds</h1>
                                    <div class="bg-black w-auto mx-1 h-[1px]">
                                        <p class="p-3"> {{ $roomType }}</p>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="description mx-4 my-4 ">
                            <h1 class="font-bold text-[20px]">Description</h1>
                            <div class="bg-black w-[300px] mb-2 mx-1 h-[1px]"></div>
                            <p class="w-[300px] text-justify ">
                                {{ $description }}
                            </p>
                            <div class="items-center">
                                <div
                                    class="bg-white border-2 mx-auto border-yellow-400 h-[90px] w-[300px] my-2 rounded-md">
                                    <h1 class="font-bold mt-2  ml-1 pl-3">Amenites</h1>
                                    <div class="bg-black w-auto mx-1 h-[1px] "> 
                                        <p class="p-4">{{ $amenites }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right pt-[60px]">
                                <div class="text-[25px] font-bold">PHP<span class="font-regular"> {{ $rate }}/nights</span></div>
                            </div>
                        </div>
                    </div>
                
                    {{-- right --}}
                    <div class=" bg-gray-300 w-[300px] h-[450px] rounded-md">
                        <div class="">
                            <form method="POST" action="{{ route('save_registration')}}">
                                @csrf
                                <input type="hidden" name="number_of_nights" value="{{ $number_of_nights }}"
                                    id="number_of_nights" />
                                <input type="hidden" name="room_id" value="{{ $id }}" id="number_of_nights" />

                                <div class="mx-[25px] mt-2">
                                    <div class="py-2  ">
                                        <p class="text-medium font-semibold">Check-in</p>
                                        <div class="input-group date">
                                            <input readonly type="date" name="check_in_date"
                                                value="{{ $check_in_date }}" class="w-[250px] text-center" id="check_in"
                                                required="required" />

                                        </div>
                                    </div>

                                    <div class="py-2">
                                        <p class="text-medium font-semibold">Check-out</p>
                                        <div class="input-group date">
                                            <input readonly type="date" name="check_out_date"
                                                value="{{ $check_out_date }}" class="w-[250px] text-center"
                                                id="check_out" required="required" />
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <p class="text-medium font-semibold">Number of Guest</p>
                                        <div class="flex items-center justify-center">
                                          <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-l shadow-md transition duration-300 ease-in-out cursor-pointer"
                                             onclick="subtract('guest_num')">-</a>
                                          <input readonly type="number" id="guest_num" name="guest_num" value="1" min="1" class="w-[200px] text-center text-gray-700 bg-white py-2">
                                          <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-r shadow-md transition duration-300 ease-in-out cursor-pointer"
                                             onclick="add('guest_num')">+</a>
                                        </div>
                                      </div>
                                      
                                      <div class="py-2">
                                        <p class="text-medium font-semibold">Extra Bed</p>
                                        <div class="flex items-center justify-center mt-2">
                                          <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-l shadow-md transition duration-300 ease-in-out cursor-pointer"
                                             onclick="subtract('extra_bed')">-</a>
                                          <input readonly type="number" id="extra_bed" name="extra_bed" value="0" min="0" class="w-[200px] text-center text-gray-700 bg-white py-2">
                                          <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-r shadow-md transition duration-300 ease-in-out cursor-pointer"
                                             onclick="add('extra_bed')">+</a>
                                        </div>
                                      </div>
                                      
                                    <div class="py-6 text-center">
                                        <button type="submit"
                                        class="bg-yellow-500 text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            id="next">Send booking request</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            {{-- script for add and subtract btn --}}
            <script>
                function subtract(inputId) {
                  var inputElement = document.getElementById(inputId);
                  var currentValue = parseInt(inputElement.value);
                  if (currentValue > 1) {
                    inputElement.value = currentValue - 1;
                  }
                }
                
                function add(inputId) {
                  var inputElement = document.getElementById(inputId);
                  var currentValue = parseInt(inputElement.value);
                  inputElement.value = currentValue + 1;
                }
                </script>

            <footer class="bg-[#a2eeea] mt-[150px]">
                <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
                    <!-- Logo -->
                    <div class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                        <!-- Logo -->
                        <div>
                            <img src="{{ asset('./images/logom2.png') }}" class="h-[100px]" alt=""></div>
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

                    <div class="flex flex-col items-center justify-between space-y-12
                        md:flex-col md:space-y-0 md:items-start">
                        <!-- Logo -->
                        <div>
                            <img src="{{ asset('./images/DWCCLOGO.png')}}" class="h-[100px]" alt=""></div>
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