<?php 
class huongdan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->data['com']='Huongdan';
		$this->load->model('frontend/Mcategory');
		$this->load->model('frontend/Mproduct');
		$this->load->model('frontend/Mcontact');
    }
 
    public function index(){
        $this->data['title']='STORE MỸ PHẨM - Hướng Dẫn';
        $this->data['view']='index';
		$this->load->view('frontend/layout',$this->data);
       
    }
    public function thanhtoan(){    
        $this->data['title']='STORE MỸ PHẨM - Hướng Dẫn Thanh Toán';
        $this->data['view']='thanhtoan';
        $this->load->view('frontend/layout',$this->data);
}
    public function dieukhoan(){
        $this->data['title']='STORE MỸ PHẨM - Điều Khoản';
        $this->data['view']='dieukhoan';
        $this->load->view('frontend/layout',$this->data);
    }
}
?>