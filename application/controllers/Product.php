<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
public function view(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $data['products']=$this->products->view_products('All');

    $this->load->view('all_products',$data);
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
public function view_builds(){
    $this->load->helper('url');
    $build_no=$_GET['build_no'];
    $this->load->model('products');
    
    $this->load->library('session');
    $userid =$this->session->userdata('userid');
    $username =$this->session->userdata('username');
    $data = array('username'=>$username);
            $data['builds']=$this->products->view_solo($build_no);
            $data['comments']=$this->products->view_completed_com_solo($build_no);
             if ($userid != ""){
                $data['view_liked_disliked']=$this->products->view_liked_disliked($userid);
             }else{
                 $data['view_liked_disliked']=$this->products->view_liked_disliked(00);
             }
             $data['userid']= $userid;

    $this->load->view('view_builds',$data);
}
public function delete_builds(){
    $this->load->helper('url');
    $this->load->library('session');
    $userid =$this->session->userdata('userid');
    $build_no=$_GET['build_no'];
    $this->load->model('products');
    $data = array('username'=>null);
    $this->products->delete_builds($build_no,$userid);
$data['builds']=$this->products->my_builds($userid);
    $this->load->view('profile',$data);
}

public function view_prod(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    $prod=$_GET['prod'];
    $data['products']=$this->products->view_products($prod);
    $data['prod']= $prod;
    $this->load->view('prod',$data);
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
        'core_img'=>$_POST['core_img'],
        'motherboards'=>$_POST['motherboards'],
        'motherboards_price'=>$_POST['motherboards_price'],
        'motherboards_img'=>$_POST['motherboards_img'],
        'memory'=>$_POST['memory'],
        'memory_price'=>$_POST['memory_price'],
        'memory_img'=>$_POST['memory_img'],
        'storage'=>$_POST['storage'],
        'storage_price'=>$_POST['storage_price'],
        'storage_img'=>$_POST['storage_img'],
        'videocard'=>$_POST['videocard'],
        'videocard_price'=>$_POST['videocard_price'],
        'videocard_img'=>$_POST['videocard_img'],
     
        'monitor'=>$_POST['monitor'],
        'monitor_price'=>$_POST['monitor_price'],
        'monitor_img'=>$_POST['monitor_img']
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
    $userid =$this->session->userdata('userid');
    $username =$this->session->userdata('username');
    $role=$this->session->userdata('role');
    $prod=$_POST['prod'];
    $title=$_POST['title'];
    $cores=$_POST['cores'];
    $core_price=$_POST['core_price'];
    $core_img=$_POST['core_img'];
    $motherboards=$_POST['motherboards'];
    $motherboards_price=$_POST['motherboards_price'];
    $motherboards_img=$_POST['motherboards_img'];
    $memory=$_POST['memory'];
    $memory_price=$_POST['memory_price'];
    $memory_img=$_POST['memory_img'];
    $storage=$_POST['storage'];
    $storage_price=$_POST['storage_price'];
    $storage_img=$_POST['storage_img'];
    $videocard=$_POST['videocard'];
    $videocard_price=$_POST['videocard_price'];
    $videocard_img=$_POST['videocard_img'];
    $monitor=$_POST['monitor'];
    $monitor_price=$_POST['monitor_price'];
    $monitor_img=$_POST['monitor_img'];
$save_products=$this->products->save_builds($username,$userid,$role,$prod,$title,$cores,$core_price,$core_img,$motherboards,$motherboards_price,$motherboards_img,$memory,$memory_price,$memory_img,$storage,$storage_price,$storage_img,$videocard,$videocard_price,$videocard_img,$monitor,$monitor_price,$monitor_img);
$data['builds']=$this->products->my_builds($userid);
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
        'core_img'=>$_POST['core_img'],
        'motherboards'=>$_POST['motherboards'],
        'motherboards_price'=>$_POST['motherboards_price'],
        'motherboards_img'=>$_POST['motherboards_img'],
        'memory'=>$_POST['memory'],
        'memory_price'=>$_POST['memory_price'],
        'memory_img'=>$_POST['memory_img'],
        'storage'=>$_POST['storage'],
        'storage_price'=>$_POST['storage_price'],
        'storage_img'=>$_POST['storage_img'],
        'videocard'=>$_POST['videocard'],
        'videocard_price'=>$_POST['videocard_price'],
        'videocard_img'=>$_POST['videocard_img'],
        'monitor'=>$_POST['monitor'],
        'monitor_price'=>$_POST['monitor_price'],
        'monitor_img'=>$_POST['monitor_img'],
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
public function sync(){
   $this->load->helper('url');
            $this->load->model('products');
		$role=$this->session->userdata('role');
		$username=$this->session->userdata('username');
		$fname=$this->session->userdata('fname');
		$data = array('role' => $role,
		'username' => $username,
		'fname' => $fname);
		$this->load->view('sync',$data);
}
public function sync_to_opl(){
    $this->load->helper('url');
    $this->load->library('excel');
    $this->load->model('dumps');
    $this->dumps->del_opl();
    require_once 'api/google-api-php-client-2.2.3/vendor/autoload.php';
    
    $client = new \Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccesstype('offline');
$client->setAuthConfig('api/credentials.json');
$service = new Google_Service_Sheets($client);
//$spreadsheetId = "1zEy83qGWyhbyLadIR1MG3UuylQV5GkbbgUZ4_TCGAiA";

$spreadsheetId = "10bTlhxgBCCsFCD3wvGMvHzDqKOOFqR-iFpiJFtTHirA";

$range = "PLs!A8:R";
$response = $service->spreadsheets_values->get($spreadsheetId,$range);
$values = $response->getValues();
if (empty($values)){
    echo "no data";
}else{
    $mask="%10s %-10s\n";
    foreach ($values as $row){
        $a= $row[0];
        $b= $row[1];
        $c= $row[2];
        $d= $row[3];
        $e= $row[4];
        $f= $row[5];
        $g= $row[6];
        $h= $row[7];
        $i= $row[8];
        $j= $row[9];
        $k= $row[10];
        $l= $row[11];
        $m= $row[12];
        $n= $row[13];
        $o= $row[14];
        $p= $row[15];
        $q= $row[15];
        $r= $row[15];
        if(trim($a)==""){$a =0;}
        if(trim($e)==""){$e =0;}
        if(trim($g)==""){$g =0;}
        if(trim($h)==""){$h =0;}
        if(trim($i)==""){$i =0;}
        if(trim($m)==""){$m =0;}
        if(trim($n)==""){$n =0;}
        if(trim($o)==""){$o =0;}
        
        $f = str_replace("'","",$f);
        
        if(trim($p)=="http://pchubimages.online/noimg.jpg"){$p ="https://mypchub.000webhostapp.com/uploads/prod/no_img.png";}
        
        
        //                 if(trim($b)==""){$b =0;}
        //                 if(trim($f)==""){$f =0;}
        //                 if(trim($i)==""){$i =0;}
        //                 if(trim($j)==""){$j =0;}
        //                 if(trim($k)==""){$k =0;}
        //                 if(trim($o)==""){$o =0;}
        //                 if(trim($p)==""){$p =0;}
        //                 if(trim($q)==""){$q =0;}
         //                if(trim($r)=="http://pchubimages.online/noimg.jpg"){$r ="https://mypchub.000webhostapp.com/uploads/prod/no_img.png";}
                         
                         
                         $this->dumps->sync($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r);
		
        //echo sprintf($mask,$row[1],$row[0]);

    }
    
}
    $data = array('username'=>null,'result'=>'Successful');   
    $this->load->view('sync',$data);
}
public function featured_prods(){
    $this->load->helper('url');
    $this->load->library('session');
$this->load->model('products');
    $userid=$this->session->userdata('userid');
    $data['featured_prods']=$this->products->featured_prod_settings();
    $data['userid']=$userid;
    $this->load->view('featured',$data);
}
public function featured_save(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('products');
    $userid=$this->session->userdata('userid');
    if(isset($_POST['type'])<>""){
    $this->products->featured_prod_save($_POST['type'],$_POST['url']);
    }
    $data['featured_prods']=$this->products->featured_prod_settings();
    $data['userid']=$userid;
    $this->load->view('featured',$data);
}

public function delete_feature(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('products');
    $userid=$this->session->userdata('userid');
    if(isset($_GET['featured_no'])<>""){
    $this->products->featured_prod_del($_GET['featured_no']);
    }
    $data['featured_prods']=$this->products->featured_prod_settings();
    $data['userid']=$userid;
    $this->load->view('featured',$data);
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */