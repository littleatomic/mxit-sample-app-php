<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
        // Get user data from the HTTP Server Headers
        $userdata = getUserDetails();

        if (!empty($userdata->mxitid))
        {
            // SHA1 encode the user's mxitid
            $this->uid = sha1($userdata->mxitid);

            // Check whether the user exists in our DB
            if (User::exists($this->uid) === FALSE)
            {
                // This is a new user, process their data and add them to the DB
                $profile = explode(',', $userdata->profile);
                $location = explode(',', $userdata->locations);
                $dim = explode('x', $userdata->pixels);
                $birthday = $profile[2];

                $data = array('mxitid'     => $userdata->mxitid,
                              'uid'        => $this->uid,
                              'login'      => $userdata->login,
                              'nickname'   => urldecode($userdata->nick),
                              'gender'     => $profile[3],
                              'birthday'   => $birthday,
                              'country'    => $location[0],
                              'province'   => $location[2],
                              'city'       => $location[5],
                              'language'   => $profile[0],
                              'ua'         => $userdata->useragent,
                              'width'      => $dim[0],
                              'created_at' => date('Y-m-d H:i:s'));

                // Save the user
                User::add($data);
             }

            // Log the user in
            Session::put('uid', $this->uid);
            $this->profile = User::get($this->uid);

		    return View::make('home');
        }
        else
        {
            // Inform user's that the application can only be accessed from within mxit if they're accessing it from a web browser
            echo "<strong>This application needs to be accessed from within Mxit - http://www.mxit.com</strong>";
        }
	}

}
