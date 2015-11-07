<?php

class InventoryController extends \BaseController {

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

	public function listTeachersAll()
	{
		$toReturn = array();
		$toReturn['teachers'] = User::where('role','teacher')->where('activated','1')->orderBy('id','DESC')->get()->toArray();
		
		return $toReturn;
	}
	public function listAll($page = 1)
	{
		return $this->listAllData($page);
	/*	$toReturn = array();
		$toReturn['inventory'] = inventory::orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->get()->toArray();
		$toReturn['totalItems'] = inventory::count();
		$toReturn['userRole'] = $this->data['users']->role;
		return $toReturn;*/
		
	}
	function listAllData($page = 1){
		$toReturn = array();
		$inventory= inventory::orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->get()->toArray();
		$toReturn['totalItems'] =inventory::orderBy('id','DESC')->count();
		$teachers = User::where('role','teacher')->where('activated','1')->get()->toArray();
		
		$teacherArray = array();
		while (list(, $value) = each($teachers)) {
			$teacherArray[$value['id']] = $value['fullName'];
		}
		
		
		$toReturn['inventory'] = array();
		while (list(, $inventorry) = each($inventory)) {
			$toReturn['inventory'][] = array('id'=>$inventorry['id'],"name"=>$inventorry['name'],"inventorydate"=>$inventorry['inventorydate'],"qty"=>$inventorry['qty'],"total"=>$inventorry['qty'],"status"=>$inventorry['status'],"teachername"=>isset($teacherArray[$inventorry['teacherId']]) ? $teacherArray[$inventorry['teacherId']] : "");
		}
		$toReturn['userRole'] = $this->data['users']->role;
		$newrole=$this->data['users']->newrole;
		$newrole_array=json_decode($newrole);
			/*$params= permissions::where('moduleId',1)->where('permission',1)->get();
			foreach ($params as $param) {
		$uniparam[]=$param->roleId;
}*/
	$uniparam=array(9,15);	
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

	public function delete($id){
		if($this->data['users']->role != "admin") exit;
		if ( $postDelete = inventory::find($id)->get() )
        {
            $postDelete->delete();
            return $this->panelInit->apiOutput(true,$this->panelInit->language['delParent'],$this->panelInit->language['parentDel']);
        }else{
            return $this->panelInit->apiOutput(false,$this->panelInit->language['delParent'],$this->panelInit->language['parentNotExist']);
        }
		
	}

	public function create(){
		if($this->data['users']->role != "admin") exit;
		$inventory = new inventory();
		$inventory->name = Input::get('name');
		$inventory->qty = Input::get('qty');
		$inventory->teacherId = Input::get('teacherId');
		$inventory->inventorydate = Input::get('inventorydate');
		$inventory->total = Input::get('total');
		$inventory->status = Input::get('status');
		
		$inventory->save();
$teachername =User::where('role','teacher')->where('activated','1')->where('id',$inventory->teacherId)->first();
$inventory->teachername=$teachername->fullName;
			return $this->panelInit->apiOutput(true,'Add Inventory','Inventory Added',$inventory->toArray());
		//return json_encode(array("jsTitle"=>'Add Inventory',"jsMessage"=>"Inventory Added","list"=>$this->listAll() ));
	}

	function fetch($id){
		$data = inventory::where('id',$id)->first()->toArray();
		return json_encode($data);
	}

	function edit($id){
		if($this->data['users']->role != "admin") exit;
		$inventory = inventory::find($id);
	$inventory->name = Input::get('name');
		$inventory->qty = Input::get('qty');
		$inventory->total = Input::get('total');
		$inventory->status = Input::get('status');
		$inventory->teacherId = Input::get('teacherId');
		$inventory->inventorydate = Input::get('inventorydate');
		$inventory->save();
			return $this->panelInit->apiOutput(true,'Edited Inventory','Inventory Added',$inventory->toArray());

		//return json_encode(array("jsTitle"=>'Edited Inventory',"jsMessage"=>"Inventory Added","list"=>$this->listAll() ));
	}
	
	function search($keyword,$page = 1){
		$toReturn = array();
		$inventory= inventory::where('name','like','%'.$keyword.'%')->orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->get()->toArray();
		$toReturn['totalItems'] =inventory::where('name','like','%'.$keyword.'%')->orderBy('id','DESC')->take('20')->skip(20* ($page - 1) )->count();
		$teachers = User::where('role','teacher')->where('activated','1')->get()->toArray();
		
		$teacherArray = array();
		while (list(, $value) = each($teachers)) {
			$teacherArray[$value['id']] = $value['fullName'];
		}
		
		
		$toReturn['inventory'] = array();
		while (list(, $inventorry) = each($inventory)) {
			$toReturn['inventory'][] = array('id'=>$inventorry['id'],"name"=>$inventorry['name'],"inventorydate"=>$inventorry['inventorydate'],"qty"=>$inventorry['qty'],"total"=>$inventorry['qty'],"status"=>$inventorry['status'],"teachername"=>isset($teacherArray[$inventorry['teacherId']]) ? $teacherArray[$inventorry['teacherId']] : "");
		}
		
	
		return $toReturn;
		
		////////
		
	}

}