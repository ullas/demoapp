<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmpDataPersonals Controller
 *
 * @property \App\Model\Table\EmpDataPersonalsTable $EmpDataPersonals
 */
class EmpDataPersonalsController extends AppController
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
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $empDataPersonals = $this->paginate($this->EmpDataPersonals);

        $this->set(compact('empDataPersonals'));
        $this->set('_serialize', ['empDataPersonals']);
    }

    /**
     * View method
     *
     * @param string|null $id Emp Data Personal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empDataPersonal = $this->EmpDataPersonals->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('empDataPersonal', $empDataPersonal);
        $this->set('_serialize', ['empDataPersonal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empDataPersonal = $this->EmpDataPersonals->newEntity();
        if ($this->request->is('post')) {
            $empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data);
            if ($this->EmpDataPersonals->save($empDataPersonal)) {
                $this->Flash->success(__('The emp data personal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data personal could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataPersonals->Customers->find('list', ['limit' => 200]);
        $this->set(compact('empDataPersonal', 'customers'));
        $this->set('_serialize', ['empDataPersonal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emp Data Personal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empDataPersonal = $this->EmpDataPersonals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data);
            if ($this->EmpDataPersonals->save($empDataPersonal)) {
                $this->Flash->success(__('The emp data personal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data personal could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataPersonals->Customers->find('list', ['limit' => 200]);
        $this->set(compact('empDataPersonal', 'customers'));
        $this->set('_serialize', ['empDataPersonal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emp Data Personal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empDataPersonal = $this->EmpDataPersonals->get($id);
        if ($this->EmpDataPersonals->delete($empDataPersonal)) {
            $this->Flash->success(__('The emp data personal has been deleted.'));
        } else {
            $this->Flash->error(__('The emp data personal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
