<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Joblevels Controller
 *
 * @property \App\Model\Table\JoblevelsTable $Joblevels
 */
class JoblevelsController extends AppController
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
		$contains=['Customers'];
									  
		$usrfilter="Joblevels.customer_id ='".$this->loggedinuser['customer_id'] . "'";								  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $joblevels = $this->paginate($this->Joblevels);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('joblevels'));
        $this->set('_serialize', ['joblevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Joblevel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $joblevel = $this->Joblevels->get($id, [
            'contain' => ['Customers']
        ]);
		if($joblevel['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('joblevel', $joblevel);
        	$this->set('_serialize', ['joblevel']);
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
        $joblevel = $this->Joblevels->newEntity();
        if ($this->request->is('post')) {
            $joblevel = $this->Joblevels->patchEntity($joblevel, $this->request->data);
            $joblevel['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Joblevels->save($joblevel)) {
                $this->Flash->success(__('The joblevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The joblevel could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Joblevels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('joblevel', 'customers'));
        $this->set('_serialize', ['joblevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Joblevel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $joblevel = $this->Joblevels->get($id, [
            'contain' => []
        ]);
		
		if($joblevel['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $joblevel = $this->Joblevels->patchEntity($joblevel, $this->request->data);
            if ($this->Joblevels->save($joblevel)) {
                $this->Flash->success(__('The joblevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The joblevel could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Joblevels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('joblevel', 'customers'));
        $this->set('_serialize', ['joblevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Joblevel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $joblevel = $this->Joblevels->get($id);
		if($jobclass['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Joblevels->delete($joblevel)) {
            	$this->Flash->success(__('The joblevel has been deleted.'));
        	} else {
            	$this->Flash->error(__('The joblevel could not be deleted. Please, try again.'));
        	}
		}else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Joblevels->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Joblevels->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Joblevels has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Joblevels could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
