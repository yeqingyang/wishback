<?php
class PostsController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
	}
	public function showAction($postId)
	{
		// Pass the $postId parameter to the view
		$this->view->setVar("postId", $postId);
	}
	public function initialize()
	{
		$this->view->setTemplateAfter('common');
	}
	public function lastAction()
	{
		$this->flash->notice("These are the latest posts");
	}
}
