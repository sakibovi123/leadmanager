@include("base")

<div class="container mx-auto flex">
    @include("sidebar")
    <div class="main-content px-7 py-5">
    <div class="flex items-center justify-between p-3">
        <h1 class="text-2xl font-semibold font-mono">All campaigns</h1>

        <div class="flex items-center justify-around">
            <form>
                <select id="countries" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Filter</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                  </select>
            </form>
            <div class="text-white">....</div>

   
            <!-- Modal toggle -->
            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                + New
             </button>
  
            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-100">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-800 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900">Sign in to our platform</h3>
                            <form class="space-y-6" action="{{ route('create-campaign') }}" method="POST">
                                @csrf
                                @method("POST")
                                {{-- <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="name@company.com" required>
                                </div> --}}
                                <div>
                                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Enter campaign title</label>
                                    <input type="text" name="campaign_title" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" required>
                                </div>
                               
                        
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
  

            </div>
        
    </div>
    <table class="w-[1400px] border-2 p-5 table-auto shadow-xl rounded-xl py-4">
        <thead>
            <tr class="text-center border-b-2 bg-slate-900 text-white">
                <th class="text-md p-3">ID</th>
                <th class="text-md p-3">Strike Date</th>
                <th class="text-md p-3">Campaign</th>
                <th class="text-md p-3" colspan="2">Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @if($camps->count() > 0)
            @foreach($camps as $camp)
            <tr class="bg-white hover:bg-indigo-100 p-3 cursor-pointer transition delay-50 border">
                <td class="text-center p-3 text-sm font-semibold">{{ $camp->id }}</td>
                <td class="text-center p-3 text-sm font-semibold">{{$camp->created_at}}</td>
                <td class="text-center p-3 text-sm font-semibold">{{ $camp->campaign_title }}</td>
                <td class="text-center p-3 text-sm font-semibold">

                <div class="flex items-center justify-center">
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                        <i class="fa fa-cog text-xl font-semibold text-black hover:text-blue-600" aria-hidden="true"></i>
                    </button>
                    <form method="POST" action="{{ url('/delete-campaign/'.$camp->id) }}">
                        @csrf
                        @method("DELETE")
                        <button class="text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="submit">
                            <i class="fa fa-trash text-xl font-semibold text-black hover:text-red-600" aria-hidden="true"></i>
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
                        <a href="{{ url('/campaign-details/'.$camp->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
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

                    {{-- <button>
                        <svg className="w-6 h-6" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round"
                         strokeLinejoin="round" strokeWidth={2} d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                    
                    <a href="" class="hover:text-blue-500">Edit</a>
                    <form method="DELETE" action="">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="hover:text-blue-500">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
      
    </table>
</div>
</div>