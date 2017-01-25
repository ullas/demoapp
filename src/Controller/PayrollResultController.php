<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollResult Controller
 *
 * @property \App\Model\Table\PayrollResultTable $PayrollResult
 */
class PayrollResultController extends AppController
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
		$contains=['PayrollArea', 'PayComponents'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayrollArea', 'PayComponents']
        ];
        $payrollResult = $this->paginate($this->PayrollResult);

        $this->set(compact('payrollResult'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollResult = $this->PayrollResult->get($id, [
            'contain' => ['PayrollArea', 'PayComponents']
        ]);

        $payrollArea = $this->PayrollResult->PayrollArea->find('list', ['limit' => 200]);
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200]);
        $this->set(compact('payrollResult', 'payrollArea', 'payComponents'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollResult = $this->PayrollResult->newEntity();
        if ($this->request->is('post')) {
            $payrollResult = $this->PayrollResult->patchEntity($payrollResult, $this->request->data);
            if ($this->PayrollResult->save($payrollResult)) {
                $this->Flash->success(__('The payroll result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll result could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollResult->PayrollArea->find('list', ['limit' => 200]);
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200]);
        $this->set(compact('payrollResult', 'payrollArea', 'payComponents'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollResult = $this->PayrollResult->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollResult = $this->PayrollResult->patchEntity($payrollResult, $this->request->data);
            if ($this->PayrollResult->save($payrollResult)) {
                $this->Flash->success(__('The payroll result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll result could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollResult->PayrollArea->find('list', ['limit' => 200]);
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200]);
        $this->set(compact('payrollResult', 'payrollArea', 'payComponents'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollResult = $this->PayrollResult->get($id);
        if ($this->PayrollResult->delete($payrollResult)) {
            $this->Flash->success(__('The payroll result has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
