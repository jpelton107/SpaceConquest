<?php
class Tick extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('user');
	}

	/**
	 * For each user: 
	 * --------------
	 * 	o Add resource production to old resources
	 * 	o Subtract 1 from ship return time if travel time is greater than 0
	 * 	o Add research points
	 *
	 *---------------
	 */
	public function index()
	{
		$this->load->model('users_model');
		$users = $this->users_model->get_all();
		foreach($users as $user) 
		{
			$this->user->set_id($user['id']);
			$this->user->load_resource_production();
			$resources = $this->user->get_resources();

			foreach($resources as $resource) 
			{
				$new = $resource['quantity'] + $resource['production'];
				$this->resources->update($resource['primary_id'], $new);
			}
		}
	}
}
