<?php
class ElecsController extends AppController {

	var $name = 'Elecs';

	function index() {
		//debug($this->data);
		$this->Elec->recursive = -1;
		//$d = date('Y-m');	
		//$s = $this->Elec->query("SELECT * FROM elecs WHERE date LIKE '%$d%' ");
		//echo "SELECT * FROM elecs WHERE date LIKE '%$d%' ";
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		//$s=$this->Elec->find("all",array('conditions'=>array('date LIKE'=>'%'.$d.'%')));
		$this->set(compact('cus'));
		//debug($s);
		}
		
	
	

	function listview() {
		$this->Elec->recursive = -1;
		if(isset($this->data['Elec']['YM'])){
			$y = $this->data['Elec']['YM']['year'];
			$m = $this->data['Elec']['YM']['month'];
		}else {
			$y = date('Y');
			$m = date('m');
		}		
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');		
		$this->set(compact('y','cus','m'));
	}	

	function add() {		
		$this->loadModel("Customer");		
		$customers = $this->Customer->find('all');
		$this->set(compact('customers'));
		$this->loadModel("Room");
		$room = $this->Room->find('count');
		//debug($room);
		//debug($this->data);
		
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
	
}
