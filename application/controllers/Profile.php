<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
 }
 public function index()
	{
            $this->load->model('products');
		$this->load->helper('url');
		 $this->load->library('session');
                $userid=$this->session->userdata('userid');
                $data['builds']=$this->products->my_builds($userid);
                 $this->load->view('profile',$data);
	}
public function view_builds(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);

    $this->load->view('all_products',$data);
}
public function  share_completed(){
    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    
    $this->load->model('products');
    $check_user_data=$this->products->check_user_data($userid,$_GET['build_no']);
    foreach ($check_user_data as $row){
        $ct= $row['ct'];
    }
    if($ct > 0){ 
        $this->products->share_data_completed($_GET['build_no']);
    }
    $data['builds']=$this->products->my_builds($userid);
    $this->load->view('profile',$data);
}
public function  save_comment(){
    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    
    $this->load->model('products');
    //echo $_GET['build_no'];
    //echo $_GET['comment'];
    $this->products->save_comment($userid,$_GET['build_no'],$_GET['comment']);
    
}
public function  show_comment(){
    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    
    $this->load->model('products');
    //echo $_GET['build_no'];
    //echo $_GET['comment'];
    $comments=$this->products->show_comment($_GET['build_no']);
    echo "<table class='td_color1' border='0' width='80%'>";
            $color="";
    foreach ($comments as $row){
        if ($color == 'td_color2'){
            $color="td_color1";
        }else{
            $color="td_color2";
        }
        
    
        echo "<tr class='" . $color . "' height='50'>"
        . "     <td width='10%'><font size='2'>User:" . $row["username"] . "</font></td><td><font size='2'>" . $row["comments"] . "</font></td><td width='10%'><font size='1'>Date:" . $row["crt_date"] . "</font></td>"
        ."</tr>";
    } 
    echo "</table>";
}
public function  liked_desliked(){

    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    $this->load->model('products');
    $liked_desliked=$_GET['liked_desliked'];
    //delete if exist
    if ($userid !=""){
    $this->products->del_liked_disliked($_GET['build_no'],$userid);
    $this->products->liked_disliked($_GET['build_no'],$userid,$liked_desliked);
    }
}
public function view_users(){

    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    $this->load->model('registers');
    //delete if exist
    //if ($userid !="" and $userid!=null){
    $data['view_users']=$this->registers->view_users();
    //}
    $this->load->view('users',$data);
}
public function delete_user(){

    $this->load->helper('url');
    $this->load->library('session');
    $userid=$this->session->userdata('userid');
    $this->load->model('registers');
    //delete if exist
    //if ($userid !="" and $userid!=null){
    $this->registers->delete_user($_GET['userid']);
    $data['view_users']=$this->registers->view_users();
    //}
    $this->load->view('users',$data);
}
public function delete_build(){
    $this->load->model('products');
		$this->load->helper('url');
		 $this->load->library('session');
                 $build_no=$_GET['build_no'];
                $userid=$this->session->userdata('userid');
                $this->products->delete_mybuild($userid,$build_no);
                $data['userid']=$userid;
                 $data['builds']=$this->products->my_builds($userid);
                 
                 $this->load->view('profile',$data);
}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */