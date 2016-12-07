<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
{
	var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$contains=['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
        // $this->set('_serialize', ['configs']);
		 
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos']
        ]);
		if($employee['customer_id']==$this->loggedinuser['customer_id']){
        	$this->set('employee', $employee);
        	$this->set('_serialize', ['employee']);
		}else{
		   $this->redirect(['action' => 'logout','controller'=>'users']);
       }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos']]);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
		
		$this->set('id', $id);
		
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
