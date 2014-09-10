<?php
/**
 * Created by PhpStorm.
 * User: gongjam
 * Date: 14. 8. 14
 * Time: 오후 9:26
 */

class User extends Model {

    /*
	* Get a user
	* @param
	* @return array
	*/
    public function getUser($column = "*", $where = null)
    {
        if( is_array($where) && !is_null($where) )
        {
            foreach($where as $key => $value)
            {
                $this->where($key,$value);
            }
            $post = $this->getOne("user", $column);
        }else{
            $post = $this->get("user", $column);

        }
        return	$post;
    }

    /*
    * add user
    * @param
    * @return array
    */
    public function add($data)
    {
        $id = $this->insert('user', $data);
        return	$id;
    }


}