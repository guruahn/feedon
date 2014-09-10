<?php

class Provider extends Model {

    /*
     * Get list
     * @param
     * @return array
     */
    public function getList($orderby = null) {
        if( !is_null($orderby) && is_array($orderby) ){
            foreach($orderby as $key => $value){
                $this->orderBy($key,$value);
            }
        }
        return $this->get('feed_provider');
    }

    /*
	* Get a provider
	* @param (string)$column, (array)$where
	* @return array
	*/
    public function getProvider($column, $where = null){
        if( !is_null($where) && is_array($where) )
        {
            foreach($where as $key => $value)
            {
                $this->where($key,$value);
            }
        }
        return	$this->getOne("feed_provider", $column);
    }

}