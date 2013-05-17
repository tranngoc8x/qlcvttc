<?php
class NuocsController extends AppController {

	var $name = 'Nuocs';
	var $helpers = array('Excel');
	
	function exportdate($date1 = null, $date2 = null){
			//debug($date1);
			//debug($date2);
			$this->layout = 'ajax';
	       	$this->Nuoc->recursive = -1;
			if(empty($date1)||empty($date2)){
				$y2 = date('Y');
				$m2 = date('n');
				$d2 = date('d');
				$predate = strtotime('-1 month', strtotime(date('Y-n-d')));
				$predate = date('Y-n-d',$predate);			
				$pre = explode('-',$predate);
				$y1 = $pre[0];
				$m1 = $pre[1]; 
				$d1 = $pre[2];
				$d = (strtotime(date('Y-n-d')) - strtotime($predate))/(60*60*24);
			}else{
				$diff = strtotime($date2)-strtotime($date1);
				$d = $diff/(60*60*24);
				$a = explode('-',$date1);
				$y1 = $a[2];
				$m1 = $a[1];
				$d1 = $a[0];
				$b = explode('-',$date2);
				$y2 = $b[2];
				$m2 = $b[1];
				$d2 = $b[0];				
			}			
			$this->loadModel('Customer');
			$cus = $this->Customer->find('all');
			$this->set(compact('y1','m1','d1','y2','m2','d2','d','cus'));
			$this->render("newexport");
		}



	function index() {
		//debug($this->data);
		$this->Nuoc->recursive = -1;
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('cus'));
		}	
	
	function listviewsdate(){
		$this->Nuoc->recursive = -1;
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$this->set(compact('cus'));
		if(isset($this->data)){			
			$date1 = implode('-',array_reverse(explode('/',$this->data['Nuoc']['date1'])));
			$date2 = implode('-',array_reverse(explode('/',$this->data['Nuoc']['date2'])));			
			$diff = strtotime($date2)-strtotime($date1);
			if($diff > 0){
				$d = $diff/(60*60*24);
				if($d<=32){
					$a = explode('/',$this->data['Nuoc']['date1']);
					$y1 = $a[2];
					$m1 = $a[1];
					$d1 = $a[0];
					$b = explode('/',$this->data['Nuoc']['date2']);
					$y2 = $b[2];
					$m2 = $b[1];
					$d2 = $b[0];					
				}else{
					$y2 = date('Y');
					$m2 = date('n');
					$d2 = date('d');
					$predate = strtotime('-1 month', strtotime(date('Y-n-d')));
					$predate = date('Y-n-d',$predate);			
					$pre = explode('-',$predate);
					$y1 = $pre[0];
					$m1 = $pre[1]; 
					$d1 = $pre[2];
					$d = (strtotime(date('Y-n-d')) - strtotime($predate))/(60*60*24);
					$this->Session->setFlash(__('Hãy chọn lại khoảng thời gian. Hệ thống không hiển thị dữ liệu quá 1 tháng ', true));
					$this->redirect(array('action' => 'listviewsdate'));
				}					
			}else{
				$y2 = date('Y');
				$m2 = date('n');
				$d2 = date('d');
				$predate = strtotime('-1 month', strtotime(date('Y-n-d')));
				$predate = date('Y-n-d',$predate);			
				$pre = explode('-',$predate);
				$y1 = $pre[0];
				$m1 = $pre[1]; 
				$d1 = $pre[2];
				$d = (strtotime(date('Y-n-d')) - strtotime($predate))/(60*60*24);
				$this->Session->setFlash(__('Hãy chọn lại khoảng thời gian. Ngày bắt đầu không thể nhỏ hơn ngày kết thúc ', true));
				$this->redirect(array('action' => 'listviewsdate'));
			}
		}else {
			$y2 = date('Y');
			$m2 = date('n');
			$d2 = date('d');
			$predate = strtotime('-1 month', strtotime(date('Y-n-d')));
			$predate = date('Y-n-d',$predate);			
			$pre = explode('-',$predate);
			$y1 = $pre[0];
			$m1 = $pre[1]; 
			$d1 = $pre[2];
			$d = (strtotime(date('Y-n-d')) - strtotime($predate))/(60*60*24);
		}
		$this->set(compact('y1','m1','d1','y2','m2','d2','d'));
		//debug($d);
	}


	function add() {
		$this->loadModel("Customer");
		$customers = $this->Customer->find('all');
		$this->set(compact('customers'));
		$this->loadModel("Room");
		$room = $this->Room->find('count');

		if (!empty($this->data)) {		
			if(!empty($this->data['Nuoc']['date'])){
				$dstart = explode('/',$this->data['Nuoc']['date']);
				$ds = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
				$this->data['Nuoc']['date'] = date('Y-m-d',strtotime($ds));
				//$first = date('Y-m-d',strtotime($ds.'-1day'));
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
					//$elec_first = $this->Elec->find("first",array('fields'=>array('elec'),'conditions'=>array('rooms_id'=>$this->data['Elec']['rooms_id'.$i],'date'=>$first)));
					// Kiem tra xem ngay do da nhap du lieu chua, neu nhap roi thi sua con chua thi them moi
					//$data['Elec']['mtt'] = $this->data['Elec']['elec'.$i] - $elec_first;
					$arr = $this->Nuoc->find('all', array('conditions'=>array('date'=>$this->data['Nuoc']['date'], 'rooms_id'=>$data['Nuoc']['rooms_id'])));
					if(empty($arr)){
						$this->Nuoc->save($data);
						$j++;

					}else{
						$this->Nuoc->id = $arr[0]['Nuoc']['id'];
						$this->Nuoc->saveField('nuoc',$data['Nuoc']['nuoc']);
						//$this->Elec->saveField('mtt',$data['Elec']['elec']);
						}
				}
			}		
			$this->Session->setFlash(__('Đã lưu', true));
			$this->redirect(array('action' => 'listviewsdate'));
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
	
	function chart(){
		if(!empty($this->data['Nuoc']['date1']) && !empty($this->data['Nuoc']['date2'])){
			$d1 = $this->data['Nuoc']['date1'];
			$d2 = $this->data['Nuoc']['date2'];
			$dstart = explode('/',$this->data['Nuoc']['date1']);
			$datestart = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
			$dend= explode('/',$this->data['Nuoc']['date2']);
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
		$this->Room->unbindModel(array('hasMany' => array('Nuoc'),'belongsTo'=> array('Customer')));
		$rooms = $this->Room->find('all');
		$this->set(compact('datestart','cus','dateend','rooms','d1','d2'));

	}
	
	function chart_detail(){
		//debug($this->data);
		$this->loadModel('Customer');
		$customers = $this->Customer->find('list');
		$cus_first = $this->Customer->find('first',array('fields'=>array('id','name')));
		if(!empty($this->data['Nuoc']['date1']) && !empty($this->data['Nuoc']['date2'])){
			$d1 = $this->data['Nuoc']['date1'];
			$d2 = $this->data['Nuoc']['date2'];
			$dstart = explode('/',$this->data['Nuoc']['date1']);
			$datestart = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
			$dend= explode('/',$this->data['Nuoc']['date2']);
			$dateend = $dend[2].'-'.$dend[1].'-'.$dend[0] ;
			$cus = $this->data['Nuoc']['customers_id'];
		}elseif(empty($this->data['Nuoc']['date1']) && empty($this->data['Nuoc']['date2']) && !empty($this->data['Nuoc']['customers_id'])){
			$datestart = date('Y-m-01');
			$dateend = date('Y-m-'.date('t'));
			$d1 = date('01/m/Y');
			$d2 = date(date('t').'/m/Y');
			$cus = $this->data['Nuoc']['customers_id'];
		}else {
			$datestart = date('Y-m-01');
			$dateend = date('Y-m-'.date('t'));
			$d1 = date('01/m/Y');
			$d2 = date(date('t').'/m/Y');
			$cus = $cus_first['Customer']['id'];
		}
		$this->loadModel('Room');
		$this->Room->unbindModel(array('hasMany' => array('Nuoc'),'belongsTo'=> array('Customer')));
		$r = $this->Room->find('all', array('conditions'=>array('customers_id'=>$cus)));		
		$this->set(compact('customers','datestart','dateend','d1','d2','cus_first','r','cus'));
		//debug($cus);
		//debug($customers);
	}

	
	function getNuocchart($datestart,$dateend,$r){
	  	$dzs = date("Y-m-d",strtotime($datestart));
	 	$dze = date("Y-m-d",strtotime($dateend.'+2 day'));

		$enumbers = $this->Nuoc->find("list",array('fields'=>array('nuoc'),'conditions'=>array('rooms_id'=>$r,'date BETWEEN ? AND ?'=>array($dzs,$dze)),'recursive'=>-1));
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

	function getNuocEx($datestart,$dateend,$r){
	  	$dzs = date("Y-m-d",strtotime($datestart));
	 	$dze = date("Y-m-d",strtotime($dateend.'+2 day'));		
		$enumbers = $this->Nuoc->find("list",array('fields'=>array('date','nuoc'),'conditions'=>array('rooms_id'=>$r,'date BETWEEN ? AND ?'=>array($dzs,$dze)),'recursive'=>-1));
		if (!empty($this->params['requested'])) {
		      return $enumbers;
		}else {
		  $this->set(compact('enumbers'));
		}

	}
 
}
