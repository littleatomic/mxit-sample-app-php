@layout('template')

@section('body')
<p><b>Enter a status message:</b></p>

{{ Form::open('status/set') }}
{{ Form::text('status') }}
{{ Form::submit('submit') }}
{{ Form::close() }}

@endsection
