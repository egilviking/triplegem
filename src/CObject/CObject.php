<?php
/**
 * Holding a instance of CTripleGem to enable use of $this in subclasses and provide some helpers.
 *
 * @package CTripleGem
 */
class CObject {

	/**
	 * Members
	 */
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;


	/**
	 * Constructor, can be instantiated by sending in the $tg reference.
	 */
	protected function __construct($tg=null) {
	  if(!$tg) {
	    $tg = CTripleGem::Instance();
	  } 
	  
	$this->tg 		= &$tg;
    $this->config   = &$tg->config;
    $this->request  = &$tg->request;
    $this->data     = &$tg->data;
    $this->db       = &$tg->db;
    $this->views    = &$tg->views;
    $this->session  = &$tg->session;
    $this->user     = &$tg->user;
	}


	/**
	* Wrapper for same method in CTripleGem. See there for documentation.
	*/
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
		$this->tg->RedirectTo($urlOrController, $method, $arguments);
	}


	/**
	* Wrapper for same method in CTripleGem. See there for documentation.
	*/
	protected function RedirectToController($method=null, $arguments=null) {
		$this->tg->RedirectToController($method, $arguments);
	}


	/**
	* Wrapper for same method in CTripleGem. See there for documentation.
	*/
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
		$this->tg->RedirectToControllerMethod($controller, $method, $arguments);
	}


	/**
	* Wrapper for same method in CTripleGem. See there for documentation.
	*/
	protected function AddMessage($type, $message, $alternative=null) {
		return $this->tg->AddMessage($type, $message, $alternative);
	}


	/**
	* Wrapper for same method in CTripleGem. See there for documentation.
	*/
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
		return $this->tg->CreateUrl($urlOrController, $method, $arguments);
	}
}
  