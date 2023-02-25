@include('base')
{{--{{ $camp->campaign_title }}--}}
{{--<br>--}}
{{--<form action="{{ url('/send-test-lead/'.$camp->id) }}" method="POST">--}}
{{--    @csrf--}}
{{--    @foreach($fields as $field)--}}
{{--        <label for="">{{ $field->field_name }}</label>--}}
{{--        <input type="{{ $field->field_type }}" name="{{ $field->field_name }}" placeholder="Enter {{ $field->field_name }}">--}}
{{--        <br>--}}

{{--    @endforeach--}}
{{--    <button type="submit">Send</button>--}}
{{--</form>--}}

<div class="container mx-auto">
    <div class="header-section bg-white shadow-xl rounded my-4 p-3">
        <div class="flex justify-between items-center">
            <p class="text-xl">
                {{ $camp->campaign_title }}
            </p>
            <div class="flex justify-between items-center">
                <a href="{{ url('/campaign-details/'.$camp->campaign_uid) }}" class="border p-1.5 rounded hover:bg-gray-200 mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 7v4H5.83l3.58-3.59L8 6l-6 6l6 6l1.41-1.42L5.83 13H21V7h-2Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="form-section bg-white shadow-xl rounded my-4 p-3">
        <form action="{{ url('/send-test-lead/'.$camp->id) }}" method="POST">
            @csrf
            <div class="form-body flex-col items-center justify-between">
                @foreach($fields as $field)
                    <label for="" class="my-2">{{ $field->field_name }}</label>
                    <input class="border p-1 w-full" type="{{ $field->field_type }}" name="{{ $field->field_name }}" placeholder="Enter {{ $field->field_name }}">
                    <br>
                @endforeach
            </div>
            <button type="submit" class="w-[220px] rounded bg-blue-400 my-3 p-1.5 text-bold">Send</button>
        </form>
    </div>
</div>
