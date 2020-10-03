<?php

class core{
	
	public $public_path;
	public $debug = DEBUG;
	
	public $appid = appid;
	public $appname = appname;
	public $accid = NULL;
	public $isLoggedIn = false;
	public $isLiveBetting = false;
	public $isProfile = false;
	public $UserInfo = NULL;

	//Database Settings
	public $host = host;
	public $user = user;
	public $password = password;
	public $db = db;
	
	private $key_array = array();
	private $data_array = array();
	private $form_posted_array = array();
	public $returned_posted_array = array();

	//date and time setting
	public $default_timezone = default_timezone;
	public $today = '';
	
	//Site Class variables
	public $dbCon = NULL;

	public function __construct() {
		if (!@$this->dbCon = mysqli_connect($this->host, $this->user,$this->password,$this->db)) {
      		exit('Error: Could not make a database connection using ' . $this->user . '@' . $this->host);
    	}
 		
		mysqli_query($this->dbCon,"SET NAMES 'utf8'");
		mysqli_query($this->dbCon,"SET CHARACTER SET utf8");
		mysqli_query($this->dbCon,"SET CHARACTER_SET_CONNECTION=utf8");
		mysqli_query($this->dbCon,"SET SQL_MODE = ''");
		
		//Set default time zone
		date_default_timezone_set($this->default_timezone);
		
		$this->setReporting();
		//$this->removeMagicQuotes();
		$this->unregisterGlobals();
		
		$this->public_path = "./public/";
		
  	}
	
	
	/** Check if environment is development and display errors **/
	function setReporting() {
		if ($this->debug == true) {
			error_reporting(E_ALL);
			ini_set('display_errors',"On");
		}else{
			error_reporting(E_ALL);
			ini_set('display_errors',"Off");
			ini_set('log_errors', "On");
			ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
		} 
	}
	
	
	/** Check for Magic Quotes and remove them **/
	public function removeMagicQuotes() {
		if ( get_magic_quotes_gpc() ) {
			$_GET = stripSlashesDeep($_GET   );
			$_POST = stripSlashesDeep($_POST  );
			$_COOKIE = stripSlashesDeep($_COOKIE);
		}
	}
	
	
	/** Check register globals and remove them **/
	function unregisterGlobals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}

	function stripSlashesDeep($value) {
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}
	
	//MySQL Query functions
	public function query($sql) {
		$resource = mysqli_query($this->dbCon,$sql);
		if ($resource) {
			if (is_resource($resource)) {
				$i = 0;
				$data = array();
				while ($result = mysqli_fetch_assoc($resource)) {
					$data[$i] = $result;
					$i++;
				}
				mysqli_free_result($resource);
					$query = new stdClass();
					$query->row = isset($data[0]) ? $data[0] : array();
					$query->rows = $data;
					$query->num_rows = $i;
				unset($data);
				return $query;	
    		} else {
				return TRUE;
			}
		} else {
      		exit('Error: ' . mysqli_error($this->dbCon) . '<br />Error No: ' . mysqli_errno($this->dbCon) . '<br />' . $sql);
    	}
  	}



	public function escape($value) {
		return mysqli_real_escape_string($value);
	}
	
	public function Today($format='l dS M Y') {
		return date($format);
	}
	
	public function FormatName($name){
		return ucfirst( strtolower($name));
	}
	
	public function Time($format='H:i:s') {
		return date($format);
	}
	public function redirect_to($location = "./") {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
		
	function time_ago($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}


	public function ValidatePage($form,$libs,$redirect){
		if(in_array($form,$libs)){
			if(!$this->isLoggedIn){
				$this->redirect_to($this->GetOption("siteurl") . $redirect);
			}
		}
	}
		
	public function ValidateModal($modal,$modals,$callback=""){
		if(in_array($modal,$modals)){
			if($this->isLoggedIn){
				$this->redirect_to($modal);
				exit();
			}else{
				$call_back = $callback;
			}
		}
		return $call_back;
	}
		
		
  	public function countAffected() {
    	return mysqli_affected_rows($this->dbCon);
  	}

  	public function getLastId() {
    	return mysqli_insert_id($this->dbCon);
  	}
	
	public function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}







	public function post($posted_array){
		$this->form_posted_array = $posted_array;
		$forms = new stdClass();		
		if(is_array($posted_array)){
			foreach($posted_array as $key =>$val){
				if(is_array($val)){
					$this->returned_posted_array[$key] = $val ;
					$forms->$key = $val ;
				}else{
					$this->returned_posted_array[$key] = $this->mysqli_prepare_value( $val );
					$forms->$key = $this->mysqli_prepare_value( $val );
				}
			}
			return $forms;
		} else {
      		exit('Error: Form not good');
    	}
  	}


	public function mysqli_prepare_value($value) {
		//check if get_magic_quotes_gpc is turned on.
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_version_php = function_exists("mysqli_real_escape_string");
		
		if($new_version_php){
			//undo any magic quote effects so mysqli_real_escape_string can do the work
			if($magic_quotes_active) { $value = stripslashes($value); }
			$value = mysqli_real_escape_string($this->dbCon,$value);
		} else {
				//if magic quotes aren't already on then add slashes manually
				if( !$magic_quotes_active ) { $values = addslashes( $value ); }
				//if magic quotes are active, then the slashes already exist
			}
		return $value;
	}








	
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	function get_gravatar( $email, $s = 220, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}

	function Gravatar( $email,$default,$size=39 ) {
		$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
		return $grav_url;
	}
	
	
// PHP Email //	
	public function NoReply($email,$name,$subject,$html){
		try{
			$PHPmailer = new PHPMailer(true);
			$PHPmailer->isHTML(true);
				
			$PHPmailer->setFrom( "noreply@dexterousoil.com","NoReply@DexterousOil.com" );
			$PHPmailer->AddReplyTo( "noreply@dexterousoil.com","NoReply@DexterousOil.com" );
				
			$PHPmailer->Subject = $subject;
			$PHPmailer->AddAddress($email,$name);
				
			$body = "
				<div style=\"line-height:2em; font-size:15px; width:98%; margin:15px auto 20px auto; position:relative;\">
				{$html}
				<p>&nbsp;</p>
				<p>Thank you!</p><br>
				<p>The Dexterousoil Team</p>
				</div>
			";
				
			$PHPmailer->MsgHTML($body);
			$sent = $PHPmailer->Send();
			return $sent;
		}catch(phpmailerException $e){
				return $sent;
		}catch (Exception $e) {
				return $sent;
		}
	}
	
	public function AutoMail($email,$name,$subject,$html){
		try{
			$PHPmailer = new PHPMailer(true);
			$PHPmailer->isHTML(true);
				
			$PHPmailer->setFrom( "AutoMail@dexterousoil.com","AutoMail@DexterousOil.com" );
			$PHPmailer->AddReplyTo( "AutoMail@dexterousoil.com","AutoMail@DexterousOil.com" );
				
			$PHPmailer->Subject = $subject;
			$PHPmailer->AddAddress($email,$name);
				
			$body = "
				<div style=\"line-height:2em; font-size:15px; width:98%; margin:15px auto 20px auto; position:relative;\">
				{$html}
				<p>&nbsp;</p>
				<p>Dexterous <strong>AutoMail</strong></p>
				</div>
			";
				
			$PHPmailer->MsgHTML($body);
			$sent = $PHPmailer->Send();
			return $sent;
		}catch(phpmailerException $e){
				return $sent;
		}catch (Exception $e) {
				return $sent;
		}
	}
// PHP Email //	



//Clients//
	public function CreateNewClient($email,$firstname,$lastname,$mobile,$address,$city,$state,$country,$username,$password){
		$x = mysqli_query($this->dbCon,"insert into accounts(email,firstname,lastname,mobile,address,city,state,country,username,password) values('$email','$firstname','$lastname','$mobile','$address','$city','$state','$country','$username','$password')");
		return $x;
	}
	public function LoadClients(){
		return mysqli_query($this->dbCon,"select * from accounts order by created DESC");
	}
	public function ClientInfo($accid){
		$x = mysqli_query($this->dbCon,"select * from accounts where accid='{$accid}'");
		return mysqli_fetch_object($x);
	}
	
	public function UpdateClient($accid,$keyname,$keyval){
		$x = mysqli_query($this->dbCon,"update accounts set $keyname='{$keyval}' where accid='$accid'");
		return $x;
	}
	function DeleteClient($accid){
		$result = mysqli_query($this->dbCon,"delete accounts.* from accounts where accid='$accid'");
		return $result;
	}
	
	public function ClientLogin($un,$pw){
		$x = mysqli_query($this->dbCon,"select * from accounts where username='$un' and password='$pw' LIMIT 1");
		return mysqli_fetch_object($x);
	}
	
//Clients//









//Packages//

	public function CreateNewPackage($trackcode,$accid,$title,$description,$from_country,$from_address,$to_country,$to_address,$photos){
		$x = mysqli_query($this->dbCon,"insert into packages(trackcode,accid,title,description,from_country,from_address,to_country,to_address,photo) values('$trackcode','$accid','$title','$description','$from_country','$from_address','$to_country','$to_address','$photos')");
		return $x;
	}
	
	public function LoadPackages(){
		return mysqli_query($this->dbCon,"select * from packages order by created DESC");
	}
	
	public function LoadClientPackages($accid){
		return mysqli_query($this->dbCon,"select * from packages where accid='{$accid}' order by created DESC");
	}
	
	public function LoadTracks(){
		return mysqli_query($this->dbCon,"select * from tracks order by created DESC");
	}
	
	public function LoadClientTracks($accid){
		return mysqli_query($this->dbCon,"select * from tracks where accid='{$accid}' order by created DESC");
	}
	
	public function LoadPackageTracks($pid){
		return mysqli_query($this->dbCon,"select * from tracks where pid='{$pid}' order by created DESC");
	}
	
	public function PackageInfo($id){
		$x = mysqli_query($this->dbCon,"select * from packages where id='{$id}'");
		return mysqli_fetch_object($x);
	}
	
	public function AddTrackit($pid,$datetime,$cur_location,$updateinfo){
		$x = mysqli_query($this->dbCon,"insert into tracks(pid,stamp,location,trackinfo) values('$pid','$datetime','$cur_location','$updateinfo')");
		return mysqli_fetch_object($x);
	}
	
	public function TrackInfo($trackcode){
		$x = mysqli_query($this->dbCon,"select * from packages where trackcode='{$trackcode}'");
		return mysqli_fetch_object($x);
	}
	
	public function Trackit($trackcode){
		$x = mysqli_query($this->dbCon,"select * from packages where trackcode='{$trackcode}'");
		return mysqli_fetch_object($x);
	}
	
	public function UpdatePackage($pid,$keyname,$keyval){
		$x = mysqli_query($this->dbCon,"update packages set $keyname='{$keyval}' where id='$pid'");
		return $x;
	}
	
	public function DeletePackage($pid){
		$result = mysqli_query($this->dbCon,"delete packages.* from packages where id='$pid'");
		return $result;
	}
	
	public function DeleteTrack($tid){
		$result = mysqli_query($this->dbCon,"delete tracks.* from tracks where tid='$tid'");
		return $result;
	}
	
//Packages//












	public function UpdateAccount($accun,$keyname,$keyval){
		$x = mysqli_query($this->dbCon,"update login set $keyname='{$keyval}' where username='$accun'");
		return $x;
	}

	public function UserLogin($un,$pw){
		$x = mysqli_query($this->dbCon,"select * from login where username='$un' and password='$pw' LIMIT 1");
		return mysqli_fetch_object($x);
	}
	public function UserInfo($un){
		$x = mysqli_query($this->dbCon,"select * from login where username='$un' LIMIT 0,1");
		return mysqli_fetch_object($x);
	}
	
	
	














	function CreateNews($title,$contents,$linked){
		$this->query("insert into news(title,news,linked) values('$title','$contents','$linked') ");
		return $this->getLastId();
	}
	function LoadBanners(){
		return mysqli_query($this->dbCon,"select * from photos where isbanner='1' order by created ASC");
	}
	function CreatePhotos($photo,$title,$photo_path,$isbanner,$group){
		$this->query("insert into photos(name,title,type_dir,isbanner,groupid) values('$photo','$title','$photo_path','$isbanner','$group')");
		return $this->getLastId();
	}
	
	function LoadNews($limit=1000){
		return mysqli_query($this->dbCon,"select * from news order by created DESC LIMIT 0,{$limit}");
	}

	function GetPhoto($phid){
		$results = mysqli_query($this->dbCon,"select * from photos where id='$phid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function GetPhotosByGroupId($groupid){
		$results = mysqli_query($this->dbCon,"select * from photos where groupid='$groupid'");
		return $results;
	}
	function LoadPhotoGroup(){
		$results = mysqli_query($this->dbCon,"select * from photos_group");
		return $results;
	}
	function CreatePhotoGroup($title){
		$this->query("insert into photos_group(title) values('$title') ");
		return $this->getLastId();
	}
	function GetPhotoGroup($gid){
		$results = mysqli_query($this->dbCon,"select * from photos_group where grid='$gid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function DeletePhotoGroup($gid){
		$result = mysqli_query($this->dbCon,"delete photos_group.* from photos_group where gid='$gid'");
		return $result;
	}
	function DeletePhoto($pid){
		$result = mysqli_query($this->dbCon,"delete photos.* from photos where id='$pid'");
		return $result;
	}
	function DeleteSponsor($sid){
		$result = mysqli_query($this->dbCon,"delete sponsor.* from sponsor where sid='$sid'");
		return $result;
	}
	function DeleteNews($nid){
		$result = mysqli_query($this->dbCon,"delete news.* from news where nid='$nid'");
		return $result;
	}
	function GetParentMenuName($pname){
		$val = '';
		$result = mysqli_query($this->dbCon,"select menutitle,shortname from pages where shortname='$pname' LIMIT 0,1");
		$pnm = mysqli_fetch_array($result);
		$val = $pnm['menutitle'];
		if($val){
			return $val;
		}else{
			return "Top Menu (Home)";
		}
	}
	function LoadPageInfo($shortname){
		$results = mysqli_query($this->dbCon,"select * from pages where shortname='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function DeletePage($pid){
		$result = mysqli_query($this->dbCon,"delete pages.* from pages where shortname='$pid'");
		return $result;
	}
	function CreatePage($parent,$menutitle,$title,$content,$sort,$shortname,$isnews,$category){
		$this->query("insert into pages(parent,menutitle,title,content,sort,shortname,isnews,categories) value('$parent','$menutitle','$title','$content','$sort','$shortname','$isnews','$category')");
		return $this->getLastId();
	}

	function UpdatePage($xpid,$parent,$menutitle,$title,$content,$sort,$shortname,$isnews,$category){
		$result = mysqli_query($this->dbCon,"update pages set parent='$parent',menutitle='$menutitle',title='$title',content='$content',sort='$sort',shortname='$shortname',isnews='$isnews',categories='$category' where shortname='$xpid'");
		if($result){
			return $shortname;
		}else{
			return false;
		}
	}
	function LoadArticles($limit=1000){
		$result = mysqli_query($this->dbCon,"select * from pages where isnews='YES' ORDER BY created DESC LIMIT 0,$limit");
		return $result;
	}
	function LoadPages(){
		return mysqli_query($this->dbCon,"select * from pages order by sort ASC");
	}
	function CountMenuPages(){
		$this->query("select pageid from pages where parent='home'");
		return $this->countAffected();
	}
	function LoadSubMenus($shn){
		return mysqli_query($this->dbCon,"select * from pages where parent='$shn'");
	}
	function CountSubMenus($shn){
		$this->query("select pageid from pages where parent='$shn'");
		return $this->countAffected();
	}
	function LoadParentMenus(){
		$result = mysqli_query($this->dbCon,"select pageid,menutitle,parent,shortname,isnews from pages where parent='home' AND isnews='NO' ORDER BY sort ASC");
		return $result;
	}
	function CreateSponsor($name,$website,$profile){
		$this->query("insert into sponsor(name,website,profile) values('$name','$website','$profile') ");
		return $this->getLastId();
	}
	
	function LoadSponsors($limit=1000){
		return mysqli_query($this->dbCon,"select * from sponsor order by created DESC LIMIT 0,{$limit}");
	}
	
	function LoadVideo($limit=1000){
		$result = mysqli_query($this->dbCon,"select * from videos order by created DESC LIMIT 0,{$limit}");
		return $result;
	}
	function CreateVideo($title,$path){
		$this->query("insert into videos(title,path) values('$title','$path') ");
		return $this->getLastId();
	}
	function DeleteVideo($vid){
		$result = mysqli_query($this->dbCon,"delete videos.* from videos where vid='$vid'");
		return $result;
	}
	function LoadSiteInfo($appid){
		$results = mysqli_query($this->dbCon,"select * from siteinfo where appid='$appid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function SaveCategory($appid,$cat_num,$cateval){
		$result = mysqli_query($this->dbCon,"update siteinfo set $cat_num='$cateval' where appid='$appid'");
		return false;
	}
	function LoadCategories(){
		$result = mysqli_query($this->dbCon,"select cat1,cat2,cat3 from siteinfo where appid='$this->appid'");
		return $result;
	}
	function LoadPagesCat($cat){
		$pages =  mysqli_query($this->dbCon,"select * from pages where categories LIKE '%$cat%' order by sort ASC");
		return $pages;
	}
	function SaveHomePageTitleandSlogan($title,$slogan){
		$result = mysqli_query($this->dbCon,"update siteinfo set title='$title',slogan='$slogan' where appid='1'");
		return $result;
	}
	
	function CreateNewTab($title,$contents,$path,$linked){
		$this->query("insert into tabs(tabtitle,tabtext,tabimage,linkedpage) values('$title','$contents','$path','$linked') ");
		return $this->getLastId();
	}
	function LoadTabs(){
		return mysqli_query($this->dbCon,"select * from tabs order by created DESC");
	}

	function LoadThreeTabs(){
		return mysqli_query($this->dbCon,"select * from tabs order by rand() LIMIT 0,3");
	}

	function LoadAllBanners($limit=100){
		return mysqli_query($this->dbCon,"select * from banners order by created DESC LIMIT 0,$limit");
	}

	function LoadThisTab($tabid){
		$tabs = mysqli_query($this->dbCon,"select * from tabs where tabid='$tabid' LIMIT 0,1");
		$tab = mysqli_fetch_object($tabs);
		return $tab;
	}
	function DeleteTab($tid){
		$result = mysqli_query($this->dbCon,"delete tabs.* from tabs where tabid='$tid'");
		return $result;
	}
	function EditTab($tabid,$title,$contents,$path,$linked,$hasImage){
		if($hasImage=="YES"){
			$this->query("update tabs set tabtitle='$title',tabtext='$contents',tabimage='$path',linkedpage='$linked' where tabid='$tabid'");
		}elseif($hasImage=="NO"){
			$this->query("update tabs set tabtitle='$title',tabtext='$contents',linkedpage='$linked' where tabid='$tabid'");
		}
		return $this->countAffected();
	}
	
	
	
	
//Set and Get Site Settions
	
	public function LoadOptions() {
		$option = mysqli_query($this->dbCon,"SELECT * FROM options");
		return $option;
	}
	
//Set and Get Site Settions

	public function GetOption($option_name) {
		$option = mysqli_query($this->dbCon,"SELECT option_value FROM options WHERE option_name='{$option_name}'");
		$option = mysqli_fetch_object($option);
		return $option->option_value;
	}
	
//Set and Get Site Settions

	public function SetOption($option_name,$option_value) {
		$option = $this->query("UPDATE options set option_value='$option_value' WHERE option_name = '{$option_name}'");
		return $this->countAffected();
	}
	
//KILL OBJECT//	
	function __destruct(){
		if(is_object($this->dbCon)){
			mysqli_close($this->dbCon);	
		}
	}
//KILL OBJECT//
	

}
	
	
?>