<?php

class Social{
  	
	public $UserId;
	public $SocialUser;
	public $LoginInfo = NULL;
	public $LoginLink = "";
	public $LogoutLink = "";
	
	function facebook(){
		$facebook = new Facebook(array(
			'appId'		=>  APP_ID,
			'secret'	=> APP_SECRET,
		));
		
		//get the user facebook id		
		$user = $facebook->getUser();
		$this->UserId = $user;
		$this->SocialUser = $user;
		//echo $user;exit;
		if($user){
			try{
				//get the facebook user profile data
				$LoginInfo = $facebook->api('/me');
				$params = array('next' => BASE_URL.'logout.php');
				//logout url
				$LogoutLink = $facebook->getLogoutUrl($params);
				
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
				$this->UserId = $user;
				$this->SocialUser = $user;
				$LoginInfo = NULL;
			}		
		}
		if(empty($user)){
			//login url	
			$loginurl = $facebook->getLoginUrl(array(
				'scope'			=> 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
				'redirect_uri'	=> BASE_URL.'login.php?facebook',
				'display'=>'popup'
			));
			header('Location: ' . $loginurl);
		}
  }
  

}



?>