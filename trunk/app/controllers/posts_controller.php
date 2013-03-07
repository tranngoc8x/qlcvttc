<?php
class PostsController extends AppController {

	var $name = 'Posts';
	function index() {	 
		$this->set('posts',$this->paginate());
		//câu truy vấn tìm kiếm tất cả các bản ghi thuộc bảng catalog
	}
	function detail($id=null) {	 
		$this->set('posts', $this->Post->read(null, $id));
		//câu truy vấn tìm kiếm  bản ghi có mã là $id thuộc bảng catalog
	}
	function add(){
		$this->Post->create();//tạo bản ghi mới
		if ($this->Post->save($this->data)) {
		//lưu các thông tin mới thêm vào csdl
			$this->redirect(array('action' => 'index'));
			//chuyển link khi được yêu cầu
		}
	}
	function edit($id=null){
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
			//lưu thông tin vào csdl
				$this->redirect(array('action' => 'index'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
			//dọc 1 bản ghi
		}
	}
	function delete($id=null){
		$this->Post->delete($item);//xóa bản ghi
	}
}
?>