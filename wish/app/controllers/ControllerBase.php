<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    protected function initialize()
    {
        $this->tag->prependTitle('HuaSi | ');
        $this->view->setTemplateAfter('main');
    }

    protected function forward($uri)
    {
        return $this->response->redirect($uri);
    }
}
