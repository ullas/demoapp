<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dependents Controller
 *
 * @property \App\Model\Table\DependentsTable $Dependents
 */
class DependentsController extends AppController
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
		
		$contains=['EmpDataBiographies', 'Customers'];
									  
		$usrfilter="Dependents.customer_id ='".$this->loggedinuser['customer_id'] . "'";				  
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
            'contain' => ['EmpDataBiographies', 'Customers']
        ];
        $dependents = $this->paginate($this->Dependents);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('dependents'));
        $this->set('_serialize', ['dependents']);
    }

    /**
     * View method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependent = $this->Dependents->get($id, [
            'contain' => ['EmpDataBiographies', 'Customers']
        ]);

		if($dependent['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('dependent', $dependent);
        	$this->set('_serialize', ['dependent']);
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
        $dependent = $this->Dependents->newEntity();
        if ($this->request->is('post')) {
            $dependent = $this->Dependents->patchEntity($dependent, $this->request->data);
			$dependent['customer_id']=$this->loggedinuser['customer_id'];
			$dependent['emp_data_biographies_id']=$this->request->session()->read('sessionuser')['empdatabiographyid'];
            if ($this->Dependents->save($dependent)) {
                $this->Flash->success(__('The dependent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dependent could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Dependents->EmpDataBiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Dependents->Customers->find('list', ['limit' => 200]);
        $this->set(compact('dependent', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['dependent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependent = $this->Dependents->get($id, [
            'contain' => []
        ]);
		
		if($dependent['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependent = $this->Dependents->patchEntity($dependent, $this->request->data);
            if ($this->Dependents->save($dependent)) {
                $this->Flash->success(__('The dependent has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dependent could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Dependents->EmpDataBiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Dependents->Customers->find('list', ['limit' => 200]);
        $this->set(compact('dependent', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['dependent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependent = $this->Dependents->get($id);
		if($dependent['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Dependents->delete($dependent)) {
            	$this->Flash->success(__('The dependent has been deleted.'));
        	} else {
            	$this->Flash->error(__('The dependent could not be deleted. Please, try again.'));
        	}
		}
	    else
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
			    	
					$record = $this->Dependents->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Dependents->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Dependents has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Dependents could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
