<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HolidayCalendars Controller
 *
 * @property \App\Model\Table\HolidayCalendarsTable $HolidayCalendars
 */
class HolidayCalendarsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $holidayCalendars = $this->paginate($this->HolidayCalendars);

        $this->set(compact('holidayCalendars'));
        $this->set('_serialize', ['holidayCalendars']);
    }

    /**
     * View method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $holidayCalendar = $this->HolidayCalendars->get($id, [
            'contain' => []
        ]);

        $this->set('holidayCalendar', $holidayCalendar);
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $holidayCalendar = $this->HolidayCalendars->newEntity();
        if ($this->request->is('post')) {
            $holidayCalendar = $this->HolidayCalendars->patchEntity($holidayCalendar, $this->request->data);
            if ($this->HolidayCalendars->save($holidayCalendar)) {
                $this->Flash->success(__('The holiday calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday calendar could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holidayCalendar'));
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $holidayCalendar = $this->HolidayCalendars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holidayCalendar = $this->HolidayCalendars->patchEntity($holidayCalendar, $this->request->data);
            if ($this->HolidayCalendars->save($holidayCalendar)) {
                $this->Flash->success(__('The holiday calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday calendar could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holidayCalendar'));
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $holidayCalendar = $this->HolidayCalendars->get($id);
        if ($this->HolidayCalendars->delete($holidayCalendar)) {
            $this->Flash->success(__('The holiday calendar has been deleted.'));
        } else {
            $this->Flash->error(__('The holiday calendar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
