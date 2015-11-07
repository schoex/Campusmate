<?php

class PermissionsController extends \BaseController {

	var $data = array();
	var $panelInit ;
	var $layout = 'dashboard';
	
	public function __construct(){
		$this->panelInit = new \DashboardInit();
		$this->data['panelInit'] = $this->panelInit;
		$this->data['breadcrumb']['Settings'] = \URL::to('/dashboard/languages');
		$this->data['users'] = \Auth::user();
		if($this->data['users']->role == "student") exit;
	}
	
	public function index($method = "main")
	{		
		$this->panelInit->viewop($this->layout,'languages',$this->data);
	}

	

	
	public function getPermissions($id)
	{
		$toReturn = array();
		$toReturn['permissions'] = permissions::where('moduleId',$id)->orderBy('roleId','ASC')->get()->toArray();
		return $toReturn;
	}
	
	public function listAll($page = 1)
	{
		return $this->listAllData($page);
	}

	public function delete($id){
		if($this->data['users']->role != "admin") exit;
		User::where('role','student')->find($id)->delete();	
		return 1;
	}

	

	public 	function update(){
		$moduleId = Input::get('moduleId');
		$roleId = Input::get('roleId');
		$permissionValue = Input::get('permission');
		
$matchThese = ['moduleId' => $moduleId , 'roleId' => $roleId ];
$permissions =  permissions::where('roleId', '=', $roleId ) ->first(); 
$query ='update permissions set permission= '.$permissionValue.' where moduleId ='.$moduleId.' and roleId='.$roleId;
$result = DB::update($query);

return 1;

	}
	

	

	

	

}