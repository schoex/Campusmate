<?php

class reportsController extends \BaseController {

	var $data = array();
	var $panelInit ;
	var $layout = 'dashboard';

	public function __construct(){
		$this->panelInit = new \DashboardInit();
		$this->data['panelInit'] = $this->panelInit;
		$this->data['breadcrumb']['Settings'] = \URL::to('/dashboard/languages');
		$this->data['users'] = \Auth::user();
	}

	public function index($method = "main")
	{
		$this->panelInit->viewop($this->layout,'languages',$this->data);
	}

	public function report(){
		if($this->data['users']->role != "admin") exit;
        if(Input::get('stats') == 'usersStats'){
            return $this->usersStats();
        }
        if(Input::get('stats') == 'stdAttendance'){
            return $this->stdAttendance(Input::get('data'));
        }
        if(Input::get('stats') == 'stfAttendance'){
            return $this->stfAttendance(Input::get('data'));
        }
		if(Input::get('stats') == 'stdVacation'){
            return $this->stdVacation(Input::get('data'));
        }
		if(Input::get('stats') == 'stfVacation'){
            return $this->stfVacation(Input::get('data'));
        }
		if(Input::get('stats') == 'payments'){
            return $this->reports(Input::get('data'));
        }

	}

    public function usersStats(){
        $toReturn = array();
        $toReturn['admins'] = array();
        $toReturn['admins']['activated'] = User::where('role','admin')->where('activated','1')->count();
        $toReturn['admins']['inactivated'] = User::where('role','admin')->where('activated','0')->count();
        $toReturn['admins']['total'] = $toReturn['admins']['activated'] + $toReturn['admins']['inactivated'];

        $toReturn['teachers'] = array();
        $toReturn['teachers']['activated'] = User::where('role','teacher')->where('activated','1')->count();
        $toReturn['teachers']['inactivated'] = User::where('role','teacher')->where('activated','0')->count();
        $toReturn['teachers']['total'] = $toReturn['teachers']['activated'] + $toReturn['teachers']['inactivated'];

        $toReturn['students'] = array();
        $toReturn['students']['activated'] = User::where('role','student')->where('activated','1')->count();
        $toReturn['students']['inactivated'] = User::where('role','student')->where('activated','0')->count();
        $toReturn['students']['total'] = $toReturn['students']['activated'] + $toReturn['students']['inactivated'];

        $toReturn['parents'] = array();
        $toReturn['parents']['activated'] = User::where('role','parent')->where('activated','1')->count();
        $toReturn['parents']['inactivated'] = User::where('role','parent')->where('activated','0')->count();
        $toReturn['parents']['total'] = $toReturn['parents']['activated'] + $toReturn['parents']['inactivated'];

        return $toReturn;
    }

    public function preAttendaceStats(){
        $toReturn = array();
		$classes = classes::where('classAcademicYear',$this->panelInit->selectAcYear)->get();
		$toReturn['classes'] = array();
		$subjList = array();
		foreach ($classes as $class) {
			$class['classSubjects'] = json_decode($class['classSubjects'],true);
			if(is_array($class['classSubjects'])){
				foreach ($class['classSubjects'] as $subject) {
					$subjList[] = $subject;
				}
			}
			$toReturn['classes'][$class->id] = $class->className ;
		}

		$subjList = array_unique($subjList);
		if($this->data['panelInit']->settingsArray['attendanceModel'] == "subject"){
			$toReturn['subjects'] = array();
			if(count($subjList) > 0){
				$subjects = subject::whereIN('id',$subjList)->get();
				foreach ($subjects as $subject) {
					$toReturn['subjects'][$subject->id] = $subject->subjectTitle ;
				}
			}
		}

		$toReturn['role'] = $this->data['users']->role;
		$toReturn['attendanceModel'] = $this->data['panelInit']->settingsArray['attendanceModel'];

        return $toReturn;
    }

    public function stdAttendance($data){
        $sql = "select * from attendance where ";
		$sqlArray = array();
		$toReturn = array();

		$students = array();
		$studentArray = User::where('role','student')->get();
		foreach ($studentArray as $stOne) {
			$students[$stOne->id] = array('name'=>$stOne->fullName,'studentRollId'=>$stOne->studentRollId,'attendance'=>'');
		}

		$subjectsArray = subject::get();
		$subjects = array();
		foreach ($subjectsArray as $subject) {
			$subjects[$subject->id] = $subject->subjectTitle ;
		}

		if($data['classId'] AND $data['classId'] != "" ){
			$sqlArray[] = "classId='".$data['classId']."'";
		}
		if($data['subjectId'] AND $data['subjectId'] != ""){
			$sqlArray[] = "subjectId='".$data['subjectId']."'";
		}
		if($data['status'] AND $data['status'] != "All"){
			$sqlArray[] = "status='".$data['status']."'";
		}

		if($data['attendanceDay'] AND $data['attendanceDay'] != ""){
			$sqlArray[] = "date='".$data['attendanceDay']."'";
		}

		$sql = $sql . implode(" AND ", $sqlArray);
		$attendanceArray = DB::select( DB::raw($sql) );

		foreach ($attendanceArray as $stAttendance) {
			$toReturn[$stAttendance->id] = $stAttendance;
			if(isset($students[$stAttendance->studentId])){
				$toReturn[$stAttendance->id]->studentName = $students[$stAttendance->studentId]['name'];
				if($stAttendance->subjectId != ""){
					$toReturn[$stAttendance->id]->studentSubject = $subjects[$stAttendance->subjectId];
				}
				$toReturn[$stAttendance->id]->studentRollId = $students[$stAttendance->studentId]['studentRollId'];
			}
		}

		return $toReturn;
    }

    public function stfAttendance($data){
        $sql = "select * from attendance where ";
		$sqlArray = array();
		$toReturn = array();

		$teachers = array();
		$studentArray = User::where('role','teacher')->get();
		foreach ($studentArray as $stOne) {
			$teachers[$stOne->id] = array('name'=>$stOne->fullName,'attendance'=>'');
		}

		if($data['status'] AND $data['status'] != "All"){
			$sqlArray[] = "status='".$data['status']."'";
		}

		if($data['attendanceDay'] AND $data['attendanceDay'] != ""){
			$sqlArray[] = "date='".$data['attendanceDay']."'";
		}

        $sqlArray[] = "classId = '0'";

		$sql = $sql . implode(" AND ", $sqlArray);
		$attendanceArray = DB::select( DB::raw($sql) );

		foreach ($attendanceArray as $stAttendance) {
			$toReturn[$stAttendance->id] = $stAttendance;
			if(isset($teachers[$stAttendance->studentId])){
				$toReturn[$stAttendance->id]->studentName = $teachers[$stAttendance->studentId]['name'];
			}
		}

		return $toReturn;
    }

	public function stdVacation($data){
		$datesList = $this->GetDays($data['fromDate'],$data['toDate']);

		if(count($datesList) > 0){
			$vacationList = \DB::table('vacation')
						->leftJoin('users', 'users.id', '=', 'vacation.userid')
						->select('vacation.id as id',
						'vacation.userid as userid',
						'vacation.vacDate as vacDate',
						'vacation.acceptedVacation as acceptedVacation',
						'users.fullName as fullName')
						->where('vacation.acYear',$this->panelInit->selectAcYear)
						->where('vacation.role','student')
						->whereIn('vacation.vacDate',$datesList['days'])
						->get();

			return $vacationList;
		}

		return array();
	}

	public function stfVacation($data){
		$datesList = $this->GetDays($data['fromDate'],$data['toDate']);

		if(count($datesList) > 0){
			$vacationList = \DB::table('vacation')
						->leftJoin('users', 'users.id', '=', 'vacation.userid')
						->select('vacation.id as id',
						'vacation.userid as userid',
						'vacation.vacDate as vacDate',
						'vacation.acceptedVacation as acceptedVacation',
						'users.fullName as fullName')
						->where('vacation.acYear',$this->panelInit->selectAcYear)
						->where('vacation.role','teacher')
						->whereIn('vacation.vacDate',$datesList['days'])
						->get();

			return $vacationList;
		}

		return array();
	}

	public function reports($data){
		$datesList = $this->GetDays($data['fromDate'],$data['toDate'],1);

		$payments = \DB::table('payments')
					->leftJoin('users', 'users.id', '=', 'payments.paymentStudent')
					->select('payments.id as id',
					'payments.paymentTitle as paymentTitle',
					'payments.paymentDescription as paymentDescription',
					'payments.paymentAmount as paymentAmount',
					'payments.paymentStatus as paymentStatus',
					'payments.paymentDate as paymentDate',
					'payments.paymentStudent as studentId',
					'users.fullName as fullName');

		if($data['status'] != "All"){
			$payments = $payments->where('paymentStatus',$data['status']);
		}
		$payments = $payments->whereIn('paymentDate',$datesList['days'])->orderBy('id','DESC')->get();

		return $payments;
	}

	function GetDays($sStartDate, $sEndDate,$include=0){
      $returnDates = array();
      $vacations = array();

      $aDays[] = $sStartDate;

      $StartDateArray = strptime($sStartDate, '%m/%d/%Y');
      $EndDateArray = strptime($sEndDate, '%m/%d/%Y');

      $sStartDate = gmdate("Y-m-d", mktime(0, 0, 0, $StartDateArray['tm_mon']+1, $StartDateArray['tm_mday'], $StartDateArray['tm_year']+1900));
      $sEndDate = gmdate("Y-m-d", mktime(0, 0, 0, $EndDateArray['tm_mon']+1, $EndDateArray['tm_mday'], $EndDateArray['tm_year']+1900));

      // Start the variable off with the start date

      // Set a 'temp' variable, sCurrentDate, with
      // the start date - before beginning the loop
      $sCurrentDate = $sStartDate;

	  if($include == 0){
	      $daysWeekOff = json_decode($this->panelInit->settingsArray['daysWeekOff'],true);
	      $officialVacationDay = json_decode($this->panelInit->settingsArray['officialVacationDay'],true);
	  }
      // While the current date is less than the end date
      while($sCurrentDate < $sEndDate){
        // Add a day to the current date
        $nextDay = strtotime("+1 day", strtotime($sCurrentDate));

		if($include == 0){
	        if(in_array(date('N',$nextDay),$daysWeekOff)){
	            $sCurrentDate = gmdate("Y-m-d",$nextDay );
	            continue;
	        }
		}

        $saveDate = gmdate("m/d/Y", strtotime("+1 day",strtotime($sCurrentDate) ));

		if($include == 0){
	        if(in_array($saveDate,$officialVacationDay)){
	            $sCurrentDate = gmdate("Y-m-d",$nextDay );
	            $vacations[] = gmdate("m/d/Y", strtotime("+1 day",strtotime($sCurrentDate) ));
	            continue;
	        }
		}

        $sCurrentDate = gmdate("Y-m-d",$nextDay );

        $aDays[] = $saveDate;
      }

      // Once the loop has finished, return the
      // array of days.
      $returnDates['days'] = $aDays;
      $returnDates['vacations'] = $vacations;
      return $returnDates;
    }

}
