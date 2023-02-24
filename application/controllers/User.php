<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
 }
		
	public function index()
	{
            $role=$this->session->userdata('role');
            $username=$this->session->userdata('username');
            $fname=$this->session->userdata('fname');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->view('login',$data);
	}
        public function signup()
	{
            $this->load->helper('url');
            $this->load->view('signup');
	}
	public function logout()
	{
            $this->load->helper('url');
		$this->session->sess_destroy();
                $fname=$this->session->userdata('fname');
		return redirect()->to('welcome'); 
                //require('welcome.php');
		//$welcome = new Welcome();
		//$welcome->index();
                
	}
	public function login_view()
	{
            $role=$this->session->userdata('role');
            $username=$this->session->userdata('username');
            $fname=$this->session->userdata('fname');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->view('login',$data);
	}
    public function Login()
    {
        $this->load->helper('url');
        if(isset($_POST['uname'])){
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
        }else{
            $uname =null;
            $pass =null;
        }
        
        $this->load->model('users');
        
        $this->load->model('bulletin_db');
        $checkuser=$this->users->login($uname,$pass);
        if(count($checkuser)>0){
            $access_branch = "";
            $user_branch=$this->users->user_branch($checkuser[0]['userid']);
            foreach($user_branch as $x){
                $access_branch =  $access_branch . "," . $x['branch'];
                
                }
                
            foreach ($checkuser as $row)
            {
                $this->session->set_userdata('role',$row['role']);
                $this->session->set_userdata('username',$row['username']);
                $this->session->set_userdata('userid',$row['userid']);
                $this->session->set_userdata('branch',$access_branch);
                $this->session->set_userdata('access','po-' . $row['purchase_order'] . 'gr-' . $row['good_receipt'] . 'mm-' . $row['material_master'] . 'vm-' . $row['vendor_management'] . 'rm-' . $row['return_mgmt'] . 'fl-' . $row['front_line'] . 'so-' . $row['sales']);
                $data = array('role' => $row['role'],
                    'username' => $row['username'],
                    'fname' => $row['fname']);
                $data['bulletin']=$this->bulletin_db->view_latest_msg();
                
                $this->load->view('home',$data);
            }
        }else{          
            $data = array('msg' => 'Invalid Username or Password!');
            $this->load->view('login',$data);
        }
    }
    public function profile()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $data['profile']=$this->users->profile($userid);
        $data['user_branch']=$this->users->user_branch($userid);
        // $data['branch']=$this->users->branch();
        $this->load->view('profile',$data);
    }
    public function view_profile()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $userid=$_GET['userid'];
        $data['profile']=$this->users->profile($userid);
        $data['user_branch']=$this->users->user_branch($userid);
       
        
        $this->load->view('view_profile',$data);
    }
    public function all_users()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $data['users']=$this->users->view_users($userid);
        $data['branch']=$this->users->branch();
        $data['roles']=$this->users->roles($userid);
        
        $this->load->view('users',$data);
    }
    public function disable()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        
        $this->users->disable($_GET['userid']);
        $data['users']=$this->users->view_users($userid);
        $data['branch']=$this->users->branch();
        $data['roles']=$this->users->roles($userid);
        
        $this->load->view('users',$data);
    }
    public function activate()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        
        $this->users->activate($_GET['userid']);
        $data['users']=$this->users->view_users($userid);
        $data['branch']=$this->users->branch();
        $data['roles']=$this->users->roles($userid);
        
        $this->load->view('users',$data);
    }
    public function save()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$vdate = $_POST['val'];
	$role = $_POST['role'];
        $eadd = $_POST['eadd'];
        $contact = $_POST['contact'];
        
       
        
        if (isset($_POST['po'])) {
            $po="Y";
        } else {
            $po="N";
        }
        if (isset($_POST['gr'])) {
            $gr="Y";
        } else {
            $gr="N";
        }
        if (isset($_POST['mm'])) {
            $mm="Y";
        } else {
            $mm="N";
        }
        if (isset($_POST['vm'])) {
            $vm="Y";
        } else {
            $vm="N";
        }
        if (isset($_POST['rm'])) {
            $rm="Y";
        } else {
            $rm="N";
        }
        if (isset($_POST['fl'])) {
            $fl="Y";
        } else {
            $fl="N";
        }
        if (isset($_POST['so'])) {
            $so="Y";
        } else {
            $so="N";
        }
        $check_uname=$this->users->check_user($uname);
        foreach($check_uname as $x){
            $users=$x['ct'];
        }
        $check_eadd=$this->users->check_eadd($eadd);
        foreach($check_eadd as $x){
            $ct_eadd=$x['ct'];
        }
        if($users > 0 || $ct_eadd > 0){
            if($ct_eadd > 0 && $users>0){
                $data['msg']="Username and Email address already taken.";
            }else if($ct_eadd > 0){
                $data['msg']="Email already taken.";
            }else if($users > 0){
                $data['msg']="Username already taken.";
            }
        }else{
        $newuser_id=$this->users->save_user($fname,$lname,$uname,$contact,$pass,$vdate,$role,$po,$gr,$mm,$vm,$rm,$fl,$so,$eadd);
        
        
        $branch=$this->users->branch();
        foreach($branch as $row){
            if (isset($_POST[$row['branch_id']])){
                if($_POST[$row['branch_id']]=="Y");
                $this->users->save_branch($newuser_id,$row['branch_id'],$row['branch']);
            }
        }
        

        }
        $userid=$this->session->userdata('userid');
        $data['users']=$this->users->view_users($userid);
        $data['branch']=$this->users->branch($userid);
        $data['roles']=$this->users->roles($userid);
        $this->load->view('users',$data);
    }
    
    public function save_user()
    {
        $this->load->model('users');
        $this->load->helper('url');
        $this->load->library('session');
        $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
        $eadd = $_POST['eadd'];
        $check_uname=$this->users->check_user($uname);
        foreach($check_uname as $x){
            $users=$x['ct'];
        }
        $check_eadd=$this->users->check_eadd($eadd);
        foreach($check_eadd as $x){
            $ct_eadd=$x['ct'];
        }
        if($users > 0 || $ct_eadd > 0){
            if($ct_eadd > 0 && $users>0){
                $data['msg']="Username and Email address already taken.";
            }else if($ct_eadd > 0){
                $data['msg']="Email already taken.";
            }else if($users > 0){
                $data['msg']="Username already taken.";
            }
             $this->load->view('signup',$data);
        }else{
        $newuser_id=$this->users->save_user2($fname,$lname,$uname,$pass,$eadd);
        
        
        $data['profile']=$this->users->profile($newuser_id);
       foreach($data['profile'] as $row){
        $this->session->set_userdata('role',$row['role']);
                        $this->session->set_userdata('userid',$row['userid']);
			$this->session->set_userdata('username',$row['username']);
			$this->session->set_userdata('eadd',$row['eadd']);
        }
         $this->load->view('profile',$data);
       }
       
    }
	public function SaveAccount()
	{
		$this->load->helper('url');
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$fname = $_POST['fname'];
		$contact = $_POST['contact'];
		$addr = $_POST['addr'];
		$email = $_POST['email'];
		
		$this->load->model('registers');
		
        //$this->register->save_user();
		//$this->db->save_user();
		
		//check existing user
		$checkuser=$this->registers->check_user(strtolower($uname));
		foreach ($checkuser as $row)
		{
        if($row['ct'] > 0){
                        $data=array('msg'=>'User already exist');
			$this->load->view('signup',$data);
		}else{
			$register=$this->registers->save_user($uname,$pass,$fname,$contact,$addr,$email,'User');
			$get_userID=$this->registers->login($uname,$pass);
                        foreach($get_userID as $row){
                            $userid=$row['userid'];
                        }
                        

                        $data = array('role' =>'User',
		'username' => $uname,
		'fname' => $fname);
			return redirect()->to('welcome');
		}

		}
		//
		/*if(isset($checkuser)){
		$register=$this->registers->save_user($uname,$pass,$fname,$contact,$addr,$email,'User');
		require('welcome.php');
		$welcome = new Welcome();
		$welcome->index();
        }else{
			echo "user exist";
		}*/
			
		
		//if ($this->session->userdata('logged_in')){
            //Update the last active field in the user db
        //    $this->update_last_active($this->session->userdata('user_id'));
        //    return true;
        //} else {
			
		
		
		
		//$this->load->view('welcome.php');
		
	}
}