<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('upload');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);

                }
                else
                {
                        $data['a'] = $this->upload->data();

                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'docx';
                        $this->upload->initialize($config);

                        if ( ! $this->upload->do_upload('a'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                                $this->load->view('upload_form', $error);
                        }
                        else
                        {
                                $data['b'] = $this->upload->data();
                                $this->load->view('success_page', $data);
                        }

                }

               
        }
}
?>