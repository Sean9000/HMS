<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d0fec6f98b.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Room Types</title>

    <style>
.btn {
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
.btn:hover {
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

    <!-- Rooms -->
    <form method="POST" action="{{ route('show_room_info') }}" >
        @csrf

        <input type="hidden" name="check_in_date" value="{{ session('check_in_date') }}" />
        <input type="hidden" name="check_out_date" value="{{ session('check_out_date') }}" />

    <div class="flex justify-around items-center mx-30 m-10">
        <div class="relative">
            <img src="{{ asset('./images/room1.jpg') }}" class="h-[300px] w-[450px] shadow-2xl" alt="">

            <div class="flex justify-center">
                <div class="absolute bg-[#fff] h-[190px] w-[360px] top-[220px] border-2 border-[#E0C822] rounded-md
                justify-center shadow-xl p-3">
                    <h1 class="text-black font-extrabold text-3xl">Room 1</h1> 
                    <p class="text-gray-600 text-sm">Queen Size</p>
                    <h2 class="text-[#E0C822] font-bold text-lg">P1,300 / Night</h2>
                    <p class="text-[14px]">This Queen Bed size room provides comfort for all guest of DWCC MicroHotel</p>
                    
                    <div>
                    <button type="submit" class="btn bg-yellow-400 mb-7"><i class="fa-solid fa-circle-info">&nbsp</i> Details</a>
                   </div>

                </div>
               
            </div> 

            </form>
        </div>

         <div class="relative">
            <img src="{{ asset('./images/room2.jpg') }}" class="h-[300px] w-[450px] shadow-xl" alt="">            
            <div class="flex justify-center">
                <div class="absolute bg-[#fff] h-[190px] w-[360px] top-[220px] border-2 border-[#E0C822] rounded-md
                 shadow-xl p-3">
                    <h1 class="text-black font-extrabold text-3xl">Room 2</h1>
                    <p class="text-gray-600 text-sm">Single Bed</p>
                    <h2 class="text-[#E0C822] font-bold text-lg">P1,100 / Night</h2>
                    <p class="text-[14px]">This room can easily accommodate 1-3 maximum people in comfort</p>   
                    <div>
                    <button  class="btn"><i class="fa-solid fa-circle-info">&nbsp </i> Details</button>
                   </div>
                </div>
            </div>  
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