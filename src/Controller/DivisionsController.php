<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Divisions Controller
 *
 * @property \App\Model\Table\DivisionsTable $Divisions
 */
class DivisionsController extends AppController
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
		
		$contains=['Customers'];
									  
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
            'contain' => ['Customers']
        ];
        $divisions = $this->paginate($this->Divisions);

        $this->set(compact('divisions'));
        $this->set('_serialize', ['divisions']);
    }

    /**
     * View method
     *
     * @param string|null $id Division id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $division = $this->Divisions->get($id, [
            'contain' => ['Customers']
        ]);


		if($division['customer_id']==$this->loggedinuser['customer_id']){
        	$this->set('division', $division);
        	$this->set('_serialize', ['division']); 
		
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
        $division = $this->Divisions->newEntity();
        if ($this->request->is('post')) {
            $division = $this->Divisions->patchEntity($division, $this->request->data);
            if ($this->Divisions->save($division)) {
                $this->Flash->success(__('The division has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The division could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Divisions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('division', 'customers'));
        $this->set('_serialize', ['division']);
    }
	public function addwizard()
    {
        $division = $this->Divisions->newEntity();
        if ($this->request->is('post')) {
            $division = $this->Divisions->patchEntity($division, $this->request->data);
			$division['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Divisions->save($division)) {
                $this->Flash->success(__('The division has been saved.'));
				return $this->redirect(array('controller' => 'CostCentres', 'action' => 'addwizard'));
            } else {
                $this->Flash->error(__('The division could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Divisions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('division', 'customers'));
        $this->set('_serialize', ['division']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Division id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $division = $this->Divisions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $division = $this->Divisions->patchEntity($division, $this->request->data);
            if ($this->Divisions->save($division)) {
                $this->Flash->success(__('The division has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The division could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Divisions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('division', 'customers'));
        $this->set('_serialize', ['division']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Division id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $division = $this->Divisions->get($id);
        if ($this->Divisions->delete($division)) {
            $this->Flash->success(__('The division has been deleted.'));
        } else {
            $this->Flash->error(__('The division could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
