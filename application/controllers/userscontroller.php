<?php

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
    public function main()
    {
        $this->set('title', 'Feed on your life!');
    }

    /*
	* login
	* @param
	* @return array
	*/
    public function login()
    {

    }

    /*
	* Get feed
	* @param
	* @return array
	*/
    public function getFeed($column, $where = null)
    {
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