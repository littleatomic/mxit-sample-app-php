@layout('template')

@section('body')
<p><b>Your status is: </b>{{ ($status == '') ? 'No status set' : $status }}</p>
@endsection
