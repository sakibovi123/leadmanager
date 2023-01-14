@include("base")

<div class="container mx-auto flex">
    @include("sidebar")
    <br>
    <div class="main-content px-7 py-5 bg-white mx-7 my-7 rounded">
        <div class="flex items-center justify-between p-3">
            <h1 class="text-2xl font-semibold font-mono">Clients</h1>
            <hr>
            <div class="flex items-center justify-around">
                <form class="flex items-center justify-between">
                    <select id="countries" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Filter</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                    <button type="submit" class="text-center px-7 w-[50px]"><i class="fa fa-filter"></i></button>
                </form>
                <div class="text-white">....</div>


                <!-- Modal toggle -->
                <button class="border p-1 m-1 w-[100px] hover:bg-gray-200" type="button" data-modal-toggle="authentication-modal">
                    + Add
                </button>

                <!-- Main modal -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class=" fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-100">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-800 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900">Add New Client</h3>
                                <hr>
                                <form class="space-y-6 bg-gray-100" action="{{ url('/save-client') }}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <div>

                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">*Company name</label>
                                        <input required type="text" name="company_name" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="example company" required>
                                    </div>
                                     <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="name@company.com" >
                                    </div>

                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                                        <input type="text" name="first_name" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="jon" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                                        <input type="text" name="last_name" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="doe" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
                                        <input type="number" name="phone_number" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="xxxxxxxxxxxxx" >
                                    </div>


                                    <button type="submit" class="w-full text-black bg-violet-400 rounded p-2">Save</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <table class="w-[1400px] table-auto py-4">
            <thead>
            <tr class="text-center text-black border-b-2">
                <th class="text-md p-3">ID</th>
                <th class="text-md p-3">Client Name</th>
                <th class="text-md p-3">Email</th>
                <th class="text-md p-3">Phone Number</th>
                <th class="text-md p-3" colspan="2">Actions</th>

            </tr>
            <hr>
            </thead>

            <tbody>
            @if($clients->count() > 0)
                @foreach($clients as $client)
                    <tr class="bg-white hover:bg-gray-100 cursor-pointer border-b-2">
                        <td class="text-center text-sm font-semibold">{{ $client->id }}</td>
                        <td class="text-center text-sm font-semibold">{{ $client->company_name }}</td>
                        <td class="text-center text-sm font-semibold">
                            @if(!empty($client->email))
                                {{ $client->email }}
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-center text-sm font-semibold">
                            @if(!empty($client->phone_number))
                                {{ $client->phone_number }}
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-center text-sm font-semi-bold">

                            <div class="flex items-center justify-center">
                                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                                    <i class="fa fa-cog text-sm font-semibold text-black hover:text-blue-600" aria-hidden="true"></i>
                                </button>
                                <form method="POST" action="">
                                    @csrf
                                    @method("DELETE")
                                    <button class="text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="submit">
                                        <i class="fa fa-trash text-sm font-semibold text-black hover:text-red-600" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Leads</a>
                                    </li>
                                    <li>
                                        <a href="" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buyers</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Suppliers</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>

        </table>
    </div>
</div>
