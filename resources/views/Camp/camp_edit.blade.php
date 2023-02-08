@include("base")

<div class="container mx-auto flex">
@include("sidebar")
    <br>
    <div class="main-content px-7 py-5 bg-white mx-7 my-7 rounded w-full">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900">Update Camp Lejeune Lead</h3>
            <hr>
            <form class="space-y-6 bg-white-100" action="{{ url('/update-camp-lejeune/'.$camp_lejeune->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div>

                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">*First Name</label>
                    <input required type="text" name="first_name" value="{{ $camp_lejeune->first_name }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="example company" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input type="text" name="last_name" value="{{ $camp_lejeune->last_name }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="name@company.com" >
                </div>

                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                    <input type="number" name="phone" value="{{ $camp_lejeune->phone }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="jon" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" value="{{ $camp_lejeune->email }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="doe" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">City</label>
                    <input type="text" name="city" value="{{ $camp_lejeune->city }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">State</label>
                    <input type="text" name="state" value="{{ $camp_lejeune->state }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="First Two Digit" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Zip Code</label>
                    <input type="number" name="zip_code" value="{{ $camp_lejeune->zip_code }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                    <input type="text" name="address" value="{{ $camp_lejeune->address }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Did you loved Camp Lejeune?</label>
                    <select name="is_loved" id="" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $camp_lejeune->is_loved }}" selected></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Do you already have attorney?</label>
                    <select name="have_attorney" id="" class="font-mono font-semibold bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $camp_lejeune->have_attorney }}" selected></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div>
                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Type of problem</label>
                    <input type="text" name="type_of_legal_problem" value="{{ $camp_lejeune->type_of_legal_problem }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="" >
                </div>
                <button type="submit" class="w-full text-black bg-violet-400 rounded p-2">Save</button>

            </form>
        </div>
    </div>
