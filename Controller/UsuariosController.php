<?php

App::uses('AppController', 'Controller');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Libera acesso temporário a todas as actions desse controller
        // apenas para configurar alguns usuarios durante a implantação da

        $this->Auth->allow('initDB', 'rebuildARO', 'login', 'logout'); //Remover quando em produção
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Usuario->recursive = 0;
        $grupos = $this->Usuario->Grupo->getGrupos();
        
        $this->paginate = array(
            'limit' => '3',
            'sort' => 'Usuario.nome'
        );
        
        $this->set('usuarios', $this->paginate());
        $this->set(compact('grupos'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
        $this->set('usuario', $this->Usuario->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The usuario has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $grupos = $this->Usuario->Grupo->find('list');
        $this->set(compact('grupos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The usuario has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
            $this->request->data = $this->Usuario->find('first', $options);
        }
        $grupos = $this->Usuario->Grupo->find('list');
        $this->set(compact('grupos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Usuario->delete()) {
            $this->Session->setFlash(__('Usuario deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuario was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function login() {

        if ($this->request->is('post')) {
            //Loga o usuário
            if ($this->Auth->login()) {
                $this->Session->setFlash('Vocẽ está logado!');
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash('Usuário e/ou Senha incorretos');
            }
        }

        // Para o caso de um usuário logado tentar fazer login novamente
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('Você já estava logado!');
            $this->redirect($this->Auth->redirectUrl());
        }
    }

    public function logout() {
        $this->Session->setFlash('Você efetuou o logout do sistema');
        $this->redirect($this->Auth->logout());
    }

    /**
     * mudarMinhaSenha method
     * Permite o próprio usuário mudar sua senha
     * @param string $id
     * @return void
     */
    //@TODO: Adicionar confirmação da tenha atual
    public function mudarMinhaSenha() {
        $id = AuthComponent::user('id');
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário editado com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível editar o usuário. Por favor, tente novamente.'));
            }
        } else {
            $this->request->data = $this->Usuario->read(null, $id);
        }
        $usuarios = $this->Usuario->Grupo->find('list');
        $this->set(compact('usuarios'));
    }

    public function initDB() {
        // Limpa a tabela aros_acos
        $this->Usuario->query('TRUNCATE aros_acos;');


        $group = & $this->Usuario->Grupo;

        //Allow admins to everything
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        //allow Gerentes
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Usuarios/index');
        $this->Acl->allow($group, 'controllers/Usuarios/add');
        $this->Acl->allow($group, 'controllers/Usuarios/edit');
        $this->Acl->allow($group, 'controllers/Usuarios/mudarMinhaSenha');

        //allow Recepcionistas
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Usuarios/add');
        $this->Acl->allow($group, 'controllers/Usuarios/index');
        $this->Acl->allow($group, 'controllers/Usuarios/mudarMinhaSenha');


        //allow TSB
        $group->id = 4;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Usuarios/index');
        $this->Acl->allow($group, 'controllers/Usuarios/mudarMinhaSenha');


        //we add an exit to avoid an ugly "missing views" error message
        echo "Terminado. Tabela aros_acos atualizada";
        exit;
    }

    public function rebuildARO() {

        // Build the groups.
        $groups = $this->Usuario->Grupo->find('all');
        $aro = new Aro();

        foreach ($groups as $group) {
            $aro->create();
            $aro->save(array(
                // 'alias'=>$group['Group']['name'],
                'foreign_key' => $group['Grupo']['id'],
                'model' => 'Grupo',
                'parent_id' => null
            ));
        }

        // Build the users.
        $users = $this->Usuario->find('all');

        $i = 0;
        foreach ($users as $user) {
            $aroList[$i++] = array(
                // 'alias' => $user['User']['email'],
                'foreign_key' => $user['Usuario']['id'],
                'model' => 'Usuario',
                'parent_id' => $user['Usuario']['grupo_id']
            );
        }

        foreach ($aroList as $data) {
            $aro->create();
            $aro->save($data);
        }

        echo "AROs rebuilt!";
        exit;
    }

}
