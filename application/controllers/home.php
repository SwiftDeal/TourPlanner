<?php

/**
 * The Default Example Controller Class
 *
 * @author Meraj Ahmad Siddiqui
 *
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Home extends Controller {

    public function index() {
        $this->changeLayout();
        $view = $this->getActionView();
        $pack = Tourpack::all(array("deleted = ?" => 0), array("*"), "id", "desc", "10", "1"); 
        $view->set("package", $pack);

       /*
        $model = new Tourpack();
        $db = Registry::get("database");
        $db->sync($model);
       */

        if(RequestMethods::post("action")=="userlogin")
        {
            $user = User::first(array(
                "email = ?"=>RequestMethods::post("email"),
                "password = ?"=>sha1(RequestMethods::post("password"))
                ));
            if($user){
                $view->set("msg", "Welcome {$user->name}, You are successfully Logged in");
            }else{
                $view->set("msg", "Email Id Or Password Incorrect");
            }
        }

        
        if(RequestMethods::post("action")=="newsletter"){
            $newsletter = new Newsletter(array(
                "name"=>RequestMethods::post("name"),
                "email"=>RequestMethods::post("email")
                ));
            $newsletter->save();
        }
        
    }
    public function contact() {
	
        	if(RequestMethods::post("action")=="conatctme"){
            	$contactform= new Contact(array(
            	"name" => RequestMethods::post("name"),
            	"email" => RequestMethods::post("email"),
            	"subject" => RequestMethods::post("subject"),
            	"message" =>RequestMethods::post("message")
                ));     
                $contactform->save();
            }
    }
    public function about(){
        
    }
    public function services(){
        
    }
    public function gallery() {
        
    }
    public function package() {
        $this->changeLayout();
        $view = $this->getActionView();

            $package = Tourpack::first(array("id = ?"=>RequestMethods::get("id")));
            $view->set("package", $package);
        
    }
    public function usersignup() {

        if(RequestMethods::post("action")=="usersignup")
        {
            $newadmin = new User(array(
                "name"=>RequestMethods::post("name"),
                "email"=>RequestMethods::post("email"),
                "mobile"=>RequestMethods::post("mobile"),
                "gender"=>RequestMethods::post("gender"),
                "password"=>sha1(RequestMethods::post("password")),
                "alevel"=>"user",
                "auth_type"=>"user",
                "verified"=>1
                ));
            $search_email = User::first(array("email = ?"=>RequestMethods::post("email")));
            if(!$search_email){
                $newadmin->save();
                $view->set("msg", "Thankyou for submission, After verification your account will be activated");
            }else{
                $view->set("msg", "This Email Id is all ready registred with us.");
            }
        }

    }
    public function blog(){
        $this->changeLayout();
        $view = $this->getActionView();
        $page= RequestMethods::get("page",1);
        $blog = Blog::all(array("deleted = ?" => 0), array("*"), "id", "desc", "4", $page); 
        $view->set("blogs", $blog);
    }

    public function search(){

            if(RequestMethods::get("search_type")=="hotels") {
                $searchrecord = new Srec(array(
                                "search"=>RequestMethods::get("search_type"),
                                "input1"=>RequestMethods::get("location"),
                                "input2"=>RequestMethods::get("checkin"),
                                "input3"=>RequestMethods::get("checkout"),
                                "input4"=>RequestMethods::get("guest")
                                ));
                    $searchrecord->save();
                    
            }

            /*Flight Search*/
            if(RequestMethods::get("search_type")=="flights"){
                
                $searchrecord = new Srec(array(
                                "search"=>RequestMethods::get("search_type"),
                                "input1"=>RequestMethods::get("from"),
                                "input2"=>RequestMethods::get("to"),
                                "input3"=>RequestMethods::get("date"),
                                "input4"=>RequestMethods::get("people")
                                ));
                    $searchrecord->save();
                    
                    /*
                    $data = array ( "request" => array(
                                "passengers" => array( 
                                        adultCount => 1
                                            ),
                                        "slice" => array( 
                                                array(
                                                    origin => "BOS",
                                                    destination => "LAX",
                                                    date => "2015-11-09"),
                                                array(
                                                    origin => "LAX",
                                                    destination => "BOS",
                                                    date => "2015-12-10"),
                                                ),
                                                    solutions => "10"
                                                ),                   
                                 );                                                                                   
                    $data_string = json_encode($data);
                    $ch = curl_init('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyBBVEwnhJrZHPpKsxTIG-AsQrgLUlobn80');                                                                      
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);                                                                      
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   

                    $result = curl_exec($ch);
                    curl_close($ch);

                    /* then I echo the result for testing purposes 

                    echo $result;
                    */
            }    
    }


    public function changeLayout() {
            $this->defaultLayout = "layouts/standard";
            $this->setLayout();
            $view = $this->getLayoutView();
            $nav = Tourpack::all(array("deleted = ?" => 0), array("*"), "id", "desc", "4", "1"); 
            $view->set("navs", $nav);
    }
}
