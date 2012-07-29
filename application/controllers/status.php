<?php

class Status_Controller extends Base_Controller {

    function __construct()
    {
        parent::__construct();
        $this->api = new MxitAPI(Config::get('mxitapi.key'), Config::get('mxitapi.secret'));
    }

    // Get the status and display it
	public function action_get()
	{
        $data = array();

        // Get the user's status from the API
        $this->api->get_app_token('profile/public');
        $data['status'] = $this->api->get_status($this->profile->login);

        // Display the user's status
		return View::make('status.get', $data);
	}

    // Request permission from the user to set their status
	public function action_authset()
	{
        $this->api->request_access(URL::to('status/prompt'), 'status/write');
	}

    // Prompt the user for their status message
	public function action_prompt()
	{
        // Store the code in the session
        Session::put('code', $_GET['code']);

        // Prompt the user for their status message
		return View::make('status.prompt');
	}

    // Set the user's status message
    public function action_set()
    {
        // Get the code from the session
        if ($code = Session::get('code'))
        {
            // Get the status text from the form
            if ($status = Input::get('status'))
            {
                // Send API call to update the status
                $this->api->get_user_token($code, URL::to('status/prompt'));
                $this->api->set_status($status);

                // Inform the user that their status has been updated
                $data['status'] = $status;
		        return View::make('status.set', $data);
            }
            else
            {
                // No status received
                Redirect::to('status/authset');
            }
        }
        else
        {
            // Something went wrong, then code isn't in the session
            Redirect::to('status/authset');
        }
    }

}
