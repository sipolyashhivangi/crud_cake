<!-- File: /app/Controller/users_controller.php -->
<?php
class UsersController extends AppController {

	var $name = 'Users';

    // Display user data (R)
	function index()
    {
		$this->set('users', $this->User->find('all'));
	}

    // Add new user data function  (C)
	function add()
    {
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Your user data has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    // Delete user data function (D)
    function delete($id)
    {
    	$this->User->delete($id);
        $this->Session->setFlash('The user with id: '.$id.' has been deleted.');
        $this->redirect(array('action'=>'index'));
    }

    

    //Update user data function (U)
    function edit($id = null) {
        $this->User->id = $id;
        if (empty($this->data))
        {
            $this->data = $this->User->read();
        }
        else 
        {
            if ($this->User->save($this->data)) 
            {
                $this->Session->setFlash('Your user with id: '.$id.' has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}
?>