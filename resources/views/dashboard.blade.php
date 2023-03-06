<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Calendar</title>
  {{-- Bootstrap theme:Full Calendar --}}

  {{-- Calendar Css --}}

  {{-- <link rel="stylesheet" href="css/fullcalendar.css"> --}}
  {{-- javascript calendar --}}
  <script src="{{url('js/fullcalendar.js')}}"></script>
  {{-- <script src="{{url('js/datepicker.js')}}"></script> --}}
  {{-- <script src="{{url('js/check_out_calendar.js')}}"></script> --}}
  {{-- Calendar script --}}
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  {{-- Font awesome --}}
  <script src="https://kit.fontawesome.com/d0fec6f98b.js" crossorigin="anonymous"></script>
  <!-- Logo -->
  <style>
    .fc-day-disabled {
      color: grey
    }
  </style>
</head>

<body>
  {{-- App.blade.php --}}
  <x-app-layout>
    <div class="flex items-center justify-center my-10 mx-10 pb-3 bg-gray-100">
      <div class="w-4/5 flex flex-col bg-gray-200 rounded-2xl p-5">
        <form method="POST" action="{{ route('store_date') }}">
          @csrf
          <div class="md:flex-row justify-center">
            <div class="w-full px-10 mx-auto ">
              <div class="grid grid-cols-1 ">
                <div class=" py-2">
                  <label class="block text-gray-900 font-medium mb-2" for="check-in-date">Check-in date:</label>
               
                  <input
                    class="w-full border-gray-900 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    id="check_in_date" name="check_in_date" type="date" value="{{ old('check_in_date') }}">
                    {{-- <x-input-error :messages="$errors->get('check_in_date')" class="mt-2" /> --}}
                </div>
              </div>

              <div class="grid grid-cols-1 gap-2 mt-1">
                <div class="py-2">
                  <label class="block text-gray-900 font-medium mb-2" for="check-out-date">Check-out date:</label>
                  <input
                    class="w-full border-gray-400 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    id="check_out_date" name="check_out_date" type="date" value="{{ old('check_out_date') }}">
                    {{-- <x-input-error :messages="$errors->get('check_out_date')" class="mt-2" /> --}}
                </div>
              </div>


          
              <div class="grid grid-cols-1 mt-1">
                <div class=" py-2 flex items-center">
                  <label class="block text-gray-900 font-medium mr-4" for="number-of-nights">Number of Nights:</label>
                  <input type="" id="number_of_nights" name="number_of_nights" value="{{ old('number_of_nights') }}"
                    class="bg-transparent pointer-events-none rounded py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:border-blue-500"
                    readonly>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger font-sm text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              </div>
            </div>

            <div class="w-full md:w-3/5  px-4 mb-4 md:mb-0 mx-auto">
              <div class="bg-white rounded-lg shadow-lg p-4">
                <h2 class="text-lg font-medium mb-4 pb-2 border-b border-gray-300 text-center">Date Availability</h2>
                <div id="calendar"></div>
              </div>
              <div class=" py-4 ">

                <div class="px-10 font-bold font-base">LEGEND</div>

                <div class="flex items-center px-10 py-2 ">
                  <div class="bg-gray-300 box-border  border-black h-3 w-2.5 p-2 " style="color: #DDDDDD;"></div>
                  <div for="box" class="pl-3 font-xs md:w-1/2">Available Date</div>

                  <div class="bg-blue-600 box-border border-black h-3 w-2.5 p-2 ml-4"></div>
                  <div for="box" class="pl-3 font-xs md:w-1/2">Check-in Date</div>
                </div>

                <div class="flex items-center px-10 py-2">
                  <div class="bg-gray-600 box-border border-black h-3 w-2.5 p-2 "></div>
                  <div for="box" class="pl-3 font-xs md:w-1/2">Not Available </div>

                  <div class="bg-red-600 box-border border-black h-3 w-2.5 p-2 ml-4"></div>
                  <div for="box" class="pl-3 font-xs md:w-1/2">Check-out Date</div>
                </div>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-end">
            <div class="w-full md:w-1/2 px-4 ">
              <div class="flex flex-row-reverse mt-5 mb-10">
               <button 
                  class="bg-yellow-500 text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit"
                  >Continue</button>
            {{-- @if(session('check_in_date') && session('check_out_date') && session('number_of_nights'))
            <a href="{{ route('room_types') }}?{{ http_build_query(['checkin_date' => session('check_in_date'), 'checkout_date' => session('check_out_date'), 'night' => session('number_of_nights')]) }}">
                Continue
            </a>
            @endif  --}}
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>

    </div>

    {{-- script for date --}}
    <script>
      const check_in_date = document.getElementById('check_in_date');
      const check_out_date = document.getElementById('check_out_date');
      check_in_date.min = new Date().toISOString().split('T')[0];
      check_out_date.min = new Date().toISOString().split('T')[0];
    </script>

    <script>
      const checkInDate = document.getElementById('check_in_date');
      const checkOutDate = document.getElementById('check_out_date');
      const numberOfNights = document.getElementById('number_of_nights');
      checkOutDate.addEventListener('change', function() {
        const oneDay = 24 * 60 * 60 * 1000; // hours * minutes * seconds * milliseconds
        const checkIn = new Date(checkInDate.value);
        const checkOut = new Date(checkOutDate.value);
        const diffDays = Math.round(Math.abs((checkOut - checkIn) / oneDay));
        numberOfNights.value = diffDays;
      });
    </script>
  </x-app-layout>
</body>

</html>