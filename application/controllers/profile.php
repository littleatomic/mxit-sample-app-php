<?php

class Profile_Controller extends Base_Controller {

    function __construct()
    {
        parent::__construct();
        $this->api = new MxitAPI(Config::get('mxitapi.key'), Config::get('mxitapi.secret'));
    }

    // Convert timestamps from the API to human readable dates
    private function get_date($string)
    {
        preg_match("/Date\((\d+)\+\d{4}\)/", $string, $matches);
        $timestamp = $matches[1]/1000;
        $date = date('Y-m-d', $timestamp);
        return $date;
    }

    // Request permission from the user to view their profile
	public function action_authview()
	{
        $this->api->request_access(URL::to('profile/view'), 'profile/private');
	}

    // View the user's profile
    public function action_view()
    {
        // Get the code from the session
        if ($code = Session::get('code'))
        {
            // Get the user's profile information from the API
            $this->api->get_user_token($_GET['code'], URL::to('profile/view'));
            $profile = $this->api->get_full_profile();

            // Convert API timestamps to human readable dates
            $profile->State->LastModified = $this->get_date($profile->State->LastModified);
            $profile->RegistrationDate = $this->get_date($profile->RegistrationDate);
            $profile->DateOfBirth = $this->get_date($profile->DateOfBirth);

            // Display the user's profile
            $data = array('profile' => $profile);
            return View::make('profile.view', $data);
        }
        else
        {
            // Something went wrong, then code isn't in the session
            Redirect::to('status/authview');
        }
    }

}
