<?php

class ProvidersController extends Controller {

    public $id;
    public $name;
    public $url;

    /*
     * viewall
     * @param
     * @return array
     */
    function viewall() {
        $this->set('title','My Providers List App');
        $this->set('providers', $this->Provider->getList() );
    }

    /*
     * insert
     * @param
     * @return array
     *
     */
    function insert(){
        global $is_API;
        $result = array(
            'result'=>0,
            'message'=>'failed insert',
            'id'=>''
        );
        //feed name or url check
        if( !isset($_POST['feed_name']) || !isset($_POST['feed_url']) ){
            $result['message'] = "Undefined feed name or feed url";
            json_encode($result);
            exit;
        }
        $data = array(
            'url'=>$_POST['feed_url'],
            'link'=>$_POST['feed_link'],
            'description'=>$_POST['feed_desc'],
            'name'=>$_POST['feed_name'],
            'type'=>$_POST['feed_type']
        );
        if( $this->Provider->getProvider( "id", array('url'=>$data['url']) ) ){
            $result['message'] = "already exist";
        }else{
            $id = $this->Provider->insert('feed_provider', $data);
            if($id){ //success
                $result['result'] = 1;
                $result['message'] = "success insert";
                $result['id'] = $id;
            }
        }

        if($is_API){
            echo json_encode($result);
        }else{
            $this->set( 'result', $result );
        }
    }


}