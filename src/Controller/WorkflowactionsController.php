<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workflowactions Controller
 *
 * @property \App\Model\Table\WorkflowactionsTable $Workflowactions
 */
class WorkflowactionsController extends AppController
{

    var $components = array('ActionPopoupDatatable');
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		
		$usrfilter="";
        //msgdtime filter
        if( isset($this->request->query['workflowrule']) && ($this->request->query['workflowrule'])!=null ){
        	
			$usrfilter.="workflowrule_id ='" .$this->request->query['workflowrule']. "'";
		}
																	
		$contains= ['Workflowrules', 'Positions', 'Customers'];
									  
		$output =$this->ActionPopoupDatatable->getView($fields,$contains,$usrfilter);
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
            'contain' => ['Workflowrules', 'Positions', 'Customers']
        ];
        $workflowactions = $this->paginate($this->Workflowactions);

        $this->set(compact('workflowactions'));
        $this->set('_serialize', ['workflowactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workflowaction = $this->Workflowactions->get($id, [
            'contain' => ['Workflowrules', 'Positions', 'Customers']
        ]);

		$positions = $this->Workflowactions->Positions->find('list', ['limit' => 200]);
		$this->set('positions', $positions);
        $this->set('workflowaction', $workflowaction);
        $this->set('_serialize', ['workflowaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workflowaction = $this->Workflowactions->newEntity();
        if ($this->request->is('post')) {
            $workflowaction = $this->Workflowactions->patchEntity($workflowaction, $this->request->data);
			$workflowaction['workflowrule_id'] = $this->request->query['wrid'];
            if ($this->Workflowactions->save($workflowaction)) {
                $this->Flash->success(__('The workflowaction has been saved.'));

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflowaction could not be saved. Please, try again.'));
            }
			return $this->redirect($this->referer());
        }
        $workflowrules = $this->Workflowactions->Workflowrules->find('list', ['limit' => 200]);
        $positions = $this->Workflowactions->Positions->find('list', ['limit' => 200]);
        $customers = $this->Workflowactions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowaction', 'workflowrules', 'positions', 'nextactions', 'onfailureactions', 'customers'));
        $this->set('_serialize', ['workflowaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workflowaction = $this->Workflowactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workflowaction = $this->Workflowactions->patchEntity($workflowaction, $this->request->data);
            if ($this->Workflowactions->save($workflowaction)) {
                $this->Flash->success(__('The workflowaction has been saved.'));

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflowaction could not be saved. Please, try again.'));
            }
			return $this->redirect($this->referer());
        }
        $workflowrules = $this->Workflowactions->Workflowrules->find('list', ['limit' => 200]);
        $positions = $this->Workflowactions->Positions->find('list', ['limit' => 200]);
        $customers = $this->Workflowactions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowaction', 'workflowrules', 'positions', 'nextactions', 'onfailureactions', 'customers'));
        $this->set('_serialize', ['workflowaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $workflowaction = $this->Workflowactions->get($id);
        if ($this->Workflowactions->delete($workflowaction)) {
            $this->Flash->success(__('The workflowaction has been deleted.'));
        } else {
            $this->Flash->error(__('The workflowaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
