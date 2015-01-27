<?php
class User extends Phalcon\Mvc\Model
{
	public $uid;
	public $usetime;
	public $uname;
	public $email;
	public $status;
	public $create_time;
	public $dtime;
	public $birthday;
	public $gold_num;
	public $reward_point;
	public $last_login_time;
	public $online_accum_time;
	public $password;
	
	public function getSource(){
		return "t_user";
	}
	
	public function init(){
		$this->usetime = Util::getTime();
		$this->status = 1;
		$this->create_time = Util::getTime();
		$this->dtime = 0;
		$this->birthday = 0;
		$this->gold_num = 0;
		$this->reward_point = 0;
		$this->last_login_time = 0;
		$this->online_accum_time = 0;
	}
	
}
