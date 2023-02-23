@include("base")

<div class="container mx-auto flex">
    @include("sidebar")

    <div class="main-content px-7 py-5">
        <div class="upper-section bg-gray-100 border rounded p-3 w-[1300px] shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold">{{ $camp->campaign_title ?? 'No Title Found' }}</h3>
                <div class="flex items-center justify-center">
                    <a href="" class="border p-1.5 rounded hover:bg-gray-200">Supplier API docs</a>
                    <a href="{{ url("/test-lead/".$camp->id) }}" class="border p-1.5 rounded hover:bg-gray-200 mx-2">Test Lead</a>
                    <a href="" class="px-3">All campaigns</a>
                </div>

            </div>
        </div>
        <br><br>
        <div class="section-2 w-[1300px] bg-gray-50 border rounded p-3">
            <h1 class="font-semibold text-xl">Add Fields</h1>

            <hr class="my-2.5">

            <div class="w-full container">
                <form method="POST" action="{{ url('/add-field-to-campaign/'.$camp->campaign_uid) }}" class="flex flex-col">
                    @csrf
                    <label for="">Field_name</label>
                    <input type="text" name="field_name" class="border border-gray-200 rounded p-1">
                    <label for="">Field Type</label>
                    <select name="field_type" id="" class="border border-gray-200 rounded p-1">
                        <option value="text">Text</option>
                        <option value="numeric">Numeric</option>
                        <option value="email">Email</option>
                        <option value="number">Postal Code</option>
                    </select>
                    <label for="">Required?</label>
                    <select name="is_required" id="" class="border border-gray-200 rounded p-1">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <br>
                    <button type="submit" class="p-1.5 bg-blue-200 rounded hover:bg-blue-300">Add Field</button>
                </form>
            </div>


        </div>

        <div class="section-2 w-[1300px] bg-gray-50 border rounded p-5 my-3">
            <h1 class="font-semibold text-xl">All Fields</h1>

            <hr class="my-2.5">

            <div class="w-full container">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th>Field Name</th>
                            <th>Field Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($fields)
                        @foreach($fields as $field)
                        <tr class="bg-white hover:bg-gray-100 cursor-pointer border-b-2">
                            <td class="text-center text-sm font-semibold p-3">
                                {{ $field->field_name }}
                            </td>
                            <td class="text-center text-sm font-semibold">
                                {{ $field->field_type }}
                            </td>
                            <td class="text-center text-sm font-semibold">
                                {{ $field->is_required }}
                            </td>
                            <td class="text-center text-sm font-semibold">
                                <form action="{{ url('/delete-field/') }}" method="POST">
                                    @csrf @method("DELETE")
                                    <input type="hidden" value="{{ $field->id }}" name="f_id">
                                    <button type="submit" >Remove</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="w-full bg-red-200">No Fields Added</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>


        </div>

    </div>

</div>
