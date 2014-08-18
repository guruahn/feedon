<?php
session_start();

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
    public function login(){
        $this->facebookLogin();
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
        $helper = new FacebookRedirectLoginHelper( _BASE_URL_.'/feeds/viewall' );

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
            echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
        }
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