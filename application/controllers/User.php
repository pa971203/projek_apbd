<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index($id_ = null)
    {
        $edit = $this->db->get_where('users', ["id" => $id_])->row_array();
        // $this->db->order_by('tahun', 'desc');
        $data_query = $this->db->get_where('users')->result_array();
        $data = [
            "title" => "User",
            "pages" => "User/index",
            "script" => "User/script",
            "data_sumber" => $data_query,
            "edit"      => json_encode($edit)
        ];
        $this->load->view('Router/route', $data);
    }
    public function action()
    {
        $data = $this->input->post();
        unset($data['id']);
        if (!empty($_POST['id']) && $_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $ins = $this->db->update('users', $data);
        } else {
            $ins = $this->db->insert('users', $data);
        }

        if ($ins) {
            $this->session->set_flashdata('status', '1');
            redirect(base_url('User/index'));
        } else {
            $this->session->set_flashdata('status', '0');
            redirect(base_url('User/index'));
        }
    }
    public function hapus($id_)
    {
      $this->db->where('id',$id_);
      $delete = $this->db->delete('users');
      
      if($delete){
        $this->session->set_flashdata('pesan','1');
        redirect(base_url('User/index'));
    }else{
        $this->session->set_flashdata('pesan','0');
        redirect(base_url('User/index'));
    }
}

}
