<?php

App::uses('AppController', 'Controller');

class NewsletterController extends AppController {

    public $components = array('RequestHandler', 'Session', 'Imagens');
    public $helpers = array('Js');

    public $uses = array('Newsletter', 'Usuario');


    public function beforeFilter(){

        $login = $this->Session->read('Auth');

        if(empty($login)){
            return $this->redirect(array('controller' => 'login', 'action' => 'index'));
        } else {
            $this->set('Login', $this->Usuario->find('first', array('conditions'=>array('Usuario.id'=>$login['User']['id']))));
        }
    }

    
    public function index() {

        $this->set('Items', $this->Newsletter->find('all', array('order' => array('id DESC'))));

    }

    public function adicionar(){

    	if ($this->request->is('post')) {
    		
    		$email = $this->request->data['email'];

    		if (!empty($email)) {

                $this->request->data['nem_email'] = $email;

                if($this->Newsletter->save($this->request->data)) {
                    $this->Session->setFlash('Salvo com sucesso','flash_success');
                } else {
                    $this->Session->setFlash('Aconteceu um erro ao salvar...','flash_error');
                }

    		} else {
    			$this->Session->setFlash('Os campos não podem ficar vazios !','flash_error');
    		}
    	}

    }

    public function editar(){

    	$id = $this->request->params['id'];

    	$item = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));

    	if (!empty($item)) {

    		$this->set('item', $item);

    		if ($this->request->is('post')) {

    			$email = $this->request->data['email'];

    			if (!empty($email)) {

    				$this->request->data['email'] = $email;
    				$this->request->data['id'] = $id;

    				if($this->Newsletter->save($this->request->data)) {

    					$this->Session->setFlash('Salvo com sucesso','flash_success');

                        $this->redirect('/newsletter/editar/'.$id);
    				
    				} else {
    					$this->Session->setFlash('Aconteceu um erro ao salvar...','flash_error');
    				}

    			} else {
    				$this->Session->setFlash('Os campos não podem ficar vazio !','flash_error');
    			}

    		}

    	} else {
    		return $this->redirect(array('controller' => 'newsletter', 'action' => 'index'));
    	}

    }

    public function remover(){

    	$id = $this->request->params['id'];

    	$item = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));

    	if (!empty($item)) {

    		$this->request->data['id'] = $id;

            if($this->Newsletter->delete($this->request->data)){

            	$this->Session->setFlash('item deletado com sucesso!','flash_success');
            	return $this->redirect(array('controller' => 'newsletter', 'action' => 'index'));
            
            } else {

            	$this->Session->setFlash('Aconteceu um erro...!','flash_error');
            	return $this->redirect(array('controller' => 'newsletter', 'action' => 'index'));
            }
        
        } else {

    		$this->Session->setFlash('Aconteceu um erro...!','flash_error');
            return $this->redirect(array('controller' => 'newsletter', 'action' => 'index'));
    	}

    }


}