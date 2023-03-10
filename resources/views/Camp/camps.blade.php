@include("base")

<div class="container mx-auto flex">
    @include("sidebar")
    <br>
    <div class="main-content px-7 py-5 bg-white mx-7 my-7 rounded">
        <div class="flex items-center justify-between p-3">
            <h1 class="text-2xl font-semibold font-mono">Camp Lejeune Leads</h1>
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
                                <h3 class="mb-4 text-xl font-medium text-gray-900">Add New Lead</h3>
                                <hr>
                                <form class="space-y-6 bg-gray-100" action="{{ url('/create-camp-lead') }}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <div>

                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">*First Name</label>
                                        <input required type="text" name="first_name" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="example company" required>
                                    </div>
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                        <input type="text" name="last_name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="name@company.com" >
                                    </div>

                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                                        <input type="number" name="phone" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="jon" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="email" name="email" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="doe" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">City</label>
                                        <input type="text" name="city" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">State</label>
                                        <input type="text" name="state" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="First Two Digit" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Zip Code</label>
                                        <input type="number" name="zip_code" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                        <input type="text" name="address" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Did you loved Camp Lejeune?</label>
                                        <select name="is_loved" id="" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Do you already have attorney?</label>
                                        <select name="have_attorney" id="" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Type of problem</label>
                                        <input type="text" name="type_of_legal_problem" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
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
                <th class="text-md p-3">CREATED AT</th>
                <th class="text-md p-3">FIRST NAME</th>
                <th class="text-md p-3">LAST NAME</th>
                <th class="text-md p-3">EMAIL</th>
                <th class="text-md p-3">PHONE</th>
                <th class="text-md p-3">DISEASE</th>
                <th class="text-md p-3">STATUS</th>
                <th class="text-md p-3" colspan="2">Actions</th>

            </tr>
            <hr>
            </thead>

            <tbody>
            @if($camps->count() > 0)
                @foreach($camps as $camp)
                    <tr class="bg-white hover:bg-gray-100 cursor-pointer border-b-2">
                        <td class="text-center text-sm font-semibold">{{ $camp->created_at }}</td>
                        <td class="text-center text-sm font-semibold">{{ $camp->first_name }}</td>
                        <td class="text-center text-sm font-semibold">{{ $camp->last_name }}</td>
                        <td class="text-center text-sm font-semibold">
                            @if(!empty($camp->email))
                                {{ $camp->email }}
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-center text-sm font-semibold">
                            @if(!empty($camp->phone))
                                {{ $camp->phone }}
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-center text-sm font-semibold">{{ $camp->type_of_legal_problem }}</td>
                        <td class="text-center text-sm font-semibold">{{ $camp->is_valid }}</td>
                        <td class="text-center text-sm font-semi-bold">

                            <div class="flex items-center justify-center">
                                <a href="">Setup</a>
                                <form method="POST" action="{{ url('/delete-camp-lejeune/'.$camp->id) }}">
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
                                        <a href="{{ url('/edit-camp/'.$camp->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
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
