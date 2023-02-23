{{ $camp->campaign_title }}
<br>
<form action="{{ url('/send-test-lead/'.$camp->id) }}" method="POST">
    @csrf
    @foreach($fields as $field)
        <label for="">{{ $field->field_name }}</label>
        <input type="{{ $field->field_type }}" name="{{ $field->field_name }}" placeholder="Enter {{ $field->field_name }}">
        <br>

    @endforeach
    <button type="submit">Send</button>
</form>

