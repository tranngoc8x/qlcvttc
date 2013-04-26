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
			//$cus = $this->Customer->find('all',array('conditions'=>array('id'=>1000)));
			$this->set(compact('y','cus','m'));
			//debug($cus);
	    }
	function index() {
		//debug($this->data);
		$this->Elec->recursive = -1;
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('cus'));
		}

	function listview() {
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
	function listviewsdate(){
		$this->Elec->recursive = -1;
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('cus'));
		if(isset($this->data)){			
			$date1 = implode('-',array_reverse(explode('/',$this->data['Elec']['date1'])));
			$date2 = implode('-',array_reverse(explode('/',$this->data['Elec']['date2'])));			
			$diff = strtotime($date2)-strtotime($date1);
			if($diff > 0){
				$d = $diff/(60*60*24);
				if($d<=31){
					$a = explode('/',$this->data['Elec']['date1']);
					$y1 = $a[2];
					$m1 = $a[1];
					$d1 = $a[0];
					$b = explode('/',$this->data['Elec']['date2']);
					$y2 = $b[2];
					$m2 = $b[1];
					$d2 = $b[0];					
				}else{
					$this->Session->setFlash(__('Hãy chọn lại khoảng thời gian. Hệ thống không hiển thị dữ liệu quá 1 tháng ', true));
				}					
			}else{
				$this->Session->setFlash(__('Hãy chọn lại khoảng thời gian. Ngày bắt đầu không thể nhỏ hơn ngày kết thúc ', true));
			}
		}else {
			$y2 = date('Y');
			$m2 = date('n');
			$d2 = date('d');
			//$y1 = ;
			//$m1 = ; 
			//$d1 = ;
		}
		$this->set(compact('y1','m1','d1','y2','m2','d2','d'));
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
		if(isset($this->data['Elec']['YM'])){
			$y = $this->data['Elec']['YM']['year'];
			$m = $this->data['Elec']['YM']['month'];
		}else {
			$y = date('Y');
			$m = date('m');
		}
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->loadModel('Room');
		$this->Room->unbindModel(array('hasMany' => array('Elec'),'belongsTo'=> array('Customer')));
		$rooms = $this->Room->find('all');
		$this->set(compact('y','cus','m','rooms'));

	}
	function getElec($d,$r){
		$dz = date("Y-m-d",strtotime($d));
		$enumbers = $this->Elec->find("first",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$r,'date'=>$dz)));
		$enumber = $enumbers['Elec']['elec'];
		if (!empty($this->params['requested'])) {
		      return $enumber;
		}else {
		  $this->set(compact('enumber'));
		}

	}
	
	function chart_detail(){
		//debug($this->data);
		$this->loadModel('Customer');
		$customers = $this->Customer->find('list');
		//$this->Customer->unbindModel(array('hasMany' => array('Room')));
		$cus_first = $this->Customer->find('first',array('fields'=>array('id','name')));
		if(isset($this->data['Elec']['YM'])){
			$y = $this->data['Elec']['YM']['year'];
			$m = $this->data['Elec']['YM']['month'];
			$c = $this->data['Elec']['customers_id'];
		}else {
			$y = date('Y');
			$m = date('m');
			$c = $cus_first['Customer']['id'];
		}			
		$r = $this->Customer->Room->find('all', array('conditions'=>array('customers_id'=>$c)));
		
		$this->set(compact('customers','y','m','r','cus_first'));		
	}



}
