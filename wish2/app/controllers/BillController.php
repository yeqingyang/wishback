<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BillController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for bill
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Bill", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "bid";

        $bill = Bill::find($parameters);
        if (count($bill) == 0) {
            $this->flash->notice("The search did not find any bill");

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bill,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a bill
     *
     * @param string $bid
     */
    public function editAction($bid)
    {

        if (!$this->request->isPost()) {

            $bill = Bill::findFirstBybid($bid);
            if (!$bill) {
                $this->flash->error("bill was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "bill",
                    "action" => "index"
                ));
            }

            $this->view->bid = $bill->bid;

            $this->tag->setDefault("bid", $bill->bid);
            $this->tag->setDefault("bname", $bill->bname);
            $this->tag->setDefault("gid", $bill->gid);
            $this->tag->setDefault("cost", $bill->cost);
            $this->tag->setDefault("uid", $bill->uid);
            $this->tag->setDefault("create_time", $bill->create_time);
            $this->tag->setDefault("finish_time", $bill->finish_time);
            $this->tag->setDefault("status", $bill->status);
            $this->tag->setDefault("place", $bill->place);
            
        }
    }

    /**
     * Creates a new bill
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "index"
            ));
        }

        $bill = new Bill();

        $bill->bname = $this->request->getPost("bname");
        $bill->gid = $this->request->getPost("gid");
        $bill->cost = $this->request->getPost("cost");
        $bill->uid = $this->request->getPost("uid");
        $bill->create_time = $this->request->getPost("create_time");
        $bill->finish_time = $this->request->getPost("finish_time");
        $bill->status = $this->request->getPost("status");
        $bill->place = $this->request->getPost("place");
        

        if (!$bill->save()) {
            foreach ($bill->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "new"
            ));
        }

        $this->flash->success("bill was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bill",
            "action" => "index"
        ));

    }

    /**
     * Saves a bill edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "index"
            ));
        }

        $bid = $this->request->getPost("bid");

        $bill = Bill::findFirstBybid($bid);
        if (!$bill) {
            $this->flash->error("bill does not exist " . $bid);

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "index"
            ));
        }

        $bill->bname = $this->request->getPost("bname");
        $bill->gid = $this->request->getPost("gid");
        $bill->cost = $this->request->getPost("cost");
        $bill->uid = $this->request->getPost("uid");
        $bill->create_time = $this->request->getPost("create_time");
        $bill->finish_time = $this->request->getPost("finish_time");
        $bill->status = $this->request->getPost("status");
        $bill->place = $this->request->getPost("place");
        

        if (!$bill->save()) {

            foreach ($bill->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "edit",
                "params" => array($bill->bid)
            ));
        }

        $this->flash->success("bill was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bill",
            "action" => "index"
        ));

    }

    /**
     * Deletes a bill
     *
     * @param string $bid
     */
    public function deleteAction($bid)
    {

        $bill = Bill::findFirstBybid($bid);
        if (!$bill) {
            $this->flash->error("bill was not found");

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "index"
            ));
        }

        if (!$bill->delete()) {

            foreach ($bill->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bill",
                "action" => "search"
            ));
        }

        $this->flash->success("bill was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bill",
            "action" => "index"
        ));
    }

}
