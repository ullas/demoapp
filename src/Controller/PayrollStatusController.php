<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollStatus Controller
 *
 * @property \App\Model\Table\PayrollStatusTable $PayrollStatus
 */
class PayrollStatusController extends AppController
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
		$contains=['PayrollArea'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayrollArea']
        ];
        $payrollStatus = $this->paginate($this->PayrollStatus);

        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollStatus = $this->PayrollStatus->get($id, [
            'contain' => ['PayrollArea']
        ]);

        $this->set('payrollStatus', $payrollStatus);
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollStatus = $this->PayrollStatus->newEntity();
        if ($this->request->is('post')) {
            $payrollStatus = $this->PayrollStatus->patchEntity($payrollStatus, $this->request->data);
            if ($this->PayrollStatus->save($payrollStatus)) {
                $this->Flash->success(__('The payroll status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll status could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollStatus->PayrollArea->find('list', ['limit' => 200]);
        $this->set(compact('payrollStatus', 'payrollArea'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollStatus = $this->PayrollStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollStatus = $this->PayrollStatus->patchEntity($payrollStatus, $this->request->data);
            if ($this->PayrollStatus->save($payrollStatus)) {
                $this->Flash->success(__('The payroll status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll status could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollStatus->PayrollArea->find('list', ['limit' => 200]);
        $this->set(compact('payrollStatus', 'payrollArea'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollStatus = $this->PayrollStatus->get($id);
        if ($this->PayrollStatus->delete($payrollStatus)) {
            $this->Flash->success(__('The payroll status has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
