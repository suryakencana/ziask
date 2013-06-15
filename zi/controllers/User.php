<?php

class User_Controller extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index($names,$id=null)
	{
		// $this->app->urlFor('user.index');
		$usr = User::all();
		$this->redirect('super',array('name' => $names, 'id'=>$id));
	}
}