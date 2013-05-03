<?php
class ElecsController extends AppController {

	var $name = 'Elecs';



	var $helpers = array('Excel');

	    function export($m = null,$y=null) {
	        $this->layout = 'ajax';
	       	$this->Elec->recursive = -1;
			if(empty($m) || empty($y)){
				$y = date('Y');
				$m = date('n');
			}
			$this->loadModel('Customer');
			$cus = $this->Customer->find('all');
			$this->set(compact('y','cus','m'));
	    }




	function index() {
		//debug($this->data);
		$this->Elec->recursive = -1;
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('cus'));
		}

	function listview() {
		//App::import('Libs', 'libchart/classes/libchart.php');
		$this->Elec->recursive = -1;
		if(isset($this->data['Elec']['YM'])){
			$y = (int)$this->data['Elec']['YM']['year'];
			$m = (int)$this->data['Elec']['YM']['month'];
		}else {
			$y = date('Y');
			$m = date('n');
		}
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('y','cus','m'));
		//debug($cus);
	}

	function add() {
		$this->loadModel("Customer");
		$customers = $this->Customer->find('all');
		$this->set(compact('customers'));
		$this->loadModel("Room");
		$room = $this->Room->find('count');

		if (!empty($this->data)) {
		//debug($this->data['Elec']['date']);
			if(!empty($this->data['Elec']['date'])){
				$dstart = explode('/',$this->data['Elec']['date']);
				$ds = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
				$this->data['Elec']['date'] = date('Y-m-d',strtotime($ds));
			}
			$j=0;
			$data= array();
			$a = array();
			for($i=1;$i<=$room;$i++){
				$this->Elec->create();
				if(!empty($this->data['Elec']['elec'.$i])){
					$data['Elec']['rooms_id']=$this->data['Elec']['rooms_id'.$i];
					$data['Elec']['elec']=$this->data['Elec']['elec'.$i];
					$data['Elec']['date']=$this->data['Elec']['date'];
					// Kiem tra xem ngay do da nhap du lieu chua, neu nhap roi thi sua con chua thi them moi
					$arr = $this->Elec->find('all', array('conditions'=>array('date'=>$this->data['Elec']['date'], 'rooms_id'=>$data['Elec']['rooms_id'])));
					if(empty($arr)){
						$this->Elec->save($data);
						$j++;

					}else{
						$this->Elec->id = $arr[0]['Elec']['id'];
						$this->Elec->saveField('elec',$data['Elec']['elec']);
						}
				}
			}

			if($j == $room){
				$this->Session->setFlash(__('Đã lưu', true));
				} else if(($j<$room) && ($j != 0)){
					$a = $room- $j;
					$this->Session->setFlash(__('Đã thêm mới '.$j.' phòng. Và sửa '.$a.' phòng.' , true));
				}else
					$this->Session->setFlash(__('Đã sửa' , true));

			$this->redirect(array('action' => 'listview'));
		}
	}


	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for elec', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Elec->delete($id)) {
			$this->Session->setFlash(__('Elec deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Elec was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function getJsElec($d,$r){
		$this->autoRender = false;
		$dy = date("Y-m-d",strtotime($d));
		$dz = date("Y-m-d",strtotime($d.'+1 day'));
		$enumbers0 = $this->Elec->find("first",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$r,'date'=>$dy)));
		$enumbers1 = $this->Elec->find("first",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$r,'date'=>$dz)));
		echo date('j',strtotime($dy));
		echo "_";
		echo $r;
		echo "_";
		echo $enumbers0['Elec']['elec'];
		echo "_";
		if($enumbers1['Elec']['elec']!="" && $enumbers0['Elec']['elec']!=""){
			echo (int)$enumbers1['Elec']['elec'] - (int)$enumbers0['Elec']['elec'];
		}else{
			echo "-";
		}
	}


	function chart(){
		if(!empty($this->data['Elec']['date1']) && !empty($this->data['Elec']['date2'])){
			$d1 = $this->data['Elec']['date1'];
			$d2 = $this->data['Elec']['date2'];
			$dstart = explode('/',$this->data['Elec']['date1']);
			$datestart = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
			$dend= explode('/',$this->data['Elec']['date2']);
			$dateend = $dend[2].'-'.$dend[1].'-'.$dend[0] ;

		}else {

			$datestart = date('Y-m-01');
			$dateend = date('Y-m-'.date('t'));
			$d1 = date('01/m/Y');
			$d2 = date(date('t').'/m/Y');
		}
		$this->loadModel('Customer');

		$cus = $this->Customer->find('all');
		$this->loadModel('Room');
		$this->Room->unbindModel(array('hasMany' => array('Elec'),'belongsTo'=> array('Customer')));
		$rooms = $this->Room->find('all');
		$this->set(compact('datestart','cus','dateend','rooms','d1','d2'));

	}
	function getElec($d,$r){
		$dz = date("Y-m-d",strtotime($d));
		$enumbers = $this->Elec->find("first",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$r,'date'=>$dz),'recursive'=>-1));
		$enumber = isset($enumbers['Elec']['elec'])?$enumbers['Elec']['elec']:"";
		if (!empty($this->params['requested'])) {
		      return $enumber;
		}else {
		  $this->set(compact('enumber'));
		}

	}
	function getElecchart($datestart,$dateend,$r){
	  	$dzs = date("Y-m-d",strtotime($datestart));
	 	$dze = date("Y-m-d",strtotime($dateend.'+2 day'));

		$enumbers = $this->Elec->find("list",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$r,'date BETWEEN ? AND ?'=>array($dzs,$dze)),'recursive'=>-1));

		//$log = $this->Elec->getDataSource()->getLog(true, false);
		$enumbers = (array_values($enumbers));
		if(count($enumbers) >1){
			$enumber = $enumbers[count($enumbers) -1] - $enumbers[0];
		}else{$enumber =0;}
		if (!empty($this->params['requested'])) {
		      return $enumber;
		}else {
		  $this->set(compact('enumber'));
		}

	}


}
