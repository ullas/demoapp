<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollData Controller
 *
 * @property \App\Model\Table\PayrollDataTable $PayrollData
 */
class PayrollDataController extends AppController
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
		$contains=['PayComponents'];
									  
		$usrfilter="";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayComponents']
        ];
        $payrollData = $this->paginate($this->PayrollData);

        $this->set(compact('payrollData'));
        $this->set('_serialize', ['payrollData']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollData = $this->PayrollData->get($id, [
            'contain' => ['PayComponents']
        ]);
		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200]);
		$this->set('payComponents', $payComponents);
        $this->set('payrollData', $payrollData);
        $this->set('_serialize', ['payrollData']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollData = $this->PayrollData->newEntity();
        if ($this->request->is('post')) {
            $payrollData = $this->PayrollData->patchEntity($payrollData, $this->request->data);
            if ($this->PayrollData->save($payrollData)) {
                $this->Flash->success(__('The payroll data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll data could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200]);
        $this->set(compact('payrollData', 'payComponents'));
        $this->set('_serialize', ['payrollData']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollData = $this->PayrollData->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollData = $this->PayrollData->patchEntity($payrollData, $this->request->data);
            if ($this->PayrollData->save($payrollData)) {
                $this->Flash->success(__('The payroll data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll data could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200]);
        $this->set(compact('payrollData', 'payComponents'));
        $this->set('_serialize', ['payrollData']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollData = $this->PayrollData->get($id);
        if ($this->PayrollData->delete($payrollData)) {
            $this->Flash->success(__('The payroll data has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
