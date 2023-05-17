<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/flowbite.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Homepage</title>
</head>
<body>
    <div class="flex flex-col-reverse justify-between md:flex-row md:space-y-0">
        <div class="flex flex-col w-full h-[630px] mt-3 drop-shadow bg-gradient-30 from-[#425B71] to-[#425B71]/60 rounded-r-lg p-9 md:w-3/5 md:mt-0">
            <p class="font-sans font-normal text-white text-xl tracking-[5px]">DILG MARINDUQUE</p>
            <p class="font-sans font-extralight text-white text-base mt-28">
                Barangay Legislative Tracking System (BLTS) is an offline repository platform for archiving Barangay Records. Barangay Secretaries uploads codes of ordinance, ordinances, resolutions and others.
            </p>
            <p class="font-sans font-normal text-white text-lg tracking-[3px] mt-44">a project by</p>
            <p class="font-sans font-bold text-3xl text-white mt-10">ONE MARINDUQUE</p>
            <p class="font-sans font-bold text-3xl text-white">DILG - LGRC</p>
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute relative -top-52 -left-8">
        </div>
        <div class="h-full flex flex-col w-full px-16">
            <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute right-0 -top-8">
            <p class="w-fit font-sans font-medium text-3xl bg-gradient-90 from-[#A60453] to-[#FFB144] bg-clip-text text-transparent mt-6">
                Setup Account
            </p>
            <p class="font-sans font-semibold text-xl leading-6 text-[#2D2D2D]">Create Your BLTS Profile</p>
            <img src="{{ asset('/images/logo.svg') }}" alt="" class="mx-auto mt-6 h-24">
            <form action="/setup/process" id="setup-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col space-y-2 w-full mt-10 md:space-y-0 md:space-x-8 md:flex-row md:ml-9">
                    <div class="flex flex-col w-full md:w-80">
                        <div class="flex flex-col relative">
                            <select type="text" id="municipality" name="municipality" value="{{ old('municipality') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <option value="null">Select Municipality...</option>
                                <option value="Boac">Boac</option>
                                <option value="Buenavista">Buenavista</option>
                                <option value="Gasan">Gasan</option>
                                <option value="Mogpog">Mogpog</option>
                                <option value="Sta. Cruz">Sta. Cruz</option>
                                <option value="Torrijos">Torrijos</option>
                            </select>
                            <label for="municipality" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Municipality
                            </label>
                        </div>
                        <div class="flex flex-col relative mt-3">
                            <input type="text" id="captain" name="captain" value="{{ old('captain') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                            <label for="captain" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                               Barangay Captain
                            </label>
                        </div>
                        <div class="flex flex-col relative mt-3">
                            <input type="text" id="secretary" name="secretary" value="{{ old('secretary') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                            <label for="secretary" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Barangay Secretary
                            </label>
                        </div>
                        <div class="flex relative justify-center">
                            <p class="absolute -top mx-auto font-sans font-normal text-black/50 text-sm leading-4">Administrative Year / Term Year</p>
                        </div>
                        <div class="flex flex-row space-x-2 mt-8">
                            <div class="flex flex-col relative w-full md:w-1/2">
                                <input type="text" datepicker datepicker-autohide id="from" name="from" value="{{ old('from') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <label for="from" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                    From
                                </label>                 
                                <div class="absolute inset-y-0 right-0 flex mt-2 pr-3 cursor-pointer">
                                    <svg id="from-date-icon" aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col relative w-full md:w-1/2">
                                <input type="text" datepicker datepicker-autohide id="to" name="to" value="{{ old('to') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <label for="to" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                    To
                                </label>
                                <div class="absolute inset-y-0 right-0 flex mt-2 pr-3 cursor-pointer">
                                    <svg id="to-date-icon" aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-80">
                        <div class="flex flex-col relative w-full">
                            <select type="text" id="barangay" name="barangay" value="{{ old('barangay') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <option value="null">Select Barangay...</option>
                            </select>
                            <label for="barangay" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Barangay
                            </label>
                        </div>
                        <div class="flex flex-col relative w-full">
                            <p class="w-fit relative absolute top-2 left-3 px-1 font-sans font-normal text-[11px] text-gray-700 bg-white leading-tight">
                                Sangguniang Barangay Members
                            </p>
                            <div class="h-32 flex flex-col space-y-4 w-full border border-gray-700 rounded-[7px] p-4 overflow-x-auto">
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb1" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">1.</label>
                                    <input type="text" id="sb1" name="sb1" value="{{ old('sb1') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb2" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">2.</label>
                                    <input type="text" id="sb2" name="sb2" value="{{ old('sb2') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb3" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">3.</label>
                                    <input type="text" id="sb3" name="sb3" value="{{ old('sb3') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb4" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">4.</label>
                                    <input type="text" id="sb4" name="sb4" value="{{ old('sb4') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb5" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">5.</label>
                                    <input type="text" id="sb5" name="sb5" value="{{ old('sb5') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb6" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">6.</label>
                                    <input type="text" id="sb6" name="sb6" value="{{ old('sb6') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                                <div class="h-2 flex flex-row space-x-2 items-center">
                                    <label for="sb7" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">7.</label>
                                    <input type="text" id="sb7" name="sb7" value="{{ old('sb7') }}" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col relative w-full mt-5">
                            <button id="upload-button" type="button" class="p-2.5 border border-gray-700 rounded-md italic text-left font-sans font-normal text-sm text-[#C4C4C4]">
                                Click here to Upload SB Logo
                                <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-2.5 right-3 h-5 w-5">
                                    <path d="M5.75 42.5C4.30625 42.5 3.07031 41.9859 2.04219 40.9578C1.01406 39.9297 0.5 38.6937 0.5 37.25V29.375H5.75V37.25H37.25V29.375H42.5V37.25C42.5 38.6937 41.9859 39.9297 40.9578 40.9578C39.9297 41.9859 38.6937 42.5 37.25 42.5H5.75ZM18.875 32V10.6063L12.05 17.4313L8.375 13.625L21.5 0.5L34.625 13.625L30.95 17.4313L24.125 10.6063V32H18.875Z" fill="#6B7280"/>
                                </svg>                                
                            </button>
                            <label for="upload-button" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Upload SB Logo
                            </label>
                            <input type="file" accept="image/*" id="logo" name="logo" class="hidden">
                        </div>
                    </div>
                </div>
            </form>
            <button id="setup-button" type="button" class="mx-auto mt-4 px-20 py-3 rounded-lg bg-gradient-270 from-[#A60453] to-[#FFB144] font-sans font-bold text-xl leading-6 text-white">
                Setup Account
            </button>
        </div>
    </div>

    <script src="{{ asset('/js/setup.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
</body>
</html>