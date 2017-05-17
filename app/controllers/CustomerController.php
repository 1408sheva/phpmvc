<?php
class CustomerController extends Controller {
// ...

    public function IndexAction() {
        $this->ListAction();
    }
    public function ListAction() {
        $this->setTitle("Кілієнти");
        $this->registry['customer'] = $this->getModel('Customer')->initCollection()
            ->getCollection()->select();
        $this->setView();
        $this->renderLayout();
    }

    public function LoginAction() {
        $this->setTitle("Вхід");
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $email = filter_input(INPUT_POST, 'email');
            $password = md5(filter_input(INPUT_POST, 'password'));
            $params =array (
                'email'=>$email,
                'password'=> $password
            );
            $customer = $this->getModel('customer')->initCollection()
                    ->filter($params)
                    ->getCollection()
                    ->selectFirst();
            if(!empty($customer)) {
                $_SESSION['id'] = $customer['customer_id'];
                Helper::redirect('/index/index');
            } else {
                $this->invalid_password = 1;
            }
        }
        $this->setView();
        $this->renderLayout();
    }
    public function LogoutAction() {
        
        $_SESSION = [];

       // expire cookie

        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 3600, "/");
        }

        session_destroy();
        Helper::redirect('/index/index');
    }

    public function RegisterAction(){
        $model = $this->getModel('Customer');
        $email = $model->getColumn('email');
        $this->setTitle("Регістрація");
        var_dump($email);
        if (in_array($_POST['email'],$email)) {
            echo 4534534534534;
        }
        else echo '1111';
        $this->RegisterSave();
        $this->setView();
        $this->renderLayout();
    }

    public function RegisterSave(){
        var_dump($_POST);
    }
}