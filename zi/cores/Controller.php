<?php

abstract class Controller
{

	protected $app;
	protected $api;

	public function __construct() 
	{
		$this->app = \App::getInstance();
		//for control auth author user
		//if($auth)
		$this->api = 'QszfGvJ.aiGfehq4fMbLQaggB5kWwGVz';
	}

	public function redirect($name, $params = array() , $routeName = true)
	{
		$url = $routeName ? $this->app->urlFor($name,$params) : $name;
		$this->app->redirect($url);
	}

	public function get($value = null)
	{
		return $this->app->request()->get($value);
	}

	public function post($value = null)
	{
		return $this->app->request()->post($value);
	}

	public function response($body)
	{
		$response = $this->app->response();
		$response['Content-Type'] = 'application/json';
		$response['X-Powered-By'] = APPLICATION . ' ' . VERSION;
		$response->body(json_encode(array($body)));
	}

	public function render($template, $data = array(), $status = null)
	{
		if ($len = strpos(strrev($template), '.')) {
			$template = substr( $template, 0, -($len+1) );
		}
		$this->app->view()->appendData(array('auth' => $this->auth));
		$this->app->render($template . EXT, $data, $status);
	}

	protected function errorOutput(array $errors = array())
	{
		$outputErrors = array();
		foreach ($errors as $key => $value) {
			$outputErrors[] = ucfirst($key) . ' ' . $value[0];
		}
		return $outputErrors;
	}
}