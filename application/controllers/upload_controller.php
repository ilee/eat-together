<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->load->model('Meal');
		$this->load->helper(array('form', 'url'));
	}

	public function do_upload()	
	{
		$meal_id = $this->session->userdata('meal_id');
		$config = array(

				'upload_path' => "./assets/uploads/meal/".$meal_id,
				'allowed_types'   => "gif|jpg|png|jpeg|pdf",
				'overwrite'       => TRUE,
				'max_size'        => "2048000",  
				'max_height'      => "768",
				'max_width'       => "1024"  
			);

		$path = "./assets/uploads/meal/".$meal_id;
    if(!is_dir($path)) //create the folder if it's not already exists
    {
      mkdir($path,0755,TRUE);
    } 

		$this->load->library('upload', $config);
		// $this->Meal->upload_image($this->input->post());

		if ( ! $this->upload->do_upload('meal_images'))
		{
			$error = array('error' => $this->upload->display_errors());

		 	// $this->load->view('upload_form', $error);
		 	$this->load->view('add_meal_image', $error);
		}
		else
		{
			// $data = array('upload_data' => $this->upload->data());

			redirect('views/meal/'.$meal_id);
		}
	}
}

//end of meal controller