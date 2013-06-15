<?php

class Asana_Controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getWorkSpace($api)
	{
		$asana = new Asana\Project($api);//'QszfGvJ.aiGfehq4fMbLQaggB5kWwGVz');

		$result = $asana->getProjects();

		if($asana->responseCode == "200" && !is_null($result)){
			$resultJson = json_decode($result);

			//var_dump($resultJson->data);
			foreach ($resultJson->data as $projectall){
			$project = $asana->getProject($projectall->id);
			echo $project;
			}
		}
	}

	public function getWorkSpaces()
	{
		$workspace = new Asana\Workspace($this->api);

		$result = $workspace->getWorkspaces();

		if($workspace->responseCode == "200" && !is_null($result)){
			echo $result;
		}
	}

	public function getProjectsWS($id)
	{
		$workspace = new Asana\Workspace($this->api);

		$result = $workspace->getWorkspaceProjects($id);

		if($workspace->responseCode == "200" && !is_null($result)){
			echo $result;
		}
	}

	/**
	* @return JSON all project {:id,:name}
	*/
	public function getProjects()
	{
		$project = new Asana\Project($this->api);

		$result = $project->getProjects();

		if($project->responseCode == "200" && !is_null($result)){
			echo $result;
		}
	}

	/**
	* @param $id Project id 
	* @return JSON detail project
	* {
	*	:id,
	*	:created_at,
	*	:modified_at,
	*	:name,
	*	:notes,
	*	:archived,
	*	:workspace{:id,:name},
	*	:team{:id,:name},
	*	:followers
	* }
	*/
	public function getProjectDetail($id)
	{
		$project = new Asana\Project($this->api);

		$result = $project->getProject($id);

		if($project->responseCode == "200" && !is_null($result)){
			echo $result;
		}
	}
} 