<?php

class Migrate extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if(!$this->input->is_cli_request()) {
			show_404();
		}
		$this->load->library('migration');
	}

	public function index()
	{
		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function generate($name = null)
	{
		if (empty($name)) {
			show_error('Migration name is required.');
		}

		if (!preg_match('/^[a-z_]+$/', $name)) {
			show_error('Migration name must contain only lowercase letters and underscores.');
		}

		$fileName = date('YmdHis') . '_' . $name . '.php';

		$path = APPPATH . 'migrations/' . $fileName;
                
		$template = file_get_contents(APPPATH . 'views/migration_template.php');

		$template = str_replace('{name}', $name, $template);

		if (file_put_contents($path, $template)) {
			echo 'Migration created successfully.' . PHP_EOL;
		} else {
			echo 'Error creating migration.' . PHP_EOL;
		}
	}

	public function rollback($version = null)
	{
		if (empty($version)) {
			$version = $this->migration->latest();
		}

		if ($this->migration->version($version) === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function latest()
	{
		if ($this->migration->latest() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

}
