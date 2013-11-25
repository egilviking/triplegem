<?php
/**
* Standard controller layout.
*
* @package TripleGemCore
*/
class CCIndex implements IController
{
  /**
* Implementing interface IController. All controllers must have an index action.
*/
  public function Index()
  {
    global $triplegem;
    $triplegem->data['title'] = "The Index Controller";
    $triplegem->data['main'] = "<h1>The Index Controller</h1>";
  }
}
