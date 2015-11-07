<?php

class TeachersController extends \BaseController {

	var $data = array();
	var $panelInit ;
	var $layout = 'dashboard';

	public function __construct(){
		$this->panelInit = new \DashboardInit();
		$this->data['panelInit'] = $this->panelInit;
		$this->data['breadcrumb']['Settings'] = \URL::to('/dashboard/languages');
		$this->data['users'] = \Auth::user();
		if($this->data['users']->role != "admin") exit;
	}

	public function index($method = "main")
	{
		$this->panelInit->viewop($this->layout,'languages',$this->data);
	}

	function waitingApproval(){
		return User::where('role','teacher')->where('activated','0')->orderBy('id','DESC')->get();
	}

	function approveOne($id){
		$user = User::find($id);
		$user->activated = 1;
		$user->save();

		return $this->panelInit->apiOutput(true,$this->panelInit->language['approveTeacher'],$this->panelInit->language['teacherApproved'],array("user"=>$user->id));
	}

	public function listAll($page = 1)
	{
		$toReturn = array();
		$toReturn['teachers'] = User::where('role','teacher')->where('activated','1')->orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->get()->toArray();
		$toReturn['transports'] =  transportation::get()->toArray();
		$toReturn['totalItems'] = User::where('role','teacher')->where('activated','1')->count();
		
		$toReturn['userRole'] = $this->data['users']->role;
		$newrole=$this->data['users']->newrole;
		$newrole_array=json_decode($newrole);
			/*$params= permissions::where('moduleId',1)->where('permission',1)->get();
			foreach ($params as $param) {
		$uniparam[]=$param->roleId;
}*/
	$uniparam=array(5,8,15);	
		if($toReturn['userRole'] == "teacher"){
		
		if(array_intersect($newrole_array, $uniparam)){
		$toReturn['access'] =1;
		}
		else{
		$toReturn['access'] =0;
		}
		}
		elseif($toReturn['userRole'] == "admin"){
			$toReturn['access'] =1;
		}
		else{
		$toReturn['access'] =0;
		}
		$toReturn['newuserRole'] = $this->data['users']->newrole;
		return $toReturn;
	}

	public function search($keyword,$page = 1){
		$toReturn = array();
		$toReturn['teachers'] = User::where('role','teacher')->where('activated','1')->where('fullName','like','%'.$keyword.'%')->orWhere('username','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->get()->toArray();
		$toReturn['totalItems'] = User::where('role','teacher')->where('activated','1')->where('fullName','like','%'.$keyword.'%')->orWhere('username','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->count();
		return $toReturn;
	}

	public function export(){
		if($this->data['users']->role != "admin") exit;
		$data = array(1 => array ( 'Full Name','User Name','E-mail','Gender','Address','Phone No','Mobile No','birthday','password','activated'));
		$student = User::where('role','teacher')->get();
		foreach ($student as $value) {
			$data[] = array ($value->fullName,$value->username,$value->email,$value->gender,$value->address,$value->phoneNo,$value->mobileNo,$value->birthday,"",$value->activated);
		}

		$xls = new Excel_XML('UTF-8', false, 'Teachers Sheet');
		$xls->addArray($data);
		$xls->generateXML('Teachers-Sheet');
		exit;
	}

	public function exportpdf(){
		if($this->data['users']->role != "admin") exit;
		$header = array ('Full Name','User Name','E-mail','Gender','Address','Phone No','Mobile No');
		$data = array();
		$student = User::where('role','teacher')->get();
		foreach ($student as $value) {
			$data[] = array ($value->fullName,$value->username ,$value->email,$value->gender,$value->address,$value->phoneNo,$value->mobileNo );
		}

		$pdf = new FPDF();
		$pdf->SetFont('Arial','',10);
		$pdf->AddPage();
		// Header
		foreach($header as $col)
			$pdf->Cell(40,7,$col,1);
		$pdf->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$pdf->Cell(40,6,$col,1);
			$pdf->Ln();
		}
		$pdf->Output();
		exit;
	}

	public function exportcsv(){
		if($this->data['users']->role != "admin") exit;

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data.csv');
		$output = fopen('php://output', 'w');

		$student = User::where('role','teacher')->get();
		foreach ($student as $value) {
			fputcsv($output, array($value->username,$value->email,$value->password,$value->fullName,$value->role,$value->activated,$value->birthday,$value->gender,$value->address,$value->phoneNo,$value->mobileNo) );
		}
		exit;
	}

	public function import($type){
		if($this->data['users']->role != "admin") exit;

		if (Input::hasFile('excelcsv')) {
			if($type == "excel"){
				if ( $_FILES['excelcsv']['tmp_name'] )
			  {
				  $doms = new DOMDocument();
				  $doms->load( $_FILES['excelcsv']['tmp_name'] );
				  $rows = $doms->getElementsByTagName( 'Row' );
				  $first_row = true;
				  foreach ($rows as $row)
				  {
					  if ( !$first_row )
					  {
						  $cells = $row->getElementsByTagName( 'Cell' );
						  $User = new User();
						  $count = 0;
						  foreach( $cells as $cell )
						  {

							  if($count == 0)$User->fullName = $cell->nodeValue;
							  if($count == 1)$User->username = $cell->nodeValue;
							  if($count == 2)$User->email = $cell->nodeValue;
							  if($count == 3)$User->gender = $cell->nodeValue;
							  if($count == 4)$User->address = $cell->nodeValue;
							  if($count == 5)$User->phoneNo = $cell->nodeValue;
							  if($count == 6)$User->mobileNo = $cell->nodeValue;
							  if($count == 7)$User->birthday = $cell->nodeValue;
							  if($count == 8 AND $cell->nodeValue != "")$User->password = Hash::make($cell->nodeValue);
							  if($count == 9)$User->activated = $cell->nodeValue;

								$count++;
						  }
						  $User->save();
					  }
					  $first_row = false;
				  }
			  }

			}elseif($type == "csv"){
				if (($handle = fopen($_FILES['excelcsv']['tmp_name'], "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        $num = count($data);
				        if($num != 11 || $data['4'] != "teacher"){
				        	return json_encode(array("jsTitle"=>$this->panelInit->language['Import'],"jsStatus"=>"0","jsMessage"=>$this->panelInit->language['csvTeacherInvalid'] ));
									exit;
				        }

								$User = new User();
								$User->email = $data['1'];
								$User->username = $data['0'];
								$User->fullName = $data['3'];
								$User->password = $data['2'];
								$User->role = "teacher";
								$User->activated = $data['5'];
								$User->gender = $data['7'];
								$User->address = $data['8'];
								$User->phoneNo = $data['9'];
								$User->mobileNo = $data['10'];
								$User->birthday = $data['6'];
								$User->save();
				    }
				    fclose($handle);
				}
			}
			return json_encode(array("jsTitle"=>$this->panelInit->language['Import'],"jsStatus"=>"1","jsMessage"=>$this->panelInit->language['dataImported'] ));
		}else{
			return json_encode(array("jsTitle"=>$this->panelInit->language['Import'],"jsStatus"=>"0","jsMessage"=>$this->panelInit->language['specifyFileToImport'] ));
			exit;
		}
		exit;
	}

	public function delete($id){
		if ( $postDelete = User::where('role','teacher')->where('id', $id)->first() )
        {
            $postDelete->delete();
            return $this->panelInit->apiOutput(true,$this->panelInit->language['delTeacher'],$this->panelInit->language['teacherDel']);
        }else{
            return $this->panelInit->apiOutput(false,$this->panelInit->language['delTeacher'],$this->panelInit->language['teacherNotExist']);
        }
	}

	function leaderboard($id){
		if($this->data['users']->role != "admin") exit;

		$user = User::where('id',$id)->first();
		$user->isLeaderBoard = Input::get('isLeaderBoard');
		$user->save();

		return $this->panelInit->apiOutput(true,$this->panelInit->language['teacLeaderBoard'],$this->panelInit->language['teacIsLeader']);
	}

	function leaderboardRemove($id){
		if($this->data['users']->role != "admin") exit;
		if ( $postDelete = User::where('role','teacher')->where('id', $id)->where('isLeaderBoard','!=','')->first() )
        {
            User::where('role','teacher')->where('id', $id)->update(array('isLeaderBoard' => ''));
            return $this->panelInit->apiOutput(true,$this->panelInit->language['teacLeaderBoard'],$this->panelInit->language['teacLeaderDel']);
        }else{
            return $this->panelInit->apiOutput(false,$this->panelInit->language['teacLeaderBoard'],$this->panelInit->language['teachNotLeader']);
        }
	}

	public function create(){
		if(User::where('username',trim(Input::get('username')))->count() > 0){
			return $this->panelInit->apiOutput(false,$this->panelInit->language['addTeacher'],$this->panelInit->language['usernameUsed']);
		}
		if(User::where('email',Input::get('email'))->count() > 0){
			return $this->panelInit->apiOutput(false,$this->panelInit->language['addTeacher'],$this->panelInit->language['mailUsed']);
		}
		$User = new User();
		$User->username = Input::get('username');
		$User->email = Input::get('email');
		$User->fullName = Input::get('fullName');
		$User->password = Hash::make(Input::get('password'));
		$User->newrole = Input::get('eids');
		$User->role = "teacher";
		$User->gender = Input::get('gender');
		$User->address = Input::get('address');
		$User->phoneNo = Input::get('phoneNo');
		$User->mobileNo = Input::get('mobileNo');
		$User->transport = Input::get('transport');
		if(Input::get('birthday') != ""){
			$birthday = explode("/", Input::get('birthday'));
			$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
			$User->birthday = $birthday;
		}
		$User->save();

		if (Input::hasFile('photo')) {
			$fileInstance = Input::file('photo');
			$newFileName = "profile_".$User->id.".jpg";
			$file = $fileInstance->move('uploads/profile/',$newFileName);

			$User->photo = "profile_".$User->id.".jpg";
			$User->save();
		}

		return $this->panelInit->apiOutput(true,$this->panelInit->language['addTeacher'],$this->panelInit->language['teacherCreated'],$User->toArray());
	}

	function fetch($id){
		$data = User::where('role','teacher')->where('id',$id)->first()->toArray();
		$data['birthday'] = date('m/d/Y',$data['birthday']);
		return json_encode($data);
	}

	function edit($id){
		if(User::where('username',trim(Input::get('username')))->where('id','<>',$id)->count() > 0){
			return $this->panelInit->apiOutput(false,$this->panelInit->language['EditTeacher'],$this->panelInit->language['usernameUsed']);
		}
		if(User::where('email',Input::get('email'))->where('id','<>',$id)->count() > 0){
			return $this->panelInit->apiOutput(false,$this->panelInit->language['EditTeacher'],$this->panelInit->language['mailUsed']);
		}
		$User = User::find($id);
		$User->username = Input::get('username');
		$User->email = Input::get('email');
		$User->fullName = Input::get('fullName');
		if(Input::get('password') != ""){
			$User->password = Hash::make(Input::get('password'));
		}
			$User->newrole = Input::get('eids');
		$User->gender = Input::get('gender');
		$User->address = Input::get('address');
		$User->phoneNo = Input::get('phoneNo');
		$User->mobileNo = Input::get('mobileNo');
		$User->transport = Input::get('transport');
		if(Input::get('birthday') != ""){
			$birthday = explode("/", Input::get('birthday'));
			$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
			$User->birthday = $birthday;
		}
		if (Input::hasFile('photo')) {
			$fileInstance = Input::file('photo');
			$newFileName = "profile_".$User->id.".jpg";
			$file = $fileInstance->move('uploads/profile/',$newFileName);

			$User->photo = "profile_".$User->id.".jpg";
		}
		$User->save();

		return $this->panelInit->apiOutput(true,$this->panelInit->language['EditTeacher'],$this->panelInit->language['teacherUpdated'],$User->toArray());
	}

	function profile($id){
		$data = User::where('role','teacher')->where('id',$id)->first()->toArray();
		$data['birthday'] = date('m/d/Y',$data['birthday']);

		$return = array();
		$return['title'] = $data['fullName']." ".$this->panelInit->language['Profile'];

		$return['content'] = "<div class='text-center'>";

		$return['content'] .= "<img alt='".$data['fullName']."' class='user-image img-circle' style='width:70px; height:70px;' src='dashboard/profileImage/".$data['id']."'>";

		$return['content'] .= "</div>";

		$return['content'] .= "<h4>".$this->panelInit->language['teacherInfo']."</h4>";

		$return['content'] .= "<table class='table table-bordered'><tbody>
                          <tr>
                              <td>".$this->panelInit->language['FullName']."</td>
                              <td>".$data['fullName']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['username']."</td>
                              <td>".$data['username']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['email']."</td>
                              <td>".$data['email']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['Birthday']."</td>
                              <td>".$data['birthday']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['Gender']."</td>
                              <td>".$data['gender']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['Address']."</td>
                              <td>".$data['address']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['phoneNo']."</td>
                              <td>".$data['phoneNo']."</td>
                          </tr>
                          <tr>
                              <td>".$this->panelInit->language['mobileNo']."</td>
                              <td>".$data['mobileNo']."</td>
                          </tr>

                          </tbody></table>";

		return $return;
	}
}
