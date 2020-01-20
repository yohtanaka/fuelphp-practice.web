<?php

class Controller_Common extends Controller_Template
{
	/**
	 * @var void
	 */
	protected $column;

	/**
	 * @return void
	 */
	public function before()
	{
		parent::before();
		$this->columns = $this->get_input_columns();
	}

	/**
	 * @param  Model  $object
	 * @return void
	 */
	protected function create($object)
	{
		if (Input::method() !== 'POST') {
			return;
		}

		$val = $object::validate('create');

		if ($val->run()) {
			$new_object = $object::forge($this->columns);

			if ($new_object and $new_object->save()) {
				Session::set_flash('success', 'Added '.$object::$_name.' #'.$new_object->id.'.');
				Response::redirect($object::$_name);
			} else {
				Session::set_flash('error', 'Could not save '.$object::$_name.'.');
			}
		} else {
			Session::set_flash('error', $val->error());
		}
	}

	/**
	 * @param  Model  $object
	 * @return void
	 */
	protected function edit($object)
	{
		$val = $object::validate('edit');

		if ($val->run()) {
			foreach ($this->columns as $key => $column) {
				$object->{$key} = Input::post($key);
			}

			if ($object->save()) {
				Session::set_flash('success', 'Updated '.$object::$_name.' #'.$object->id);
				Response::redirect($object::$_name);
			} else {
				Session::set_flash('error', 'Could not update '.$object::$_name.' #'.$object->id);
			}
		} else {
			if (Input::method() === 'POST') {
				foreach ($this->columns as $key => $column) {
					$object->{$key} = $val->validated($key);
				}
				Session::set_flash('error', $val->error());
			}
			$this->template->set_global($object::$_name, $object, false);
		}
	}

	/**
	 * @param  Model  $object
	 * @return void
	 */
	protected function delete($object)
	{
		if ($object) {
			Session::set_flash('success', 'Deleted '.$object::$_name.' #'.$object->id);
			$object->delete();
		} else {
			Session::set_flash('error', 'Could not delete '.$object::$_name.' #'.$object->id);
		}

		Response::redirect($object::$_name);
	}

	/**
	 * @param  array  $columns
	 * @return array
	 */
	private function get_input_columns($columns = [])
	{
		foreach (Input::all() as $key => $column) {
			if ($key !== 'submit') {
				$columns[$key] = $column;
			}
		}
		return $columns;
	}
}
