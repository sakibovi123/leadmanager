@include("base")

<div class="container mx-auto flex">
    @include("sidebar")
    <br>
    <div class="main-content px-7 py-5 bg-white mx-7 my-7 rounded w-full">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900">Update Camp Lejeune Lead</h3>
            <hr>
            <form class="space-y-7 bg-white-100" action="{{ route('store-campaign') }}" method="POST">
                @csrf

                <div>

                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">*Campaign Name</label>
                    <input required type="text" name="campaign_title" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 " placeholder="example company" required>
                </div>

{{--                <div>--}}
{{--                    <label for="campaign_title" class="block mb-2 text-sm font-medium text-gray-900">Type of problem</label>--}}
{{--                    <select type="text" name="" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500">--}}
{{--                        <option value="Text">Text</option>--}}
{{--                        <option value="Text">DateField</option>--}}
{{--                        <option value="Text">Numeric</option>--}}
{{--                        <option value="Text">Phone</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <button type="submit" class="w-full text-black bg-violet-400 rounded p-2">Save</button>

            </form>
        </div>
    </div>
</div>
