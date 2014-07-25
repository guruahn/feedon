<?php  
/**
 * Provider model
 *
 * @author  Tendency
 * @author  Tendency Dev Team
 * @package tdc_lib
 */

 class Provider
 {
	public $id;
	public $name;
	public $url;
	public $db;
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function __destruct()
	{
		
		
	}

	/*
	* Get list
	* @param
	* @return array
	*/
	public function getList()
	{
		
		echo "this is provider class!!";
		$providers = $this->db->get('feed_provider');
		return $providers;
	}

     /*
     * Insert
     * @param
     * @return array
     */
     public function insert()
     {

         $data = Array(
             'name' => $this->name,
             'url' => $this->url
         );

         $id = $this->db->insert('feed_provider', $data);
         if ($id)
             return true;
         else
             return false;
     }
 }

