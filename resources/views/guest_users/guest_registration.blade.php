<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <script
            data-require="jquery@3.1.1"
            data-semver="3.1.1"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Guest Information</title>

        <link rel="stylesheet" href="{{ asset('css/guest_registration.css') }}">
    </head>
    <body class="bg-gray-100">
        <!-- Navbar -->

        <x-app-layout>
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
            <div class="container">
                <div
                    class="progress-container"
                    style="position:relative; left: 400px; top: 30px;">
                    <div class="progress" id="progress"></div>
                    <div class="circle active"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_dates.png"
                        height="30"
                        width="25"/></div>

                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_info.png"
                        height="30"
                        width="25"/></div>
                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_rooms.png"
                        height="30"
                        width="25"/></div>
                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_confirmation.png"
                        height="30"
                        width="25"/></div>
                </div>

            </section>
            <section class="room_details mx-[100px]">
                <p style="position:relative; left: 290px;">Check-in &
                </p>
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
                        style="position:relative; left: 8px; top: -120px; color:#4C4C4C; font-size: 20px;">Make a Reservation</h2>
                    <p style="position: relative; top: -120px; left: 10px;">Please complete the form below</p>

                    <div class="bg-gray w-full h-[1px]" style="position:relative;  top: -120px;"></div>

                </div>
                <div class="card1">

                    <div class="container1">
                        <br>
                        <h4 style="font-size: 20px;">
                            <b>Guest Information</b>
                        </h4>
                        <hr class="new1">

                    </div>
                    <br>
                    <div class="row">
                        <div style="position: relative; left: 15px;">
                            <p >Salutation:
                                <span style="color:red">*</span></p>
                            <select name="salutation" id="salutation" style="width: 190px">
                                <option value="Ms">Ms.</option>
                                <option value="Mr">Mr.</option>

                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div style="position: relative; left: 250px; top: -64px; ">
                            <p >Full name:
                                <span style="color:red">*</span></p>
                            <input
                                class="form-control"
                                type="text"
                                name="fname"
                                required="required"
                                style="width: 380px; "
                                placeholder="First name">

                        </div>
                    </div>
                    <div class="row">
                        <div style="position: relative; left: 700px; top: -108px; ">

                            <input
                                class="form-control"
                                type="text"
                                name="fname"
                                required="required"
                                style="width: 380px; "
                                placeholder="Last name">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="position: relative; left: 25px; top: -1050px; ">
                        <p >Company Name:
                            <span ></span></p>
                        <input
                            class="form-control"
                            type="text"
                            name="fname"
                            required="required"
                            style="width: 1060px; ">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div style="position: relative; left: 25px; top: -1050px; ">
                        <p >Address:
                            <span style="color:red">*</span></p>

                        <input
                            class="form-control"
                            type="text"
                            name="fname"
                            required="required"
                            style="width: 1060px; ">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div style="position: relative; left: 25px; top: -1050px; ">
                        <p >Phone Number:
                            <span style="color:red">*</span></p>

                        <input
                            class="form-control"
                            type="text"
                            name="fname"
                            required="required"
                            style="width: 1060px; "
                            placeholder="+639">

                    </div>
                </div>
                <h4 style="font-size: 20px; position: relative; top: -1000px; left: 20px;">
                    <b>Payment Method</b>
                </h4>
                <hr class="new2">

                <input
                    type="radio"
                    id="cash"
                    name="cash"
                    value="HTML"
                    style="position: relative; top: -970px; left: 25px;">
                    <label for="html" style="position: relative; top: -970px; left: 25px;">Cash</label>
                </input><br>

                <input
                    type="radio"
                    id="dc"
                    name="dc"
                    value="HTML"
                    style="position: relative; top: -960px; left: 25px;">
                    <label for="html" style="position: relative; top: -960px; left: 25px;">Department Charge</label>
                </input><br>

                <a href="{{ url()->previous('') }}"  class="button1">Back</a>
                <a href="#"class="button2">Continue</a>

            </div>

            <footer class="bg-[#a2eeea] mt-[150px]">
                <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
                    <!-- Logo -->
                    <div
                        class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                        <!-- Logo -->
                        <div>
                            <img src="{{ asset('./images/logom2.png')}}" class="h-[100px]" alt="">
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