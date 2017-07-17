<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frequencies Controller
 *
 * @property \App\Model\Table\FrequenciesTable $Frequencies
 */
class FrequenciesController extends AppController
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
									  
		$usrfilter="Frequencies.customer_id ='".$this->loggedinuser['customer_id'] . "'";		  
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
        $frequencies = $this->paginate($this->Frequencies);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('frequencies'));
        $this->set('_serialize', ['frequencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => ['Customers', 'PayComponents']
        ]);

		if($address['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('frequency', $frequency);
       		$this->set('_serialize', ['frequency']);
        }else{
		    // $this->redirect(['action' => 'logout','controller'=>'users']);
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
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
			
        $frequency = $this->Frequencies->newEntity();
        if ($this->request->is('post')) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
			$frequency['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Frequencies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('frequency', 'customers'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
		
        $frequency = $this->Frequencies->get($id, [
            'contain' => []
        ]);
		
		if($frequency['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Frequencies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('frequency', 'customers'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
		
        $this->request->allowMethod(['post', 'delete']);
        $frequency = $this->Frequencies->get($id);
		if($frequency['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Frequencies->delete($frequency)) 
        	{
            	$this->Flash->success(__('The frequency has been deleted.'));
        	} else {
            	$this->Flash->error(__('The frequency could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
		
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Frequencies->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Frequencies->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Frequencies has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Frequencies could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
