<?php

require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookSession.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookRequest.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookResponse.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookSDKException.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookRequestException.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/FacebookAuthorizationException.php' );
require_once( ROOT . DS . 'library' . DS . 'Facebook/GraphObject.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

class usersController extends Controller {

    public $id;
    public $email;
    public $sns_id;
    public $nickname;
    public $account_type;
    public $regDate;
    public $update_date;


    function setFeed($item){
        $this->id = $item['id'];
        $this->email = $item['email'];
        $this->sns_id = $item['sns_id'];
        $this->nickname = $item['nickname'];
        $this->account_type = $item['account_type'];
        $this->regDate = $item['regDate'];
        $this->update_date = $item['update_date'];
    }

    /*
	* main
	* @param
	* @return array
	*/
    public function main(){
        $this->set('title', 'Feed on your life!');
    }

    /*
	* login
	* @param
	* @return array
	*/
    public function login($type){
        $this->facebookLogin();
    }


    public function add() {
        $referer =  _BASE_URL_."/feeds/viewall";
        if( !trim($_POST['name']) || !trim($_POST['user_id']) || !trim($_POST['password']) ){
            msg_page("Required fields are missing.");
        }

        $data = Array(
            "user_id" => trim(strval($_POST['user_id'])),
            "name" => trim(strval($_POST['name'])),
            "password" => $this->User->func('SHA1(?)', Array( trim(strval($_POST['password'])).SALT) ),
        );
        $this->User->getUser("id", array("user_id"=>$data['user_id']));
        if( $this->User->count > 0 ){
            msg_page("ID is already subscribed.");
        }

        $id = $this->set('user',$this->User->add($data));
        if($id){
            $_SESSION['LOGIN_NO'] = $data["id"];
            $_SESSION['LOGIN_ID'] = $data["user_id"];
            $_SESSION['LOGIN_NAME'] = $data["name"];

            /*check is save id */
            $is_save_id =  ( isset($_POST['is_save_id']) ? trim(strval($_POST['is_save_id'])) : "N");
            if($is_save_id == "Y"){
                setcookie("is_save_id", "Y" , time()+60*60*24*365,"/");
                setcookie("LOGIN_ID", $data['user_id'] , time()+60*60*24*365,"/");
            }else{
                setcookie("is_save_id", "" , time()+60*60*24*365,"/");
            }
        }
        redirect($referer);
    }

    /*
	* facebook login
	* @param
	* @return array
	*/
    public function facebookLogin(){
        // init app with app id (APPID) and secret (SECRET)
        FacebookSession::setDefaultApplication(APPID_FACEBOOK,SECRET_FACEBOOK);
        // login helper with redirect_uri
        $helper = new FacebookRedirectLoginHelper( 'http://'._BASE_URL_.'/users/login' );

        try {
            $session = $helper->getSessionFromRedirect();
        } catch( FacebookRequestException $ex ) {
            // When Facebook returns an error
            printr($ex);
        } catch( Exception $ex ) {
            // When validation fails or other local issues
            printr($ex);
        }
        // see if we have a session
        if ( isset( $session ) ) {
            // graph api request for user data
            $request = new FacebookRequest( $session, 'GET', '/me' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();
            //todo insert or update user info
            // print data
            echo  print_r( $graphObject, 1 );
        } else {
            // show login url
            echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
        }
    }

    /*
	* facebook login
	* @param
	* @return array
	*/
    public function facebookLoginCheck(){
        // init app with app id (APPID) and secret (SECRET)
        FacebookSession::setDefaultApplication(APPID_FACEBOOK,SECRET_FACEBOOK);

        // login helper with redirect_uri
        $helper = new FacebookRedirectLoginHelper( 'http://'._BASE_URL_.'/feeds/viewall' );

        try {
            $session = $helper->getSessionFromRedirect();
        } catch( FacebookRequestException $ex ) {
            // When Facebook returns an error
        } catch( Exception $ex ) {
            // When validation fails or other local issues
        }

        // see if we have a session
        if ( isset( $session ) ) {
            // graph api request for user data
            $request = new FacebookRequest( $session, 'GET', '/me' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();
            //todo insert or update user info
            // print data
            echo  print_r( $graphObject, 1 );
        } else {
            // show login url
            echo '<p><a href="' . $helper->getLoginUrl() . '">Login</a></p>';
            echo '<p><a href="' . _BASE_URL_ . '/users/emailLoginForm">Login</a></p>';
        }
    }

    /*
	* Email login form
	* @param
	* @return
	*/
    function emailLoginForm() {
        $this->set('title','email login user - FeedOn App');
    }

    /*
	* Email join form
	* @param
	* @return
	*/
    function emailJoinForm() {
        $this->set('title','email join user - FeedOn App');
    }
    /*
	* Get feed
	* @param
	* @return array
	*/
    public function getFeed($column, $where = null){
        if( is_array($where) && !is_null($where) )
        {
            foreach($where as $key => $value)
            {
                $this->Feed->where($key,$value);
            }
        }
        return	$stats = $this->Feed->getOne("feed", $column);
    }


}