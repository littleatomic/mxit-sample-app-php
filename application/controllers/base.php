<?php

class Base_Controller extends Controller {

    function __construct()
    {
        $this->show_images = showImages();

        // Get the user ID from the session across all pages
        if ($this->uid = Session::get('uid'))
        {
            // Use the Mxit library to get the user details from the headers
            $userdata = getUserDetails();
            $profile = explode(',', $userdata->profile);
            $location = explode(',', $userdata->locations);
            $dim = explode('x', $userdata->pixels);
            $birthday = $profile[2];
            $country = $location[0];
            $province = $location[2];
            $city = $location[5];

            // Get the user profile from the DB
            $this->profile = User::get($this->uid);

            // Update the nickname in our DB if it has changed
            if ($this->profile->nickname != urldecode($userdata->nick))
            {
                $data = array('nickname' => $userdata->nick);
                User::update($this->uid, $data);
            }

            // Update the city in our DB if it has changed
            if ($this->profile->city != $city)
            {
                $data = array('city' => $city);
                User::update($this->uid, $data);
            }

            // Update the country in our DB if it has changed
            if ($this->profile->country != $country)
            {
                $data = array('country' => $country);
                User::update($this->uid, $data);
            }

            // Update the province in our DB if it has changed
            if ($this->profile->province != $province)
            {
                $data = array('province' => $province);
                User::update($this->uid, $data);
            }

            // Update the UA in our DB if it has changed
            if ($this->profile->ua != $userdata->useragent)
            {
                $data = array('ua' => $userdata->useragent);
                User::update($this->uid, $data);
            }

            // Update the Device Width in our DB if it has changed
            if ($this->profile->width != $dim[0])
            {
                $data = array('width' => $dim[0]);
                User::update($this->uid, $data);
            }
        } else {
            $this->uid = NULL;
        }

        // Custom headers for each page
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    }

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}
