<?php

class GradeLevelsController extends \BaseController {

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


	public function listAll()
	{
		$toReturn = array();
		$toReturn['grades'] = gradeLevels::get()->toArray();
		$toReturn['userRole'] = $this->data['users']->role;
		
		$toReturn['newuserRole'] = $this->data['users']->newrole;
		
		$toReturn['userRole'] = $this->data['users']->role;
		$newrole=$this->data['users']->newrole;
		$newrole_array=json_decode($newrole);
			$params= permissions::where('moduleId',3)->where('permission',1)->get();
			foreach ($params as $param) {
    $uniparam[]=$param->roleId;
}
		
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
		return $toReturn;
		
	}

	public function delete($id){
		if ( $postDelete = gradeLevels::where('id', $id)->first() )
        {
            $postDelete->delete();
            return $this->panelInit->apiOutput(true,$this->panelInit->language['delGradeLevel'],$this->panelInit->language['gradeDeleted']);
        }else{
            return $this->panelInit->apiOutput(false,$this->panelInit->language['delGradeLevel'],$this->panelInit->language['gradeNotExist']);
        }
	}

	public function create(){
		$gradeLevels = new gradeLevels();
		$gradeLevels->gradeName = Input::get('gradeName');
		$gradeLevels->gradeDescription = Input::get('gradeDescription');
		$gradeLevels->gradePoints = Input::get('gradePoints');
		$gradeLevels->gradeFrom = Input::get('gradeFrom');
		$gradeLevels->gradeTo = Input::get('gradeTo');
		$gradeLevels->save();

		return $this->panelInit->apiOutput(true,$this->panelInit->language['addLevel'],$this->panelInit->language['gradeCreated'],$gradeLevels->toArray() );
	}

	function fetch($id){
		return gradeLevels::where('id',$id)->first();
	}

	function edit($id){
		$gradeLevels = gradeLevels::find($id);
		$gradeLevels->gradeName = Input::get('gradeName');
		$gradeLevels->gradeDescription = Input::get('gradeDescription');
		$gradeLevels->gradePoints = Input::get('gradePoints');
		$gradeLevels->gradeFrom = Input::get('gradeFrom');
		$gradeLevels->gradeTo = Input::get('gradeTo');
		$gradeLevels->save();

		return $this->panelInit->apiOutput(true,$this->panelInit->language['editGrade'],$this->panelInit->language['gradeUpdated'],$gradeLevels->toArray() );
	}
}
