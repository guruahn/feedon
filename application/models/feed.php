<?php

class Feed extends Model {

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
        $feeds = $this->get('feed');
        return $feeds;
    }

    /*
	* Get a feed
	* @param
	* @return array
	*/
    public function getFeed($column, $where = null)
    {
        if( is_array($where) && !is_null($where) )
        {
            foreach($where as $key => $value)
            {
                $this->where($key,$value);
            }
        }
        return	$stats = $this->getOne("feed", $column);
    }
}