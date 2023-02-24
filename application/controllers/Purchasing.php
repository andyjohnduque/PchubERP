<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchasing extends CI_Controller {

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
 
 
 public function view_pending(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
    $this->load->model('warehouse');
    $s=$_GET['S'];
    if(isset($_GET['S'])==true){
        
    }else{
        $s="";
    }
    $data['s']=$s;
    $data['quotation_request']=$this->warehouse->quotation_request($s);
    //$data['quotation_items']=$this->warehouse->quotation_items();

    $this->load->view('quotation_view_all',$data);
}

public function quotation(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $this->load->model('users');
         $this->warehouse->del_user_itm($userid);
    $data['quotation_request']=$this->warehouse->user_quotation($userid);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,'');
    $data['user_status']=$this->users->check_user_status($userid);
    $data['cred_limit']=$this->warehouse->view_cred_limit($userid);
    $this->load->view('quotation',$data);
}
public function new_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $notes=$_POST['notes'];
    $ri=$_POST['ri'];
    $mydate=$_POST['mydate'];
    $data['ri']=$ri;
    $data['notes']=$notes;
    $data['mydate']=$mydate;
    $userid=$this->session->userdata('userid');
    $data['inventory']=$this->warehouse->view_warehouse($userid);
    $data['cred_limit']=$this->warehouse->view_cred_limit($userid);
    
    
    $this->load->view('quotation_entry',$data);
}
public function add_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $ri=$_POST['ri'];
    $notes=$_POST['notes'];
    $data['ri']=$ri;
    $data['notes']=$notes;
    $mydate=$_POST['mydate'];
    $data['mydate']=$mydate;
    
    $inventory=$this->warehouse->view_warehouse($userid);
     $data['cred_limit']=$this->warehouse->view_cred_limit($userid);

  
    foreach($inventory as $row){
        if(isset($_POST['chk_'.$row['sku']])){
            $this->warehouse->add_remove_warehouse($row['sku'],$_POST[$row['sku']],$userid,$ri);
        }
    }
    
    $data['quotation_request']=$this->warehouse->user_quotation($userid);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$ri);
    $this->load->view('quotation',$data);
}

public function approved(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $s=$_POST['S'];
    if(isset($_POST['S'])==true){
        
    }else{
        $s="";
    }
    $data['s']=$s;
    $this->load->model('warehouse');
    $quotation_request=$this->warehouse->quotation_request('Pending');
    $po=$_POST['po'];
    foreach($quotation_request as $row){
         
        if(isset($_POST['chk_'.$row['quotation_id']])){
            $this->warehouse->approved($row['quotation_id'],$userid,$username,$po);

        }
    }

    $data['quotation_request']=$this->warehouse->quotation_request('Pending');
        $data['quotation_items']=$this->warehouse->quotation_items();
    $this->load->view('quotation_view_all',$data);
}
public function approving(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $quotation_id=$_POST['ri'];
    $po=$_POST['po'];
    $this->warehouse->approved($_POST['ri'],$userid,$username,$po);
     $data['quotation_hist']=$this->warehouse->quotation_hist($quotation_id);
    if($role=="Vendor"){
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$quotation_id);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$quotation_id);
    }else{
        $data['quotation_request']=$this->warehouse->access_quotation_request($quotation_id);
        $data['quotation_items']=$this->warehouse->access_quotation_items($quotation_id);
    }
    $this->load->view('quotation_view',$data);
}
public function disapproving(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $quotation_id=$_POST['ri'];
     $comments=$_POST['comments'];
    $data['quotation_hist']=$this->warehouse->quotation_hist($quotation_id);
    $this->warehouse->disapproved($_POST['ri'],$userid,$username,$comments);
    if($role=="Vendor"){
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$quotation_id);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$quotation_id);
    }else{
        $data['quotation_request']=$this->warehouse->access_quotation_request($quotation_id);
        $data['quotation_items']=$this->warehouse->access_quotation_items($quotation_id);
    }
    $this->load->view('quotation_view',$data);
}
public function submit_request(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');

    $this->load->model('warehouse');
    $inventory=$this->warehouse->view_warehouse($userid);
    $ri=$_POST['ri'];
    $data['ri']=$ri;
    $mydate=$_POST['mydate'];
    $data['mydate']=$mydate;
    $notes=$_POST['notes'];
   
    $data['notes']=$notes;
    
    $this->warehouse->save_quotaion($ri,$userid,$username,$mydate,$notes);
    $this->warehouse->submit_user_item($userid,$_POST['ri']);
    $data['quotation_hist']=$this->warehouse->quotation_hist($ri);
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$_POST['ri']);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$_POST['ri']);
    
    $this->load->view('quotation_view',$data);
}

public function user_quotations(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $s=$_GET['S'];
    if(isset($_GET['S'])==true){
        
    }else{
        $s="";
    }
    $data['s']=$s;
    
    $this->warehouse->user_quotations($userid);
    $data['quotation_items']=$this->warehouse->quotation_items();
    $data['quotation_request']=$this->warehouse->user_quotations($userid);

    $this->load->view('quotation_view_all',$data);
}
public function quotation_view( ){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $quotation_id=$_GET['quotation_id'];
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $this->load->model('payments');
    $data['quotation_hist']=$this->warehouse->quotation_hist($quotation_id);
    if($role=="Vendor"){
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$quotation_id);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$quotation_id);
    }else{
        $data['quotation_request']=$this->warehouse->access_quotation_request($quotation_id);
        $data['quotation_items']=$this->warehouse->access_quotation_items($quotation_id);
    }
    $data['payments']=$this->payments->view_payments($quotation_id);
    $this->load->view('quotation_view',$data);
}

public function update_status(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $userid=$this->session->userdata('userid');
    $ri=$_POST['ri'];
    $comments=$_POST['comments'];
    $status=$_POST['status'];
    $nfd=$_POST['nfd'];
    //$pay_status=$_POST['pay_status'];
    //$pay_amt=$_POST['pay_amt'];
    $this->load->model('warehouse');
    $this->warehouse->update_status($ri,$userid,$username,$status,$comments,$nfd);
    $data['quotation_hist']=$this->warehouse->quotation_hist($ri);
    if($role=="Vendor"){
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$ri);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$ri);
    }else{
        $data['quotation_request']=$this->warehouse->access_quotation_request($ri);
        $data['quotation_items']=$this->warehouse->access_quotation_items($ri);
    }

    $this->load->view('quotation_view',$data);
}

 public function am(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $data['branch']=$this->warehouse->branch_view();
    $data['inventory']=$this->warehouse->view_am();
    $this->load->view('am',$data);
}







public function save(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');

    $this->load->model('warehouse');
    $inventory=$this->warehouse->view_warehouse();
    $ri=$_POST['ri'];
    $data['ri']=$ri;
    $this->warehouse->save_user_item($userid,$_POST['ri']);
    $data['user_item']=$this->warehouse->user_item($userid);
    $this->load->view('quotation_request',$data);
}


public function price_list(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    
    $this->load->view('price_list',$data);
}

public function sale(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    
    $this->load->view('sale',$data);
}
public function view_prod(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $prod=$_GET['prod'];
    $data['products']=$this->products->view_products($prod);
    $data['prod']= $prod;
    if($prod=='cores'){
        $this->load->view('prod_cores',$data);
    }elseif($prod=='cpu_coolers'){
        $this->load->view('prod_cpu_coolers',$data);
    }elseif($prod=='motherboards'){
        $this->load->view('prod_motherboards',$data);
    }
}
public function prod_menu(){
    $this->load->helper('url');
    //$this->load->model('products');
    $data = array('username'=>null);
    //$data['products']=$this->products->view_products('All');

    $this->load->view('prod_menu',$data);
}
public function prod(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $prod=$_GET['Selection'];
    $data['products']=$this->products->view_products($prod);
    if($prod == "All"){
        $this->load->view('all_products',$data);
    }else{
        $this->load->view($prod,$data);
    }
}

public function builds(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $data['builds']=$this->products->view_builds('builds');
    if(isset($_POST['prod'])){
    $data = array('prod'=>$_POST['prod'],
        'title'=>$_POST['title'],
        'cores'=>$_POST['cores'],
        'core_price'=>$_POST['core_price'],
        'cpu_coolers'=>$_POST['cpu_coolers'],
        'cpu_cooler_price'=>$_POST['cpu_cooler_price'],
        'motherboards'=>$_POST['motherboards'],
        'motherboards_price'=>$_POST['motherboards_price'],
        'memory'=>$_POST['memory'],
        'memory_price'=>$_POST['memory_price'],
        'storage'=>$_POST['storage'],
        'storage_price'=>$_POST['storage_price'],
        'videocard'=>$_POST['videocard'],
        'videocard_price'=>$_POST['videocard_price'],
        'casing'=>$_POST['casing'],
        'case_price'=>$_POST['case_price'],
        'powersupply'=>$_POST['powersupply'],
        'powersupply_price'=>$_POST['powersupply_price'],
        'opticaldrive'=>$_POST['opticaldrive'],
        'opticaldrive_price'=>$_POST['opticaldrive_price'],
        'os'=>$_POST['os'],
        'os_price'=>$_POST['os_price'],
        'software'=>$_POST['software'],
        'software_price'=>$_POST['software_price'],
        'monitor'=>$_POST['monitor'],
        'monitor_price'=>$_POST['monitor_price'],
        'external'=>$_POST['external'],
        'external_price'=>$_POST['external_price']
        );
    }else{
        $data=null;
    }
    
//echo     $_POST['prod'];
$this->load->view('builds',$data);
}
public function builder_save(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $data['builds']=$this->products->view_builds('builds');
    if(isset($_POST['prod'])){
    
        
    }else{
        $data=null;
    }
    $this->load->library('session');
    $username =$this->session->userdata('username');
    $role=$this->session->userdata('role');
    echo $username . $role . "<<<<<<<<<<<<<<";
$save_products=$this->products->save_builds($username,$role,$_POST['prod'],$_POST['title'],$_POST['cores'],$_POST['core_price'],$_POST['cpu_coolers'],$_POST['cpu_cooler_price'],$_POST['motherboards'],$_POST['motherboards_price'],$_POST['memory'],$_POST['memory_price'],$_POST['storage'],$_POST['storage_price'],$_POST['videocard'],$_POST['videocard_price'],$_POST['casing'],$_POST['case_price'],$_POST['powersupply'],$_POST['powersupply_price'],$_POST['opticaldrive'],$_POST['opticaldrive_price'],$_POST['os'],$_POST['os_price'],$_POST['software'],$_POST['software_price'],$_POST['monitor'],$_POST['monitor_price'],$_POST['external'],$_POST['external_price']);
$data['builds']=$this->products->my_builds($username);
$this->load->view('profile',$data);
//$this->load->view('builds',$data);
}
public function builder(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null,
        'title'=>$_POST['title'],
        'cores'=>$_POST['cores'],
        'core_price'=>$_POST['core_price'],
        'cpu_coolers'=>$_POST['cpu_coolers'],
        'cpu_cooler_price'=>$_POST['cpu_cooler_price'],
        'motherboards'=>$_POST['motherboards'],
        'motherboards_price'=>$_POST['motherboards_price'],
        'memory'=>$_POST['memory'],
        'memory_price'=>$_POST['memory_price'],
        'storage'=>$_POST['storage'],
        'storage_price'=>$_POST['storage_price'],
        'videocard'=>$_POST['videocard'],
        'videocard_price'=>$_POST['videocard_price'],
        'casing'=>$_POST['casing'],
        'case_price'=>$_POST['case_price'],
        'powersupply'=>$_POST['powersupply'],
        'powersupply_price'=>$_POST['powersupply_price'],
        'opticaldrive'=>$_POST['opticaldrive'],
        'opticaldrive_price'=>$_POST['opticaldrive_price'],
        'os'=>$_POST['os'],
        'os_price'=>$_POST['os_price'],
        'software'=>$_POST['software'],
        'software_price'=>$_POST['software_price'],
        'monitor'=>$_POST['monitor'],
        'monitor_price'=>$_POST['monitor_price'],
        'external'=>$_POST['external'],
        'external_price'=>$_POST['external_price'],
        'prod'=>$_POST['prod']
        );
    $prod=$_POST['prod'];
    $data['products']=$this->products->view_products($prod);
    $this->load->view('build_selection',$data);
}
public function save_core(){
    $this->load->helper('url');
    
        $target_dir = "uploads/prod/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $target_dir;
echo $target_file;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    //} else {
    //    echo "File is not an image.";
    //    $uploadOk = 0;
    //}
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
    $name = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);

    $increment = ''; //start with no suffix

    while(file_exists($target_dir . $name . $increment . '.' . $extension)) {
        $increment++;
    }

    $target_file = $target_dir . $name . $increment . '.' . $extension;
    echo $target_file;
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    echo "[" . $_FILES['fileToUpload']['tmp_name'] . "]" ;
    echo "-->uploading" . $target_file . "<--" . $_FILES["fileToUpload"]["tmp_name"] . "--";
    //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    if(move_uploaded_file ($_FILES['fileToUpload'] ['tmp_name'],"/home/a10145296/public_html/uploads/prod/{$_FILES['fileToUpload'] ['name']}")){
    //if(move_uploaded_file ($_FILES['fileToUpload'] ['tmp_name'],$target_file)){
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $name = $_POST['name'];
    $c_count = $_POST['c_count'];
    $c_clock = $_POST['c_clock'];
    $b_clock = $_POST['b_clock'];
    $tdp = $_POST['tdp'];
    $igraphics = $_POST['igraphics'];
    $smt = $_POST['smt'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    
    $this->load->model('products');
    $save_products=$this->products->save_core($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price,$_FILES["fileToUpload"]["name"]);
    $data = array('username'=>null); 
    $data['products']=$this->products->view_products('cores');        
    $this->load->view('cores',$data);


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
}
public function save_casing(){
    $this->load->helper('url');
        $target_dir = "uploads/prod";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    //} else {
    //    echo "File is not an image.";
    //    $uploadOk = 0;
    //}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    
    $name = $_POST['name'];
    $c_count = $_POST['type'];
    $c_clock = $_POST['color'];
    $b_clock = $_POST['power_supply'];
    $tdp = $_POST['side_panel_window'];
    $igraphics = $_POST['external_525_bays'];
    $smt = $_POST['external_35_bays'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    
    $this->load->model('products');
    $save_products=$this->products->save_products($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price);
    $data = array('username'=>null); 
    $data['products']=$this->products->view_products('cores');        
    $this->load->view('cores',$data);


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
}
public function bulkupdate_cores(){
    $this->load->helper('url');
      //file upload
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    //} else {
    //    echo "File is not an image.";
    //    $uploadOk = 0;
    //}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	//$this->view();
  $this->load->library('excel');
        $reader= PHPExcel_IOFactory::createReader('Excel2007');
        $reader->setReadDataOnly(true);
        $path= "./uploads/" .  $_FILES["fileToUpload"]["name"];
        $excel=$reader->load($path);

        $sheet = $excel->getActiveSheet()->toArray(null,true,true,true);
        $arrayCount = count($sheet); 
        $this->load->model('products');
        for($i=2;$i<=$arrayCount;$i++)
        {                   
            
            $update_products=$this->products->update_products($sheet[$i]["A"],$sheet[$i]["B"],$sheet[$i]["C"],$sheet[$i]["D"],$sheet[$i]["E"],$sheet[$i]["F"]);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
////
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */