<?php

//Write your custome class/methods here
namespace Apps;
use \Apps\Model;
use \Apps\Mailer;
use \Apps\EmailTemplate;
use \Apps\PHPMailer;
use stdClass;

use \Apps\Session;

class Core extends Model{

	
	

	public function __construct(){
		parent::__construct();
	}

	public static function createSlug($string) {
		$table = array(
				'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
				'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
				'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
				'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
				'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
				'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
				'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
				'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-','&' => 'and'
		);	
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/','/[^a-z0-9]/i'), ' ', $string);
		
		
		// -- Returns the slug
		return strtolower(strtr($string, $table));		
	}
	public function Pages(){
		$Pages = mysqli_query($this->dbCon,"SELECT * FROM char_pages WHERE isnews = '0' ORDER BY sort ASC");
		return $Pages;
	}
	public function getPages(){
		$Pages = mysqli_query($this->dbCon,"SELECT * FROM char_pages WHERE isnews = '0' ORDER BY sort ASC");
		return $Pages;
	}
	public function NewsPages(){
		$NewsPages = mysqli_query($this->dbCon,"SELECT * FROM char_pages WHERE isnews = '1' ORDER BY sort ASC");
		return $NewsPages;
	}

	public function PageInfo($slug){
		$PageInfo = mysqli_query($this->dbCon,"SELECT * FROM char_pages WHERE slug='$slug' OR id='$slug'");
		$PageInfo = mysqli_fetch_object($PageInfo);
		return $PageInfo;
	}

	public function fSocials(){
		$Socials = mysqli_query($this->dbCon, "SELECT * FROM char_social LIMIT 6");
		return  $Socials;
	}
	public function Socials(){
		$Socials = mysqli_query($this->dbCon, "SELECT * FROM char_social LIMIT 4 ");
		return  $Socials;
	}
	public function SiteInfo($name){
		$SiteInfo = mysqli_query($this->dbCon, "SELECT value FROM  char_siteinfo WHERE name = '$name'");
		$SiteInfo = mysqli_fetch_object($SiteInfo);
		return $SiteInfo->value;
	}
	public function getAllSiteInfo(){
		$getAllSiteInfo = mysqli_query($this->dbCon, "SELECT * FROM  char_siteinfo");
		return $getAllSiteInfo;
	}


	public function getSliders(){
		$getSliders = mysqli_query($this->dbCon, "SELECT * FROM  char_slide");
		return $getSliders;
	}

	//admin
	public function updateSiteInfo($name, $value){
		$updateSiteInfo = mysqli_query( $this->dbCon, "UPDATE char_siteinfo  SET  value = '{$value}' WHERE name = '$name' ");
		
	}


	public function updatePage($pageid,$menutitle,$Slug, $sort, $content_text){
		$updatePage = mysqli_query($this->dbCon,"UPDATE char_pages SET menutitle = '$menutitle', slug='$Slug', sort='$sort', content_text = '$content_text' WHERE id ='$pageid'");
		// return (int)mysql_affected_rows($this->dbCon, $updatePage);
	}



	}
	

	

