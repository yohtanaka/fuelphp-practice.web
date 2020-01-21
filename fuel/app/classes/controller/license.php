<?php

use Model_License as License;

class Controller_License extends Controller_Common
{
	/**
	 * @return void
	 */
	public function before()
	{
		parent::before();
		$this->template->title = 'Licenses';
	}

	/**
	 * @return void
	 */
	public function action_index()
	{
		$data['licenses'] = License::find('all');
		$this->view('license/index', $data);
	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_view($id = null)
	{
		$data['license'] = License::find($id);
		$this->view('license/view', $data);
	}

	/**
	 * @return void
	 */
	public function action_create()
	{
		$this->create(new License);
		$this->view('license/create');
	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_edit($id = null)
	{
		$this->edit(License::find($id));
		$this->view('license/edit');
	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_delete($id = null)
	{
		$this->delete(License::find($id));
	}
}
