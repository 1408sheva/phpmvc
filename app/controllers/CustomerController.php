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
        $post = $model->getPostValues();
        if (!empty($_POST['email']) && in_array($_POST['email'],$email)) {
            $this->registry['errors_reg'][] = 'E-mail використовується;';
        }else{
        $this->RegisterSave($post);}
        $this->setView();
        $this->renderLayout();
    }

    public function RegisterSave($post = []){
        $l_name = '';
        $f_name = '';
        $email = '';
        $password = '';
        $phone = '';
        $passwordConfirm = '';
        $city = '';

        if (isset($post)){
            if (!empty($post)){
            $l_name = $post['last_name'];
            $f_name = $post['first_name'];
            $phone = $post['telephone'];
            $email = $post['email'];
            $password = $post['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $city = $post['city'];}


            if (!User::checkName($l_name)){
                $this->registry['errors_reg'][] = 'Ім`я не повинно бути короче 2 символів';
            }
            if (!User::checkName($f_name)){
                $this->registry['errors_reg'][] = 'Прізвище не повинно бути короче 2 символів';
            }
            if (!User::checkEmail($email)){
                $this->registry['errors_reg'][] = 'Не правильний email!';
            }
            if (!User::checkPassword($password)){
                $this->registry['errors_reg'][] = 'Пароль не повинний бути менше 8 символів, та повинний містити латинські літери та число';
            }
            if (!User::checkPhone($phone)){
                $this->registry['errors_reg'][] = 'Невірно введений номер';
            }
            if (!User::passwordConfirm($password, $passwordConfirm)){
                $this->registry['errors_reg'][] = 'Паролі не співпадають';
            }
            $errors = false;
        }
        @$errors = $this->registry['errors_reg'] ;
        if (!$errors){
            $params =array (
                'last_name'=>strip_tags($l_name),
                'first_name'=>strip_tags($f_name),
                'telephone'=>$phone,
                'email'=>$email,
                'password'=> md5(strip_tags($password)),
                'city'=>strip_tags($city)
            );
            $customer = $this->getModel('customer')->addItem($params);
            setcookie('register', 'yes', time()+3, '/customer/login');
            Helper::redirect('/customer/login');

        }
    }
}