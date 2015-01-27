<?php

class IndexController extends ControllerBase 
{
	public function initialize() {
		$this->tag->setTitle ( 'Home' );
		parent::initialize ();
	}

	public function IndexAction(){
		$this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_LAYOUT);
	}

}
