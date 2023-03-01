<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://kit.fontawesome.com/d0fec6f98b.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-KlE5+5KpSJ5eI9XDDoHkw/KRjK8Z2QgZnC7V2fz51vhP7VvUz0Bd6pCZX6bPIW8Fv+6K0/SPfgiQc6/8V7jzGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
    <title>Room Types</title>

    <style>
#btn {
  background-color: #FFBF00;
  border: none; 
  color: white; 
  padding: 12px 16px; 
  font-size: 16px; 
  cursor: pointer; 
  position:relative;
  left: 220px;
  top: -1px;
  border-radius: 5px;
  color:black;
}

/* Darker background on mouse-over */
#btn:hover {
  background-color: #FFB200;  
}
        </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <x-app-layout>
    <div class="bg-cover bg-center h-[350px] max-w-full" style="background-image: url({{ asset('./images/roomtype.jpg') }});">
          <!-- Navbar -->
    <nav class="container bg-[#82e9e4] max-w-full px-3 h-[50px]">
            <!-- Flex container -->
        <div class="flex items-center justify-between mx-[40px]">
            <!-- Logo -->
            <div class="flex flex-row justify-center items-center">
                <img src="{{ asset('./images/bsba.png')}}" class="h-[50px]">
                <div class="hidden md:block">
                    <p class="text-sm">School of Business Hospitality<br> and Tourism Management</p>
                </div>
            </div>

            <div class="hidden md:flex space-x-6 items-center ">
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">Home</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
               </div>
        </div>
    </nav>

        <div class="flex justify-center items-center">
            <h1 class="text-white font-bold text-[80px] my-[50px]">Room Types</h1>
        </div>
    </div>
    {{-- {{ route('show_room_info') }} --}}
    <!-- Rooms -->
    <div class="flex justify-around items-center mx-30 m-10">
      <div>
        <form method="POST" action="{{ route('show_room_info1') }}" class="flex justify-center items-center">
          @csrf
          <input type="hidden" name="check_in_date" value="{{ session('check_in_date') }}" />
          <input type="hidden" name="check_out_date" value="{{ session('check_out_date') }}" />
          <input type="hidden" name="number_of_nights" value="{{ session('number_of_nights') }}" />
          <div class="relative">
            <img src="{{ asset('./images/room1.jpg') }}" class="h-[350px] w-144 shadow-2xl" alt="">
            <div class="absolute bg-white h-[200px] w-80 top-60 left-[75px] border-2 border-yellow-500 rounded-md shadow-xl p-3 flex flex-col justify-between">
              <h1 class="text-black font-extrabold text-3xl">Room {{$room1->id}}</h1>
              <p class="text-gray-600 text-sm">Queen Size</p>
              <h2 class="text-yellow-500 font-bold text-lg">{{$room1->rate}}/ Night</h2>
              <p class="text-sm pb-2">This Queen Bed size room provides comfort for all guests of DWCC MicroHotel</p>
              <div class="flex justify-end">
                <button type="submit" name="room1"
                class="bg-yellow-500 text-black active:bg-yellow-800 font-semibold text-sm px-3 w-21 py-[10px] rounded shadow hover:shadow-lg outline-none focus:outline-none  ease-linear transition-all duration-150 cursor-pointer">
                  <i class="fa-solid fa-circle-info">&nbsp;</i> Details
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
     
      <div class="">
        <form method="POST" action="{{ route('show_room_info2')}}" class="flex justify-center items-center">
          @csrf
          <input type="hidden" name="check_in_date" value="{{ session('check_in_date') }}" />
          <input type="hidden" name="check_out_date" value="{{ session('check_out_date') }}" />
          <input type="hidden" name="number_of_nights" value="{{ session('number_of_nights') }}" />
          <div class="relative">
            <img src="{{ asset('./images/room2.jpg') }}" class="h-[350px] w-144 shadow-xl" alt="">
            <div class="absolute bg-white h-[200px] w-80 top-60 left-[75px] border-2 border-yellow-500 rounded-md shadow-xl p-3 flex flex-col justify-between">
              <h1 class="text-black font-extrabold text-3xl">Room {{$room2->id}}</h1>
              <p class="text-gray-600 text-sm">Single Bed</p>
              <h2 class="text-yellow-500 font-bold text-lg">{{ $room2->rate }} / Night</h2>
              <p class="text-sm pb-2">This room can easily accommodate 1-3 people in comfort</p>
              <div class="flex justify-end">
                <button type="submit" name="room2"  
                class="bg-yellow-500 text-black active:bg-yellow-800 font-semibold text-sm px-3 w-21 py-[10px] rounded shadow hover:shadow-lg outline-none focus:outline-none  ease-linear transition-all duration-150 cursor-pointer">
                  <i class="fa-solid fa-circle-info">&nbsp;</i> Details
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="flex pt-[170px] mr-[129px] flex-row-reverse space-x-4  ">
        <a href="{{ url()->previous() }}" class="bg-[#929290] hover:bg-grey-600
            text-white font-bold py-2 px-8 rounded  ">
           Back
           </a>
    </div>
</div>
    
    <!-- Footer -->
    <footer class="bg-[#a2eeea] mt-[150px]">
        <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
            <!-- Logo -->
            <div class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                <!-- Logo -->
                <div>
                    <img src="{{ asset('./images/logom2.png') }}" class="h-[100px]" alt="">
                </div>
            </div>

            <div class="">
                <h1 class="font-bold text-lg w-full">MICROHOTEL</h1>
                <p class="text-sm text-gray-900">The DWCC Microhotel is a school-run hotel located inside the Divine Word College of Calapan.</p>
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
                    <img src="{{  asset('./images/DWCCLOGO.png')}}" class="h-[100px]" alt="">
                </div>
            </div>
        </div>

        <div class="bg-[#55AFAB] flex justify-center">
            <p class="text-sm">Copyright &copy; 2023 DWCC MicroHotel</p>
        </div>
    </footer>
</x-app-layout>
</body>
</html>