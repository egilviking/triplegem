<?php
/**
* Holding a instance of CTripleGem to enable use of $this in subclasses and provide some helpers.
*
* @package TripleGemCore
*/
class CObject {

        /**
         * Members
         */
        public $config;
        public $request;
        public $data;
        public $db;
        public $views;
        public $session;


        /**
         * Constructor
         */
        protected function __construct() {
    $tg = CTripleGem::Instance();
    $this->config = &$tg->config;
    $this->request = &$tg->request;
    $this->data = &$tg->data;
    $this->db = &$tg->db;
    $this->views = &$tg->views;
    $this->session = &$tg->session;
  }


        /**
         * Redirect to another url and store the session
         */
        protected function RedirectTo($url) {
    $tg = CTripleGem::Instance();
    if(isset($tg->config['debug']['db-num-queries']) && $tg->config['debug']['db-num-queries'] && isset($tg->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }
    if(isset($tg->config['debug']['db-queries']) && $tg->config['debug']['db-queries'] && isset($tg->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }
    if(isset($tg->config['debug']['timer']) && $tg->config['debug']['timer']) {
         $this->session->SetFlash('timer', $tg->timer);
    }
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }


}
