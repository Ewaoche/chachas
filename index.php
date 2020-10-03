<?php
define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/chachanew/', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $Template->assign("title", "chachas | Home");
    $Template->assign("Pages", $Core->Pages());
    $Template->assign("fPages", $Core->Pages());
    $Template->assign("NewsPages", $Core->NewsPages());
    $Template->assign("getSliders", $Core->getSliders());
    

    $Template->addheader("layouts.header");
    $Template->addfooter('layouts.footer');


    $Template->assign("Socials", $Core->Socials());
    $Template->assign("fSocials", $Core->fSocials());

    $Template->render("home");
}, 'GET');

$Route->add('/chachanew/pages/{slug}', function ($slug) {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $PageInfo = $Core->PageInfo($slug);

    $Template->assign("Pages", $Core->Pages());
    $Template->assign("fPages", $Core->Pages());
    $Template->assign("NewsPages", $Core->NewsPages());


    $Template->assign("PageInfo", $PageInfo);
    $Template->assign("menuslug", $slug);
    $Template->assign("Socials", $Core->Socials());
    $Template->assign("fSocials", $Core->fSocials());

    $Template->addheader("layouts.header");
    $Template->addfooter('layouts.footer');
    
    $Template->assign("title", " Charchas | {$PageInfo->menutitle}");

    $Template->render("pages.pages");
}, 'GET');

$Route->add('/chachanew/dashboard/admin', function(){
  $Core = new Apps\Core;
  $Template = new Apps\Template;
  $Template->assign("title", "chachas | Home");
  $Template->assign("Pages", $Core->Pages());
  $Template->assign("fPages", $Core->Pages());
  $Template->assign("NewsPages", $Core->NewsPages());
  $Template->assign("Socials", $Core->Socials());
  $Template->assign("fSocials", $Core->fSocials());



  $Template->addheader("layouts.adminheader");
  $Template->addfooter("layouts.adminfooter");
  $Template->render("admin");
}, "GET");

$Route->add('/chachanew/admin', function(){
  $Core = new Apps\Core;
  $Template = new Apps\Template;
  $Template->assign("title", "chachas | Home");
  $Template->assign("Pages", $Core->Pages());
  $Template->assign("fPages", $Core->Pages());
  $Template->assign("NewsPages", $Core->NewsPages());
  $Template->assign("Socials", $Core->Socials());
  $Template->assign("fSocials", $Core->fSocials());



  $Template->addheader("layouts.header");
  $Template->addfooter("layouts.adminfooter");
  $Template->render("login");
}, "GET");


$Route->add("/chachanew/login", function(){
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $getusername = $Core->SiteInfo("username");
    $getpassword = $Core->SiteInfo("password");

    $data= $Core->post($_POST);
    
    if(isset($_POST["submit-form"])){

     if($data->username == $getusername && $data->password == $getpassword ){
         $Template->data["login"] = true;
         $Template->data["auth_session_key"] = true;
         $Template->save();
         $Template->redirect("/chachanew/dashboard/admin");

     }
     $Template->redirect("/chachanew/");
    }
}, "POST");

$Route->add("/chachanew/dashboard/do/{action}", function($action){
    $Core = new Apps\Core;
    $Template = new Apps\Template();
    $Template->assign("title", "Admin Area");

    $Template->assign("Pages", $Core->Pages());
    $Template->assign("fPages", $Core->Pages());
    $Template->assign("NewsPages", $Core->NewsPages());
    $Template->assign("Socials", $Core->Socials());
    $Template->assign("fSocials", $Core->fSocials());
  
    $Template->addheader("layouts.adminheader");
    $Template->addfooter("layouts.adminfooter");
    $Template->assign("menuaction", "{$action}");


    if($action=="logout"){
        $Template->expire();
        $Template->redirect("/chachanew/");
    }
    elseif($action=="pages"){
        $Template->assign("getPages", $Core->getPages());
        $Template->render("dashboard.admin-pages");


    }elseif($action=="settings"){
        $Template->assign("getAllSiteInfo", $Core->getAllSiteInfo());
        $Template->render("dashboard.settings");


    }

}, "GET");

$Route->add("/chachanew/dashboard/forms/settings", function(){
   $Core = new Apps\Core;
   $Template = new Apps\Template();
    $getAllSiteInfo =  $Core->getAllSiteInfo();

    while($Info = mysqli_fetch_object($getAllSiteInfo)){
      $name = "{$Info->name}";
      $then = $Core->updateSiteInfo($name, $_POST[$name]);
    }
   $Template->redirect("/chachanew/dashboard/do/settings");
   
   
}, "POST");

$Route->add("/chachanew/dashboard/{pageid}/edit-page", function($pageid){
    $Core = new Apps\Core;
    $Template = new Apps\Template();
    $Template->assign("title", "Admin Area");

    $Template->assign("Pages", $Core->Pages());
    $Template->assign("fPages", $Core->Pages());
    $Template->assign("NewsPages", $Core->NewsPages());
    $Template->assign("Socials", $Core->Socials());
    $Template->assign("fSocials", $Core->fSocials());
    $Template->addheader("layouts.adminheader");
    $Template->addfooter("layouts.adminfooter");


    $Template->assign("PageInfo", $Core->PageInfo($pageid));
    $Template->render("dashboard.admin-edit-page");
});


$Route->add("/chachanew/dashboard/{pageid}/update-page", function($pageid){
    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $data = $Core->post($_POST);
    $menutitle = $data->menutitle;
    $Slug = $Core->createSlug($menutitle);


   $Core->updatePage($pageid,$menutitle,$Slug, $data->sort, $data->content_text);
     $Template->assign("title", "Admin Area");

    $Template->assign("Pages", $Core->Pages());
    $Template->assign("fPages", $Core->Pages());
    $Template->assign("NewsPages", $Core->NewsPages());
    $Template->assign("Socials", $Core->Socials());
    $Template->assign("fSocials", $Core->fSocials());
    $Template->addheader("layouts.adminheader");
    $Template->addfooter("layouts.adminfooter");


    $Template->assign("PageInfo", $Core->PageInfo($pageid));
   $Template->render("dashboard.admin-edit-page");

}, "POST");



$Route->run("/");







