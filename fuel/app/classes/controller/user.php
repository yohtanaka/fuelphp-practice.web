<?php

use Model_User as User;

class Controller_User extends Controller_Common
{
	/**
	 * @return void
	 */
	public function before()
	{
		parent::before();
		$this->template->title = 'Users';
	}

	/**
	 * @return void
	 */
	public function action_index()
	{
		$data['users'] = User::find('all');
		$this->template->content = View::forge('user/index', $data);
	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_view($id = null)
	{
		$data['user'] = User::find($id);
		$this->template->content = View::forge('user/view', $data);
	}

	/**
	 * @return void
	 */
	public function action_create()
	{
		$this->create(new User);
		$this->template->content = View::forge('user/create');
	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_edit($id = null)
	{
		$this->edit(User::find($id));
		$this->template->content = View::forge('user/edit');

	}

	/**
	 * @param  int|null  $id
	 * @return void
	 */
	public function action_delete($id = null)
	{
		$this->delete(User::find($id));
	}
}
