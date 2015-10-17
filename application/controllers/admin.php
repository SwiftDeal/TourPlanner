<?php
/**
* The admin controller which has highest privilege to manage the website
*
* @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
*/
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;
class Admin extends Users {
    /**
    * @readwrite
    */
    protected $_employer;
    /**
    * Method which sets data stats for admin dashboard
    *
    * changeLayout
    */
     /**
     * @before _secure, changeLayout
     */
    public function index() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $tusers = User::all();
        $tmessage = Contact::all();
        //$tbooking = Booking::all();
        $view->set("totalusers", count($tusers));
        $view->set("totalmessage",count($tmessage));
        //$view->set("totalbokings",count($tbooking));
    }
    /**
     * @before _secure, changeLayout
     */
    public function adminmanager() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $allusers = User::all(array("auth_type = ?" => "admin"));
        $view->set("alladmins", $allusers);

        if(RequestMethods::post("action")=="adminedit"){
            $muser = User::first(array("id = ?"=>RequestMethods::post("user_id")));
            $muser->verified= 1;
            $muser->alevel = RequestMethods::post("alevel");
            $muser->save();
            $view->set("msg", "User was successfully verified with given authority");
        }

         if(RequestMethods::post("action")=="admindelete"){
            $muser = User::first(array("id = ?"=>RequestMethods::post("user_id")));
            $muser->delete();
            $view->set("msg", "User was successfully deleted.");
        }
    }
     /**
     * @before _secure, changeLayout
     */
    public function users() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $allusers = User::all(array("auth_type = ?" => "user"));
        $view->set("allusers", $allusers);
    }

    /**
     * @before _secure, changeLayout
     */
    public function subscriber() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $allusers = Newsletter::all();
        $view->set("subscribers", $allusers);
    }
    /**
     * @before _secure, changeLayout
     */
    public function blogwriter(){
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        if(RequestMethods::post("action")=="newblog"){
            $blog = new Blog(array(
                "title"=>RequestMethods::post("title"),
                "user_id"=>$this->user->id,
                "content"=>RequestMethods::post("content")));
            if($blog->save())
            {
                $view->set("msg", "Your blog has successfully posted .. You can manage it in blog manager");
            }
        }
    }
     /**
     * @before _secure, changeLayout
     */
    public function messages() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $page = RequestMethods::get("page",1);
        $messages = Contact::all(array("deleted = ?" => 0), array("*"), "id", "desc", "10", $page);
        $view->set("contactus", $messages);
    }
    /**
     * @before _secure, changeLayout
     */
    public function myaccount() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
    /**
     * @before _secure, changeLayout
     */
    public function blogmanager() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
    /**
     * @before _secure, changeLayout
     */
    public function packagecreator() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        
        if(RequestMethods::post("action")=="newpackage"){
            
            $newpackage = new Tourpack(array(
                "title"=>RequestMethods::post("title"),
                "price"=>RequestMethods::post("price"),
                "duration"=>RequestMethods::post("duration"),
                "location"=>RequestMethods::post("location"),
                "season"=>RequestMethods::post("season"),
                "attraction"=>RequestMethods::post("attraction"),
                "description"=>RequestMethods::post("description")
                ));
            if($newpackage->save()){
                $view->set("msg", "Package created Successfully,You can modify it in Package Manager");
            }
        }
        
    }
    /**
     * @before _secure, changeLayout
     */
    public function analytics() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
    public function login() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if(RequestMethods::post("admin")=="login")
        {
            $admin = User::first(array(
                "email = ?"=>RequestMethods::post("adminemail"),
                "password = ?"=>sha1(RequestMethods::post("adminpassword")),
                "auth_type = ?"=>"admin"
                ));
            if($admin)
            {
                if($admin->verified==1){
                //set login true
                $this->setUser($admin);
                self::redirect("/admin");
            }
            else{
                $view->set("msg", "Sorry your account is not verified by the owner plz contact the owner.");
            }
            }else{
                $view->set("msg", "Email Or password seems to be incorrect");
            }
        }

    }

    public function register() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if(RequestMethods::post("register")=="admin")
        {
            $newadmin = new User(array(
                "name"=>RequestMethods::post("name"),
                "email"=>RequestMethods::post("email"),
                "mobile"=>RequestMethods::post("mobile"),
                "gender"=>RequestMethods::post("gender"),
                "password"=>sha1(RequestMethods::post("password")),
                "alevel"=>"Manager",
                "auth_type"=>"admin",
                "verified"=>0
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
     /**
     * @before _secure, changeLayout
     */
    public function searchrecords() {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $page = RequestMethods::get("page",1);
        $hotels = Srec::all(array("deleted = ?" => 0, "search = ?"=>"hotels"), array("*"), "id", "desc", "10", $page);
        $flights = Srec::all(array("deleted = ?" => 0, "search = ?"=>"flights"), array("*"), "id", "desc", "10", $page);
        $cars = Srec::all(array("deleted = ?" => 0, "search = ?"=>"cars"), array("*"), "id", "desc", "10", $page);
        $vacations = Srec::all(array("deleted = ?" => 0, "search = ?"=>"vacations"), array("*"), "id", "desc", "10", $page);
        $view->set("flights", $flights);
        $view->set("hotels", $hotels);
        $view->set("cars", $cars);
        $view->set("vacations",$vacations);
    }
    public function logout() {
        $this->setUser(false);
        self::redirect("/admin/");
    }
    public function changeLayout() {
        if(isset($user) && ($user->auth_type!="admin")){
                 self::redirect("/home");
            }
            else{
               
                $this->defaultLayout = "layouts/admin";
            $this->setLayout();
            }
        
        }
    }