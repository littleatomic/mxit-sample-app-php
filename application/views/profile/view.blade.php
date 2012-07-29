@layout('template')

@section('body')
<p>
    <b>User Id: </b>{{ $profile->UserId }}<br />
    <b>First Name: </b>{{ $profile->FirstName }}<br />
    <b>Last Name: </b>{{ $profile->LastName }}<br />
    <b>Display Name: </b>{{ $profile->DisplayName }}<br />
    <b>Status Message: </b>{{ $profile->State->StatusMessage }}<br />
    <b>Email: </b>{{ isset($profile->Email) ? $profile->Email : 'Unknown' }}<br />
    <b>Mobile Number: </b>{{ isset($profile->MobileNumber) ? $profile->MobileNumber : 'Unknown' }}<br />
    <b>Date of Birth: </b>{{ $profile->DateOfBirth }}<br />
    <b>Age: </b>{{ $profile->Age }}<br />
    <b>Gender: </b>{{ ($profile->Gender == 0) ? 'Male' : 'Female' }}<br />
    <b>Language Code: </b>{{ $profile->LanguageCode }}<br />
    <b>Location: </b>{{ isset($profile->WhereAmI) ? $profile->WhereAmI : 'Unknown' }}<br />
    <b>Registered Country Code: </b>{{ $profile->RegisteredCountryCode }}<br />
    <b>Last Known Country Code: </b>{{ $profile->LastKnownCountryCode }}<br />
    <b>Network Operator Code: </b>{{ isset($profile->NetworkOperatorCode) ? $profile->NetworkOperatorCode : 'Unknown' }}<br />
    <b>Date Registered: </b>{{ $profile->RegistrationDate }}<br />
    <b>Last Updated: </b>{{ $profile->State->LastModified }}<br />
</p>
@endsection
