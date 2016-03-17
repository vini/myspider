<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\ORM\TableRegistry;

class RequestsController extends AppController
{
    public function getEmails() {
		$emailsTable= TableRegistry::get('Emails');
        $emails = $emailsTable->find()->where(['id' => 'DESC]')->limit(10)->all()->toArray();
		
        if ($this->request->is('requested')) {
            $this->response->body(json_encode($emails));
            return $this->response;
        }
        $this->set('items', $emails);
    }
	
    public function getUrls() {
		$urlsTable= TableRegistry::get('Urls');
        $urls = $urlsTable->find()->where(['id' => 'DESC]')->limit(10)->all()->toArray();
	
        if ($this->request->is('requested')) {
            $this->response->body(json_encode($urls));
            return $this->response;
        }
				
        $this->set('items', $urls);
    }
	
	public function test() {
	}
	
}
?>