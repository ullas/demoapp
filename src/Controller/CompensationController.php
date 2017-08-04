<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Compensation Controller
 *
 * @property \App\Model\Table\CompensationTable $Compensation
 */
class CompensationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $compensation = $this->paginate($this->Compensation);

		$empTable = TableRegistry::get('Employees');
		$empdatBiographyTable = TableRegistry::get('EmpDataBiographies');
		$payrolldataTable = TableRegistry::get('PayrollData');
		$payGroupTable = TableRegistry::get('PayGroups');
		$payComponentTable = TableRegistry::get('PayComponents');
		$payComponentGroupTable = TableRegistry::get('PayComponentGroups');
		

		$query=$empTable->find('All')->where(['visible'=>'1','customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $totalempcount=$query->count() : $totalempcount="";
		
		$query=$empTable->find('All')->where(['visible'=>'1','customer_id'=>$this->loggedinuser['customer_id']])
					->andWhere('(EXTRACT(MONTH FROM created) = EXTRACT(month FROM CURRENT_DATE))');
		(isset($query)) ? $newempcount=$query->count() : $newempcount=0;
		
		$query=$payrolldataTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']])->distinct(['empdatabiographies_id']);
		(isset($query)) ? $payrollheadcount=$query->count() : $payrollheadcount="";
		  
		$payGroups = $payGroupTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$payComponents = $payComponentTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponentGroups = $payComponentGroupTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        // $employees = $empTable->find('list',array('fields' => array('id'=>'Employees.id','name'=>'CONCAT(EmpDataPersonals.first_name,EmpDataPersonals.last_name)']),
    						// 'contain' => array('Empdatapersonals'), 'limit' => 200))
        					// ->where(['Employees.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['Employees.customer_id' => '0']);
		$employees = $empdatBiographyTable->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.employee_id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);					
		
		$this->set('employeearr', json_encode($employees));
		$this->set('paygrouparr', json_encode($payGroups));
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));
		
        $this->set(compact('compensation','totalempcount','payrollheadcount','newempcount'));
        $this->set('_serialize', ['compensation']);
    }
	public function calculateCompensation(){
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$mptloutput=[];
			if($this->request->data['selectedype']=="single"){
				if($this->request->data['paycomptype']=="paycomponent"){	
					$mptloutput=$this->manageCompensation($this->request->data['employee'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"paycomponent");					
				}else{
					$mptloutput=$this->manageCompensation($this->request->data['employee'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"group");					
				}
			}else if($this->request->data['selectedype']=="paygroup"){
				$this->loadModel('JobInfos');
				$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $this->request->data['employee'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
					
				foreach($jobinfos as $childval){
        			$tempoutput=[];
					if($this->request->data['paycomptype']=="paycomponent"){	
						$tempoutput=$this->manageCompensation($childval['employee_id'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"paycomponent");					
					}else{
						$tempoutput=$this->manageCompensation($childval['employee_id'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"group");					
					}
					(isset($mptloutput['last_value'])) ? $mptloutput['last_value']=$mptloutput['last_value']+$tempoutput['last_value'] : $mptloutput['last_value']=$tempoutput['last_value'];
					(isset($mptloutput['last_salary'])) ? $mptloutput['last_salary']=$mptloutput['last_salary']+$tempoutput['last_salary'] : $mptloutput['last_salary']=$tempoutput['last_salary'];
					(isset($mptloutput['projected_value'])) ? $mptloutput['projected_value']=$mptloutput['projected_value']+$tempoutput['projected_value'] : $mptloutput['projected_value']=$tempoutput['projected_value'];
				}
			}else if($this->request->data['selectedype']=="organisation"){
						
				$this->loadModel('Employees');
				$employees = $this->Employees->find()->select(['Employees.id'])->where(['Employees.customer_id' => $this->loggedinuser['customer_id']])->toArray();
					
				foreach($employees as $childval){
        			$tempoutput=[];
					if($this->request->data['paycomptype']=="paycomponent"){	
						$tempoutput=$this->manageCompensation($childval['id'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"paycomponent");					
					}else{
						$tempoutput=$this->manageCompensation($childval['id'],$this->request->data['valuetype'],$this->request->data['value'],$this->request->data['paycomponent'],$this->request->data['toggleval'],"group");					
					}
					(isset($mptloutput['last_value'])) ? $mptloutput['last_value']=$mptloutput['last_value']+$tempoutput['last_value'] : $mptloutput['last_value']=$tempoutput['last_value'];
					(isset($mptloutput['last_salary'])) ? $mptloutput['last_salary']=$mptloutput['last_salary']+$tempoutput['last_salary'] : $mptloutput['last_salary']=$tempoutput['last_salary'];
					(isset($mptloutput['projected_value'])) ? $mptloutput['projected_value']=$mptloutput['projected_value']+$tempoutput['projected_value'] : $mptloutput['projected_value']=$tempoutput['projected_value'];
				}
			}
			
			$this->response->body(json_encode($mptloutput));
	    	return $this->response;
		}
	}
	
	public function manageCompensation($empid,$valuetype,$value,$paycomponent,$toggleval,$paycomponenttype){
		
		$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid),'contain' => []])->toArray();
		isset($emparr[0]) ? $empdatabiographyid = $emparr[0]['id'] : $empdatabiographyid = "" ; 
		
		$output=[];
		$payrolldataTable = TableRegistry::get('PayrollData');
		$payComponentTable = TableRegistry::get('PayComponents');
		
		$result=0;$outputprojvalue=0;$projvalue=0;
		//pay components
		/*$query=$payrolldataTable->find('all', array('conditions' => array('empdatabiographies_id'  => $empdatabiographyid,'pay_component_type'  => '1',
											'customer_id' => $this->loggedinuser['customer_id'] ) ))->distinct(['paycomponent'])->toArray();
		foreach($query as $childval){
			$lastvalue=0;
			$query=$payComponentTable->find('all', array('conditions' => array('id'  => $childval['paycomponent'], 'customer_id' => $this->loggedinuser['customer_id'] ) ))->first();
			
			if($query['pay_component_type']=="1"){//percentage
				if($query['base_pay_component_type']=="2"){//pay component 
					$compquery=$payComponentTable->find('all', array('conditions' => array('id'  => $query['base_pay_component_group'],'customer_id' => $this->loggedinuser['customer_id'] ) ))->first();
					//get pay component value from pay component if null in payrolldata 
					(trim($childval['pay_component_value'])=="" || $childval['pay_component_value']==null) ? $lastvalue+=(($compquery['pay_component_value'] / 100) * $query['pay_component_value']) : $lastvalue+=(($compquery['pay_component_value'] / 100) * $childval['pay_component_value']);
					
				}else if($query['base_pay_component_type']=="1"){//pay component group
					$Components=$payComponentTable->find('all')->where(['pay_component_group_id' => $query['base_pay_component_group']])->andwhere(['PayComponents.customer_id' => $this->loggedinuser['customer_id']])
									->order(['"id"' => 'ASC'])->toArray();
					$tempval=0;
					foreach($Components as $compchildval){
						$tempval+=$compchildval['pay_component_value'];
					}
					//get pay component value from pay component if null in payrolldata 
					($childval['pay_component_value']=="" || $childval['pay_component_value']==null) ? $lastvalue+=($tempval / 100) * $query['pay_component_value'] : $lastvalue+=($tempval / 100) * $childval['pay_component_value']; 
					
					
				}
				
			}else{//amount
				($childval['pay_component_value']=="" || $childval['pay_component_value']==null) ? $lastvalue+=$query['pay_component_value'] : $lastvalue+=$childval['pay_component_value'];
				$lastvalue=$lastvalue;
			
			}
			//incrementing/decrementing
					if($childval['paycomponent']==$paycomponent && $paycomponenttype=="paycomponent"){$this->Flash->error(__('group'.$childval['paycomponentgroup'].'---'.$paycomponent."---".$paycomponenttype));
						if($valuetype=="amount"){
							($toggleval=="true") ? $outputprojvalue-=$value : $outputprojvalue+=$value;
						}else if($valuetype=="percentage"){
							($toggleval=="true") ? $outputprojvalue-=(($lastvalue / 100) * $value) : $outputprojvalue+=(($lastvalue / 100) * $value);
						}
					}
					
			$result+=$lastvalue;
		}
*/

		$lastmonthfirstdate= date('Y-m-d', strtotime('first day of previous month'));
		$lastmonthlastdate= date('Y-m-d', strtotime('last day of previous month'));

		//pay component groups
		$query=$payrolldataTable->find('all', array('conditions' => array('empdatabiographies_id'  => $empdatabiographyid,'customer_id' => $this->loggedinuser['customer_id'],
					array('start_date <='=>$lastmonthlastdate, 'end_date >=' => $lastmonthfirstdate ),
					 'end_date >=' => $lastmonthfirstdate, 'start_date <='=>$lastmonthlastdate ) ))
					// ->andwhere('(start_date <='.$lastmonthlastdate.' and end_date >='.$lastmonthfirstdate.') OR (end_date >='.$lastmonthfirstdate.' and start_date <='.$lastmonthlastdate.')')
					->order(['id' => 'DESC'])->toArray();
		$totalval=0;
			foreach($query as $childval){
				$lastvalue=0;
				$query=$payComponentTable->find('all', array('conditions' => array('id'  => $childval['paycomponent'], 'customer_id' => $this->loggedinuser['customer_id'] ) ))->first();
			
				if($query['pay_component_type']=="1"){//percentage
					
					if($query['base_pay_component_type']=="2"){//pay component 
						$calcvalue=0;
						$compquery=$payComponentTable->find('all', array('conditions' => array('id'  => $query['base_pay_component_group'],'customer_id' => $this->loggedinuser['customer_id'] ) ))->first();
						
						if($query['base_pay_component_group'] == $paycomponent && $paycomponenttype=="paycomponent"){
							if($valuetype=="amount"){
								($toggleval=="true") ? $calcvalue+=$compquery['pay_component_value']-$value : $calcvalue+=$compquery['pay_component_value']+$value ; 					
							}else if($valuetype=="percentage"){
								($toggleval=="true") ? $calcvalue+=$compquery['pay_component_value']-($compquery['pay_component_value'] / $value) : $calcvalue+=$compquery['pay_component_value']+($compquery['pay_component_value'] / $value);
							}
						}else{
							$calcvalue+=$compquery['pay_component_value'];
						}
						//get pay component value from pay component if null in payrolldata 
						(trim($childval['pay_component_value'])=="" || $childval['pay_component_value']==null) ? $amount=$query['pay_component_value'] : $amount=$childval['pay_component_value'] ;		
								
						$lastvalue+=($compquery['pay_component_value'] / 100) * $amount;
						$projvalue+=($calcvalue/ 100) * $amount;					
					
					}else if($query['base_pay_component_type']=="1"){//pay component group
						$Components=$payComponentTable->find('all')->where(['pay_component_group_id' => $query['base_pay_component_group']])->andwhere(['PayComponents.customer_id' => $this->loggedinuser['customer_id']])
									->order(['"id"' => 'ASC'])->toArray();
						$tempval=0;$calcvalue=0;
						foreach($Components as $compchildval){
							$tempval+=$compchildval['pay_component_value'];
							
							if($compchildval['id'] == $paycomponent && $paycomponenttype=="paycomponent"){
								if($valuetype=="amount"){
									($toggleval=="true") ? $calcvalue+=$compchildval['pay_component_value']-$value : $calcvalue+=$compchildval['pay_component_value']+$value ; 					
								}else if($valuetype=="percentage"){
									($toggleval=="true") ? $calcvalue+=($compchildval['pay_component_value']-($compchildval['pay_component_value']/$value)) : $calcvalue+=($compchildval['pay_component_value'] + ($compchildval['pay_component_value'] / $value));
								}
							}else{
								$calcvalue+=$compchildval['pay_component_value'];
							}

						}
						
						if($query['base_pay_component_group'] == $paycomponent && $paycomponenttype=="group"){
							if($valuetype=="amount"){
								($toggleval=="true") ? $calcvalue+=$tempval-$value : $calcvalue+=$tempval+$value ; 					
							}else if($valuetype=="percentage"){
								($toggleval=="true") ? $calcvalue+=($tempval-($tempval/$value)) : $calcvalue+=($tempval+($tempval/$value));
							}
						}
						
						//get pay component value from pay component if null in payrolldata 
						(trim($childval['pay_component_value'])=="" || $childval['pay_component_value']==null) ? $amount=$query['pay_component_value'] : $amount=$childval['pay_component_value'] ;
						$lastvalue+=($tempval / 100) * $amount;
						$projvalue+=$calcvalue;
					}
					
				}else{//amount
					$amount=0;
					(trim($childval['pay_component_value'])=="" || $childval['pay_component_value']==null) ? $amount=$query['pay_component_value'] : $amount=$childval['pay_component_value'] ;
					$lastvalue+=$amount;
					$projvalue+=$amount;
				}

				if($childval['paycomponentgroup']==$paycomponent && $paycomponenttype=="group"){
					$totalval+=$lastvalue;
				}
				$result+=$lastvalue;
				
				//incrementing/decrementing inside loop for pay component
					if($childval['paycomponent']==$paycomponent && $paycomponenttype=="paycomponent"){
						if($valuetype=="amount"){
							($toggleval=="true") ? $outputprojvalue-=$value : $outputprojvalue+=$value;
						}else if($valuetype=="percentage"){
							($toggleval=="true") ? $outputprojvalue-=(($lastvalue / 100) * $value) : $outputprojvalue+=(($lastvalue / 100) * $value);
						}
					}
					
			}
			//incrementing/decrementing outside loop for component group
			if($valuetype=="amount" && $paycomponenttype=="group"){
				($toggleval=="true") ? $outputprojvalue-=$value : $outputprojvalue+=$value ; 					
			}else if($valuetype=="percentage"){
				($toggleval=="true") ? $outputprojvalue-=(($totalval / 100) * $value) : $outputprojvalue+=(($totalval / 100) * $value);
			}
			
			
			
		// }
		//setting return values
		$output['last_value']=$result;
		$output['projected_value']=$projvalue+$outputprojvalue;
		//getting last paid salary
		$this->loadModel('PayrollResult');
		$query=$this->PayrollResult->find('all', array('conditions' => array('employee_id'  => $empid,'customer_id' => $this->loggedinuser['customer_id'] ) ))->order(['id' => 'DESC'])->first();
		(isset($query['paid_salary']) && ($query['paid_salary']!=null)) ? $output['last_salary']=$query['paid_salary'] : $output['last_salary']="No data available";
		
		return $output;
	}
    /**
     * View method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);

        $this->set('compensation', $compensation);
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compensation = $this->Compensation->newEntity();
        if ($this->request->is('post')) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compensation = $this->Compensation->get($id);
        if ($this->Compensation->delete($compensation)) {
            $this->Flash->success(__('The compensation has been deleted.'));
        } else {
            $this->Flash->error(__('The compensation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
