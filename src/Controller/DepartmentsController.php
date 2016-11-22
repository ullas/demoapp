<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 */
class DepartmentsController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		$contains=['CostCentres','Customers'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CostCentres', 'Customers']
        ];
        $departments = $this->paginate($this->Departments);

        $this->set(compact('departments'));
        $this->set('_serialize', ['departments']);
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['CostCentres', 'Customers']
        ]);
		
		if($department['customer_id']==$this->loggedinuser['customer_id']){
       	    $costCentres = $this->Departments->CostCentres->find('list', ['limit' => 200]);
			$this->set('costCentres', $costCentres);
        	$this->set('department', $department);
        	$this->set('_serialize', ['department']);
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
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->data);
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
        $costCentres = $this->Departments->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->Departments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('department', 'costCentres', 'customers'));
        $this->set('_serialize', ['department']);
    }
	public function addwizard()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->data);
			$department['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));
				return $this->redirect(array('controller' => 'Positions', 'action' => 'addwizard'));
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
        $costCentres = $this->Departments->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->Departments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('department', 'costCentres', 'customers'));
        $this->set('_serialize', ['department']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->data);
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
        $costCentres = $this->Departments->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->Departments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('department', 'costCentres', 'customers'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
