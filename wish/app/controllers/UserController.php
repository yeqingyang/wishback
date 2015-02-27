<?php

class UserController extends ControllerBase
{

	public function indexAction()
	{
		
		$user = new User();
		$users = $user->find();
		$data = array ();
		foreach ( $users as $user ) {
			$data [] = array (
					'uid' =>$user->uid,
					'name' => $user->uname,
					'email' => $user->email,
					'birthday' =>$user->birthday,
					'gold_num' =>$user->gold_num,
					'reward_point' =>$user->reward_point,
			);
		}
		echo json_encode($data);
	}

	public function getUserAction($name=NULL)
	{
		$uname = $this->request->get('uname','string');
		if(empty($uname)){
			$users = User::find();
		}else{
			$users = User::find("uname='$uname'");
		}
		$data = array ();
		foreach ( $users as $user ) {
			$data [] = array (
					'uid' =>$user->uid,
					'name' => $user->uname,
					'email' => $user->email,
					'birthday' =>$user->birthday,
					'gold_num' =>$user->gold_num,
					'reward_point' =>$user->reward_point,
			);
		}
		echo json_encode($data);
	}
	
	public function addUserAction(){
		$user = new User();
		$user->init();
		$user->uname = $this->request->get('uname','string');
		$user->email = $this->request->get('email','email');
		$p1 = $this->request->get('password','string');
		$p2 = $this->request->get('password2','string');
		if($p1!==$p2){
			echo "password not same!";
			return;
		}
		$user->password = md5($p1);
		$ret = $user->save();
		if(!$ret){
			foreach ($user->getMessages() as $message) {
				$this->flash->error((string) $message);
			}
		}else{
			$this->flash->success("user was successfully added");
			return $this->response->redirect("user/index");
		}
	}
	
	
	public function deleteUserAction($uid){
		$user = User::findFirst("uid=$uid");
		$user->delete();
	}
	
	public function infoAction(){
	    $auth = $this->session->get('auth');
	    if(isset($auth['info'])){
	        $user = $auth['info'];
	        var_dump($user->toArray());
	    }
	}

}
