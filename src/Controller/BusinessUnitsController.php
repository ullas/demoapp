<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessUnits Controller
 *
 * @property \App\Model\Table\BusinessUnitsTable $BusinessUnits
 */
class BusinessUnitsController extends AppController
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
									  
		$usrfilter="";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		// echo json_encode($output);		
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
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
        $businessUnits = $this->paginate($this->BusinessUnits);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('businessUnits'));
        $this->set('_serialize', ['businessUnits']);
    }

    /**
     * View method
     *
     * @param string|null $id Business Unit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessUnit = $this->BusinessUnits->get($id, [
            'contain' => ['Customers']
        ]);

		if($businessUnit['customer_id']==$this->loggedinuser['customer_id']){
       	    $this->set('businessUnit', $businessUnit);
        	$this->set('_serialize', ['businessUnit']);
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
        $businessUnit = $this->BusinessUnits->newEntity();
        if ($this->request->is('post')) {
            $businessUnit = $this->BusinessUnits->patchEntity($businessUnit, $this->request->data);
            if ($this->BusinessUnits->save($businessUnit)) {
                $this->Flash->success(__('The business unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The business unit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->BusinessUnits->Customers->find('list', ['limit' => 200]);
        $this->set(compact('businessUnit', 'customers'));
        $this->set('_serialize', ['businessUnit']);
    }
	public function addwizard()
    {
        $businessUnit = $this->BusinessUnits->newEntity();
        if ($this->request->is('post')) {
            $businessUnit = $this->BusinessUnits->patchEntity($businessUnit, $this->request->data);
			$businessUnit['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->BusinessUnits->save($businessUnit)) {
                $this->Flash->success(__('The business unit has been saved.'));
				return $this->redirect(array('controller' => 'Divisions', 'action' => 'addwizard'));
            } else {
                $this->Flash->error(__('The business unit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->BusinessUnits->Customers->find('list', ['limit' => 200]);
        $this->set(compact('businessUnit', 'customers'));
        $this->set('_serialize', ['businessUnit']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Business Unit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessUnit = $this->BusinessUnits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessUnit = $this->BusinessUnits->patchEntity($businessUnit, $this->request->data);
            if ($this->BusinessUnits->save($businessUnit)) {
                $this->Flash->success(__('The business unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The business unit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->BusinessUnits->Customers->find('list', ['limit' => 200]);
        $this->set(compact('businessUnit', 'customers'));
        $this->set('_serialize', ['businessUnit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Unit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessUnit = $this->BusinessUnits->get($id);
        if ($this->BusinessUnits->delete($businessUnit)) {
            $this->Flash->success(__('The business unit has been deleted.'));
        } else {
            $this->Flash->error(__('The business unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
