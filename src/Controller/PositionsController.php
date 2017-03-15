<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $Positions
 */
class PositionsController extends AppController
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
		
		$contains=['Customers', 'LegalEntities', 'Departments', 'CostCentres', 'Locations', 'Divisions', 'PayGrades', 'PayRanges', 'ParentPositions', 'Parents'];
									  
		$usrfilter="Positions.customer_id ='".$this->loggedinuser['customer_id'] . "'";						  
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
            'contain' => ['Customers', 'LegalEntities', 'Departments', 'CostCentres', 'Locations', 'Divisions', 'PayGrades', 'PayRanges', 'ParentPositions', 'Parents']
        ];
        $positions = $this->paginate($this->Positions);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
	}
	public function orgchart()
    {
		$list = $this->Positions->find('treeList');
		$orgpositions = $this->Positions->find('threaded', array('order' => array('Positions.lft')) )
		->select(['EmpDataBiographies.id','EmpDataBiographies.birth_name','EmpDataBiographies.country_of_birth','EmpDataBiographies.employee_id'])
    	->select($this->Positions)
        ->leftJoin('EmpDataBiographies', 'EmpDataBiographies.position_id = Positions.id');
            
		$this->log($orgpositions);
           
		$this->set('orgpositions', $orgpositions);
		
    }

    /**
     * View method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => ['Customers', 'LegalEntities', 'Departments', 'CostCentres', 'Locations', 'Divisions', 'PayGrades', 'PayRanges', 'ParentPositions', 'Parents']
        ]);
		
		if($position['customer_id']==$this->loggedinuser['customer_id']){
       	    $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        	$legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$departments = $this->Positions->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$locations = $this->Positions->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
       		$divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$parents = $this->Positions->Parents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents','businessUnits'));
        	$this->set('_serialize', ['position']);
		
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
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
			$position['customer_id']=$this->loggedinuser['customer_id'];
			$position['created_by']=$this->request->session()->read('sessionuser')['id'];
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Positions->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Positions->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parents = $this->Positions->Parents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents','businessUnits'));
        $this->set('_serialize', ['position']);
    }
	public function addwizard()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
			$position['customer_id']=$this->loggedinuser['customer_id'];
			$position['created_by']=$this->request->session()->read('sessionuser')['id'];
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));
				return $this->redirect(array('controller' => 'Homes', 'action' => 'index'));
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Positions->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Positions->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parents = $this->Positions->Parents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents','businessUnits'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => []
        ]);
		
		if($position['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
			$position['customer_id']=$this->loggedinuser['customer_id'];
			$position['last_modified_by']=$this->request->session()->read('sessionuser')['id'];
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Positions->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Positions->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $parents = $this->Positions->Parents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents','businessUnits'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $position = $this->Positions->get($id);
        if($position['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Positions->delete($position)) {
            	$this->Flash->success(__('The position has been deleted.'));
        	} else {
            	$this->Flash->error(__('The position could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Positions->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Positions->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Positions has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Positions could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
