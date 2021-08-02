<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan extends CI_Controller
{
    public function index($id_ = null)
    {
        $edit = $this->db->get_where('pendapatan_desa', ["id_pendapatan" => $id_])->row_array();
        // $this->db->order_by('tahun', 'desc');
        $data_query = $this->db->get_where('pendapatan_desa')->result_array();
        $data = [
            "title" => "Pendapatan",
            "pages" => "Pendapatan/index",
            "script" => "Pendapatan/script",
            "data_sumber" => $data_query,
            "edit"      => json_encode($edit)
        ];
        $this->load->view('Router/route', $data);
    }
    public function action()
    {
        $data = $this->input->post();
        unset($data['id_pendapatan']);
        if (!empty($_POST['id_pendapatan']) && $_POST['id_pendapatan'] != '') {
            $this->db->where('id_pendapatan', $_POST['id_pendapatan']);
            $ins = $this->db->update('pendapatan_desa', $data);
        } else {
            $ins = $this->db->insert('pendapatan_desa', $data);
        }

        if ($ins) {
            $this->session->set_flashdata('status', '1');
            redirect(base_url('Pendapatan/index'));
        } else {
            $this->session->set_flashdata('status', '0');
            redirect(base_url('Pendapatan/index'));
        }
    }
    public function hapus($id_)
    {
      $this->db->where('id_pendapatan',$id_);
      $delete = $this->db->delete('pendapatan_desa');
      
      if($delete){
        $this->session->set_flashdata('pesan','1');
        redirect(base_url('Pendapatan/index'));
    }else{
        $this->session->set_flashdata('pesan','0');
        redirect(base_url('Pendapatan/index'));
    }
}

}
