<?php
class ElecsController extends AppController {

	var $name = 'Elecs';
	// function beforeFilter(){
	// 	parent::beforeFilter();
	// }
	function index() {
		$this->Elec->recursive = -1;
		$d = date('Y-m');
		//$s = $this->Elec->query("SELECT * FROM elecs WHERE date LIKE '%$d%' ");
		//echo "SELECT * FROM elecs WHERE date LIKE '%$d%' ";
		$this->loadModel('Customer');
		$cus = $this->Customer->find('all');
		$s=$this->Elec->find("all",array('conditions'=>array('date LIKE'=>'%'.$d.'%')));
		$this->set(compact('s','cus'));
		//debug($cus);
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid elec', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('elec', $this->Elec->read(null, $id));
	}

	function add() {
		$customers = $this->Elec->Customer->find('all');
		$this->set(compact('customers'));
		//debug($this->data);
		if (!empty($this->data)) {
		//debug($this->data['Elec']['date']);
			if(!empty($this->data['Elec']['date'])){
				$dstart = explode('/',$this->data['Elec']['date']);
				$ds = $dstart[2].'-'.$dstart[1].'-'.$dstart[0] ;
				$this->data['Elec']['date'] = date('Y-m-d',strtotime($ds));
			}
			//debug($this->data['Elec']['date']);
			$j=0;
			$data= array();
			for($i=0;$i<count($customers);$i++){
				$this->Elec->create();
				if(!empty($this->data['Elec']['elec'.$i])){
					$data['Elec']['customers_id']=$this->data['Elec']['customers_id'.$i];
					$data['Elec']['elec']=$this->data['Elec']['elec'.$i];
					$data['Elec']['date']=$this->data['Elec']['date'];
					$arr = $this->Elec->find('all', array('conditions'=>array('date'=>$this->data['Elec']['date'], 'customers_id'=>$data['Elec']['customers_id'])));
					if(empty($arr)){
						$this->Elec->save($data);
						$j++;			
						
					}else{
						$this->Elec->id = $arr[0]['Elec']['id'];
						$this->Elec->saveField('elec',$data['Elec']['elec']);
						}					
				}
			}			
			if($j == count($customers)){
				$this->Session->setFlash(__('Đã lưu', true));
				} else if(($j<count($customers)) && ($j != 0)){
					$a = count($customers)- $j;
					$this->Session->setFlash(__('Đã thêm mới '.$j.' công ty. Và sửa '.$a.' công ty.' , true));					
				}else 
					$this->Session->setFlash(__('Đã sửa' , true));
			
			$this->redirect(array('action' => 'index'));
		}
		
		
		
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid elec', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Elec->save($this->data)) {
				$this->Session->setFlash(__('The elec has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The elec could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Elec->read(null, $id);
		}
		$customers = $this->Elec->Customer->find('list');
		$this->set(compact('customers'));
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
}
