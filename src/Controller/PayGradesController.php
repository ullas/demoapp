<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayGrades Controller
 *
 * @property \App\Model\Table\PayGradesTable $PayGrades
 */
class PayGradesController extends AppController
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
									  
		$usrfilter="PayGrades.customer_id ='".$this->loggedinuser['customer_id'] . "'";						  
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
        $payGrades = $this->paginate($this->PayGrades);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payGrades'));
        $this->set('_serialize', ['payGrades']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Grade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payGrade = $this->PayGrades->get($id, [
            'contain' => ['Customers', 'JobClasses']
        ]);
		
		if($payGrade['customer_id']==$this->loggedinuser['customer_id']){
 			$this->set('payGrade', $payGrade);
        	$this->set('_serialize', ['payGrade']);
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
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
		
        $payGrade = $this->PayGrades->newEntity();
        if ($this->request->is('post')) {
            $payGrade = $this->PayGrades->patchEntity($payGrade, $this->request->data);
			$payGrade['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayGrades->save($payGrade)) {
                $this->Flash->success(__('The pay grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay grade could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGrades->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGrade', 'customers'));
        $this->set('_serialize', ['payGrade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Grade id.
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
		
        $payGrade = $this->PayGrades->get($id, [
            'contain' => []
        ]);
		
		if($payGrade['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payGrade = $this->PayGrades->patchEntity($payGrade, $this->request->data);
            if ($this->PayGrades->save($payGrade)) {
                $this->Flash->success(__('The pay grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay grade could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGrades->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGrade', 'customers'));
        $this->set('_serialize', ['payGrade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Grade id.
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
        $payGrade = $this->PayGrades->get($id);
        if($payGrade['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayGrades->delete($payGrade)) {
            	$this->Flash->success(__('The pay grade has been deleted.'));
        	} else {
            	$this->Flash->error(__('The pay grade could not be deleted. Please, try again.'));
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
			    	
					$record = $this->PayGrades->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->PayGrades->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayGrades has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayGrades could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
