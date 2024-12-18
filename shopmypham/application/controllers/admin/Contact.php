<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('backend/Mcontact');
        $this->load->model('backend/Muser');
        $this->load->model('backend/Morders');
		if(!$this->session->userdata('sessionadmin')){
			redirect('admin/user/login','refresh');
		}
		$this->data['user']=$this->session->userdata('sessionadmin');
		$this->data['com']='contact';
	}
	public function index(){
		$this->load->library('phantrang');
		$limit=8;
		$current=$this->phantrang->PageCurrent();
		$first=$this->phantrang->PageFirst($limit, $current);
		$total=$this->Mcontact->contact_count();
		$this->data['strphantrang']=$this->phantrang->PagePer($total, $current, $limit, $url='admin/contact');
		$this->data['list']=$this->Mcontact->contact_all($limit,$first);
		$this->data['view']='index';
		$this->data['title']='Quản lý liên hệ ';
		$this->load->view('backend/layout', $this->data);
	}
		public function status($id)
	{
		$row=$this->Mcontact->contact_detail($id);

		$status=($row['status']==0)?1:0;
		$mydata= array('status' => $status);
		$this->Mcontact->contact_update($mydata, $id);
		$this->session->set_flashdata('success', 'Cập Nhật Trạng Thái Thành Công');
		redirect('admin/contact/','refresh');
	}
	public function detail($id)
    {
    	if(!empty($_POST) && isset($_POST)){
    		$tieuDe = $this->input->post('tieuDePH');
    		$noiDung = $this->input->post('noiDungPH');
    		$emailKH = $this->input->post('emailKH');
    		$emailAdmin = $this->input->post('emailAdmin');
    		$nameAdmin = $this->input->post('nameAdmin');
        	$this->load->library('email');

            $this->load->library('parser');
            $this->email->clear();

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'tratrinh19623@gmail.com';
            $config['smtp_pass'] = 'iikdpeyyvawjvtgd';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['validation'] = TRUE;   
            $this->email->initialize($config);
            $this->email->from($emailAdmin, 'STORE MỸ PHẨM - '.$tieuDe);
            $this->email->to($emailKH);
            $this->email->subject($tieuDe);
            $this->email->message($noiDung.'<br> <p>Nhân viên hỗ trợ<br>'.$nameAdmin.'</p>');
            $this->email->send();

            $this->session->set_flashdata('success', 'Phản Hồi Khách Hàng Thành Công!');
            $this->data['view']='detail';
			$this->data['title']='mail ';
			$this->data['row']=$this->Mcontact->contact_status($id);
			$this->data['row']=$this->Mcontact->contact_detail($id);		
			$this->data['title']='Quản lý liên hệ ';
			$this->data['content'] = $noiDung;
			$this->data['titlePH'] = $tieuDe;
			$this->load->view('backend/layout', $this->data);
        }else{
        	$this->data['view']='detail';
			$this->data['title']='mail ';
			$this->data['row']=$this->Mcontact->contact_status($id);
			$this->data['row']=$this->Mcontact->contact_detail($id);		
			$this->data['title']='Quản lý liên hệ ';
			$this->load->view('backend/layout', $this->data);
        }
    }
    public function delete($id)
	{
		$this->Mcontact->contact_delete($id);
		$this->session->set_flashdata('success', 'Xóa Thành Công');
		redirect('admin/contact/recyclebin','refresh');
	}
	public function trash($id)
	{
		$mydata= array('trash' => 0);
		$this->Mcontact->contact_update($mydata,$id);
		$this->session->set_flashdata('success', 'Xóa Vào Thùng Rác Thành Công');
		redirect('admin/contact','refresh');
	}
	public function recyclebin()
	{
		$this->load->library('phantrang');
		$limit=10;
		$current=$this->phantrang->PageCurrent();
		$first=$this->phantrang->PageFirst($limit, $current);
		$total=$this->Mcontact->contact_trash_count();
		$this->data['strphantrang']=$this->phantrang->PagePer($total, $current, $limit, $url='admin/contact/recyclebin');
		$this->data['list']=$this->Mcontact->contact_trash($limit, $first);
		$this->data['view']='recyclebin';
		$this->data['title']='Thùng rác liên hệ';
		$this->load->view('backend/layout', $this->data);
	}
	public function restore($id)
	{
		$this->Mcontact->contact_restore($id);
		$this->session->set_flashdata('success', 'Khôi Phục Thành Công');
		redirect('admin/contact/recyclebin','refresh');
	}


}