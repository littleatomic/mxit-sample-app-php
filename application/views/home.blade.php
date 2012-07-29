@layout('template')

@section('body')
<p><b>Sample Mxit Application</b></p>

<a accesskey="1" href="<?= URL::to('status/get') ?>">1</a>
<b>&gt;</b> <a href="<?= URL::to('status/get') ?>">View status message</a><br />

<a accesskey="2" href="<?= URL::to('status/authset') ?>">2</a>
<b>&gt;</b> <a href="<?= URL::to('status/authset') ?>">Set status message</a><br />

<a accesskey="3" href="<?= URL::to('profile/authview') ?>">3</a>
<b>&gt;</b> <a href="<?= URL::to('profile/authview') ?>">View profile</a><br />
@endsection
