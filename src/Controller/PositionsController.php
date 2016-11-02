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
            'contain' => ['Customers', 'LegalEntities', 'Departments', 'CostCentres', 'Locations', 'Divisions', 'PayGrades', 'PayRanges', 'ParentPositions', 'Parents']
        ];
        $positions = $this->paginate($this->Positions);

        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
	}
	public function orgchart()
    {
		$list = $this->Positions->find('treeList');
		
		$orgpositions = $this->Positions->find('threaded', array(
                    'order' => array('Positions.lft'))
            );
			
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
		
		$customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200]);
        $departments = $this->Positions->Departments->find('list', ['limit' => 200]);
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200]);
        $locations = $this->Positions->Locations->find('list', ['limit' => 200]);
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200]);
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200]);
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200]);
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200]);
        $parents = $this->Positions->Parents->find('list', ['limit' => 200]);
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents'));
        $this->set('_serialize', ['position']);
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
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200]);
        $departments = $this->Positions->Departments->find('list', ['limit' => 200]);
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200]);
        $locations = $this->Positions->Locations->find('list', ['limit' => 200]);
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200]);
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200]);
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200]);
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200]);
        $parents = $this->Positions->Parents->find('list', ['limit' => 200]);
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents'));
        $this->set('_serialize', ['position']);
    }
	public function addwizard()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
			$position['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));
				return $this->redirect(array('controller' => 'Homes', 'action' => 'index'));
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200]);
        $departments = $this->Positions->Departments->find('list', ['limit' => 200]);
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200]);
        $locations = $this->Positions->Locations->find('list', ['limit' => 200]);
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200]);
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200]);
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200]);
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200]);
        $parents = $this->Positions->Parents->find('list', ['limit' => 200]);
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Positions->Customers->find('list', ['limit' => 200]);
        $legalEntities = $this->Positions->LegalEntities->find('list', ['limit' => 200]);
        $departments = $this->Positions->Departments->find('list', ['limit' => 200]);
        $costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200]);
        $locations = $this->Positions->Locations->find('list', ['limit' => 200]);
        $divisions = $this->Positions->Divisions->find('list', ['limit' => 200]);
        $payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200]);
        $payRanges = $this->Positions->PayRanges->find('list', ['limit' => 200]);
        $parentPositions = $this->Positions->ParentPositions->find('list', ['limit' => 200]);
        $parents = $this->Positions->Parents->find('list', ['limit' => 200]);
        $this->set(compact('position', 'customers', 'legalEntities', 'departments', 'costCentres', 'locations', 'divisions', 'payGrades', 'payRanges', 'parentPositions', 'parents'));
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
        if ($this->Positions->delete($position)) {
            $this->Flash->success(__('The position has been deleted.'));
        } else {
            $this->Flash->error(__('The position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
