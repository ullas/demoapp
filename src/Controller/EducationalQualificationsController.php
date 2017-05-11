<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EducationalQualifications Controller
 *
 * @property \App\Model\Table\EducationalQualificationsTable $EducationalQualifications
 */
class EducationalQualificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Customers']
        ];
        $educationalQualifications = $this->paginate($this->EducationalQualifications);

        $this->set(compact('educationalQualifications'));
        $this->set('_serialize', ['educationalQualifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Educational Qualification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $educationalQualification = $this->EducationalQualifications->get($id, [
            'contain' => ['Employees', 'Customers']
        ]);

        $this->set('educationalQualification', $educationalQualification);
        $this->set('_serialize', ['educationalQualification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $educationalQualification = $this->EducationalQualifications->newEntity();
        if ($this->request->is('post')) {
            $educationalQualification = $this->EducationalQualifications->patchEntity($educationalQualification, $this->request->data);
            if ($this->EducationalQualifications->save($educationalQualification)) {
                $this->Flash->success(__('The educational qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educational qualification could not be saved. Please, try again.'));
            }
        }
        $employees = $this->EducationalQualifications->Employees->find('list', ['limit' => 200]);
        $customers = $this->EducationalQualifications->Customers->find('list', ['limit' => 200]);
        $this->set(compact('educationalQualification', 'employees', 'customers'));
        $this->set('_serialize', ['educationalQualification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Educational Qualification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $educationalQualification = $this->EducationalQualifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $educationalQualification = $this->EducationalQualifications->patchEntity($educationalQualification, $this->request->data);
            if ($this->EducationalQualifications->save($educationalQualification)) {
                $this->Flash->success(__('The educational qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educational qualification could not be saved. Please, try again.'));
            }
        }
        $employees = $this->EducationalQualifications->Employees->find('list', ['limit' => 200]);
        $customers = $this->EducationalQualifications->Customers->find('list', ['limit' => 200]);
        $this->set(compact('educationalQualification', 'employees', 'customers'));
        $this->set('_serialize', ['educationalQualification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Educational Qualification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $educationalQualification = $this->EducationalQualifications->get($id);
        if ($this->EducationalQualifications->delete($educationalQualification)) {
            $this->Flash->success(__('The educational qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The educational qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
