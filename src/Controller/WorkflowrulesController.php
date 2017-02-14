<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workflowrules Controller
 *
 * @property \App\Model\Table\WorkflowrulesTable $Workflowrules
 */
class WorkflowrulesController extends AppController
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
		
		$contains=['Customers', 'Workflowactions', 'Workflows'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);		
    }
	
	public function createajaxData()
	{
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$workflowrule = $this->Workflowrules->newEntity();
			$this->request->data['description']=$this->request->query['description'];
            $this->request->data['name']=$this->request->query['name'];
			
			$this->request->data['created_by']=$this->request->session()->read('sessionuser')['id'];
            $this->request->data['modified_by']=$this->request->session()->read('sessionuser')['id'];
			
            $workflowrule=$this->Workflowrules->patchEntity($workflowrule,$this->request->data);
			if ($this->Workflowrules->save($workflowrule)) {

                $this->response->body($workflowrule['id']);
	    		return $this->response;
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}  
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $workflowrules = $this->paginate($this->Workflowrules);

        $this->set(compact('workflowrules'));
        $this->set('_serialize', ['workflowrules']);
    }

    /**
     * View method
     *
     * @param string|null $id Workflowrule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workflowactions'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $workflowrule = $this->Workflowrules->get($id, [
            'contain' => ['Customers', 'Workflowactions', 'Workflows']
        ]);

        $this->set('workflowrule', $workflowrule);
		$this->set('ruleid', $id);
        $this->set('_serialize', ['workflowrule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workflowactions'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			// $id=$this->request->data['holidaycalendarid'];
			$workflowrule = $this->Workflowrules->get($id, [
           	 	'contain' => []
        	]);
            $workflowrule = $this->Workflowrules->patchEntity($workflowrule, $this->request->data);
			$workflowrule['modified_by']=$this->request->session()->read('sessionuser')['id'];
            if ($this->Workflowrules->save($workflowrule)) {
                $this->Flash->success(__('The workflow rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflow rule could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workflowrules->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowrule', 'customers'));
        $this->set('_serialize', ['workflowrule']);
	
    }

    /**
     * Edit method
     *
     * @param string|null $id Workflowrule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workflowactions'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $workflowrule = $this->Workflowrules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workflowrule = $this->Workflowrules->patchEntity($workflowrule, $this->request->data);
            if ($this->Workflowrules->save($workflowrule)) {
                $this->Flash->success(__('The workflowrule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflowrule could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workflowrules->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowrule', 'customers'));
		$this->set('ruleid', $id);
        $this->set('_serialize', ['workflowrule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workflowrule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $workflowrule = $this->Workflowrules->get($id);
        if ($this->Workflowrules->delete($workflowrule)) {
            $this->Flash->success(__('The workflowrule has been deleted.'));
        } else {
            $this->Flash->error(__('The workflowrule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
