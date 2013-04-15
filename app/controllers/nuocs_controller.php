<?php
class NuocsController extends AppController {

	var $name = 'Nuocs';

	function index() {		
		$this->Nuoc->recursive = -1;		
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');		
		$this->set(compact('cus'));		
		}
		
	
	

	function listview() {
		$this->Nuoc->recursive = -1;
		if(isset($this->data['Nuoc']['YM'])){
			$y = $this->data['Nuoc']['YM']['year'];
			$m = $this->data['Nuoc']['YM']['month'];
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
			if(!empty($this->data['Nuoc']['date'])){
				$dstart = explode('/',$this->data['Nuoc']['date']);
				$ds = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
				$this->data['Nuoc']['date'] = date('Y-m-d',strtotime($ds));
			}			
			$j=0;
			$data= array();
			$a = array();			
			for($i=1;$i<=$room;$i++){
				$this->Nuoc->create();
				if(!empty($this->data['Nuoc']['nuoc'.$i])){
					$data['Nuoc']['rooms_id']=$this->data['Nuoc']['rooms_id'.$i];
					$data['Nuoc']['nuoc']=$this->data['Nuoc']['nuoc'.$i];
					$data['Nuoc']['date']=$this->data['Nuoc']['date'];
					// Kiem tra xem ngay do da nhap du lieu chua, neu nhap roi thi sua con chua thi them moi
					$arr = $this->Nuoc->find('all', array('conditions'=>array('date'=>$this->data['Nuoc']['date'], 'rooms_id'=>$data['Nuoc']['rooms_id'])));
					if(empty($arr)){
						$this->Nuoc->save($data);
						$j++;			
						
					}else{
						$this->Nuoc->id = $arr[0]['Nuoc']['id'];
						$this->Nuoc->saveField('nuoc',$data['Nuoc']['nuoc']);
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
			$this->Session->setFlash(__('Không có bản ghi này', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Nuoc->delete($id)) {
			$this->Session->setFlash(__('Đã xóa', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Chưa xóa được', true));
		$this->redirect(array('action' => 'index'));
	}	
		function getJsNuoc($d,$r){
		$this->autoRender = false;
		$dy = date("Y-m-d",strtotime($d));
		$dz = date("Y-m-d",strtotime($d.'+1 day'));
		$enumbers0 = $this->Nuoc->find("first",array('fields'=>array('nuoc'),'conditions'=>array('rooms_id'=>$r,'date'=>$dy)));
		$enumbers1 = $this->Nuoc->find("first",array('fields'=>array('nuoc'),'conditions'=>array('rooms_id'=>$r,'date'=>$dz)));
		echo date('j',strtotime($dy));
		echo "_";
		echo $r;
		echo "_";
		echo $enumbers0['Nuoc']['nuoc'];
		echo "_";
		if($enumbers1['Nuoc']['nuoc']!="" && $enumbers0['Nuoc']['nuoc']!=""){
			echo (int)$enumbers1['Nuoc']['nuoc'] - (int)$enumbers0['Nuoc']['nuoc'];
		}else{
			echo "-";
		}
	}
	
}
