<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobFunctions Controller
 *
 * @property \App\Model\Table\JobFunctionsTable $JobFunctions
 */
class JobFunctionsController extends AppController
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
									  
		$usrfilter="JobFunctions.customer_id ='".$this->loggedinuser['customer_id'] . "'";					  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
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
        $jobFunctions = $this->paginate($this->JobFunctions);

        $this->set(compact('jobFunctions'));
        $this->set('_serialize', ['jobFunctions']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobFunction = $this->JobFunctions->get($id, [
            'contain' => ['Customers']
        ]);
		if($dependent['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('jobFunction', $jobFunction);
        	$this->set('_serialize', ['jobFunction']);
        }else{
			$this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
        }  
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobFunction = $this->JobFunctions->newEntity();
        if ($this->request->is('post')) {
            $jobFunction = $this->JobFunctions->patchEntity($jobFunction, $this->request->data);
			$jobFunction['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->JobFunctions->save($jobFunction)) {
                $this->Flash->success(__('The job function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job function could not be saved. Please, try again.'));
            }
        }
        $customers = $this->JobFunctions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('jobFunction', 'customers'));
        $this->set('_serialize', ['jobFunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobFunction = $this->JobFunctions->get($id, [
            'contain' => []
        ]);
		
		if($jobFunction['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobFunction = $this->JobFunctions->patchEntity($jobFunction, $this->request->data);
            if ($this->JobFunctions->save($jobFunction)) {
                $this->Flash->success(__('The job function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job function could not be saved. Please, try again.'));
            }
        }
        $customers = $this->JobFunctions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('jobFunction', 'customers'));
        $this->set('_serialize', ['jobFunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobFunction = $this->JobFunctions->get($id);
        if($jobFunction['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->JobFunctions->delete($jobFunction)) {
            	$this->Flash->success(__('The job function has been deleted.'));
        	} else {
            	$this->Flash->error(__('The job function could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
