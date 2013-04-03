<?php
class ElecsController extends AppController {

	var $name = 'Elecs';

	function index() {
		$this->Elec->recursive = 0;
		$this->set('elecs', $this->paginate());
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
				$data['Elec']['customers_id']=$this->data['Elec']['customers_id'.$i];
				$data['Elec']['elec']=$this->data['Elec']['elec'.$i];
				$data['Elec']['date']=$this->data['Elec']['date']; 
				if ($this->Elec->save($data)) {
					$j++;
					//$this->Session->setFlash(__('Đã lưu', true));
				} else {
					//$this->Session->setFlash(__('Chưa lưu được. Hãy thử lại!', true));
				}	
				//debug($data);
			}			
			if($j == count($customers)){
				$this->Session->setFlash(__('Đã lưu', true));
				} else if(($j<count($customers)) && ($j != 0)){
					$a = count($customers)- $j;
					$this->Session->setFlash(__('Còn '.$a.' công ty chưa lưu được', true));
					//echo "Còn ".$a."công ty chưa lưu được";
				}else 
					$this->Session->setFlash(__('Chưa lưu được. Hãy thử lại' , true));
			
			//$this->redirect(array('action' => 'index'));
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
