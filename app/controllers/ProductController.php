<?php

class ProductController extends Controller {
    
    public function IndexAction() {
        $this->ListAction();
    }

    public function ListAction() {
        $this->setTitle("Товари");
        $this->registry['products'] = $this->getModel('Product')->initCollection()
               ->sort($this->getSortParams())->getCollection()->select();
        $this->setView();
        $this->renderLayout();
    }

    public function ByidAction() {
        $this->setTitle("Карточка товара");
        $this->registry['product'] = $this->getModel('Product')->initCollection()
               ->filter(['id',$this->getId()])->getCollection()->selectFirst();
        $this->setView();
        $this->renderLayout();
    }

    public function EditAction() {
        if (Helper::isAdmin()) {
            $model = $this->getModel('Product');
            $this->registry['saved'] = 0;
            $this->setTitle("Редагування товару");
            $id = filter_input(INPUT_POST, 'id');
            if ($id) {
                if ($values = $model->getPostValues()) {
                    $values['sku'] = strip_tags($values['sku']);
                    $values['name'] = strip_tags($values['name']);
                    $values['description'] = htmlspecialchars($values['description']);
                    if (empty($values['name'])) {
                        $this->registry['error_edit'][] = "Ви не ввели ім'я товару;";
                    }
                    if (is_int($values['price'])) {
                        $values['price'] = $values['price'] . '.00';
                    } elseif (!is_numeric($values['price'])) {
                        $this->registry['error_edit'][] = "Ціна повина бути числом;";
                    }
                    if (!is_numeric($values['qty'])) {
                        $this->registry['error_edit'][] = "Кількість повина бути числом;";
                    }
                    if (!isset($this->registry['error_edit'])) {
                        $this->registry['saved'] = 1;
                        $model->saveItem($id, $values);
                    }
                }
            }
            $this->registry['product'] = $model->getItem($this->getId());
            $this->setView();
            $this->renderLayout();
        }else{
            Helper::redirect('/error/forbidden');
        }
    }

    public function AddAction() {
        $model = $this->getModel('Product');
        $this->setTitle("Додавання товару");
        $sku = $model->getColumn('sku');
        if ($values = $model->getPostValues()) {
            $values['sku'] = strip_tags($values['sku']);
            $values['name'] = strip_tags($values['name']);
            $values['description'] = htmlspecialchars($values['description']);
            if (in_array($values['sku'],$sku)){
                $this->registry['error_add'][] = "Код товару вже існує";
            }
            if (empty($values['name'])){
                $this->registry['error_add'][] = "Ви не ввели ім'я товару;";
            }
            if (is_int($values['price'])){
                $values['price'] = $values['price'] . '.00';
            }
            elseif (!is_numeric($values['price'])) {
                $this->registry['error_add'][] = "Ціна повина бути числом;";
            }
            if (!is_numeric($values['qty'])) {
                $this->registry['error_add'][] = "Кількість повина бути числом;";
            }
            if (!isset($this->registry['error_add'])) {
                $model->addItem($values);
                $this->registry['save_add'][] = 'true';
            }

            //else echo 'nononon';
        }
        $this->setView();
        $this->renderLayout();
    }

    public function DeleteAction() {
        if (Helper::isAdmin()){
            $this->setTitle("Видалення товару");
            $model = $this->getModel('Product');

            if (isset($_POST) && key($_POST) == 'delete') {
                $id = intval($_POST['id']);
                $model->deleteItem($id, 'id');
                header("Location: /product/list/");
            }elseif(isset($_POST) && key($_POST) == 'cancel'){
                header("Location: /product/list/");
            }else{
            $this->setView();
            $this->renderLayout();}
        }else{
            Helper::redirect('/error/forbidden');
        }
    }

    public function RevisionAction(){
        $model = $this->getModel('Product');
        $this->setTitle("Додавання товару");
        $this->setView();
        $this->renderLayout();
    }

    public function getSortParams() {
        $params = [];
        if (isset($_COOKIE['sortparams'])) {
            $params = unserialize($_COOKIE['sortparams']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $params = [];
            $sortfirst = filter_input(INPUT_POST, 'sortfirst');
            if ($sortfirst === "price_DESC") {
                $params['price'] = 'DESC';
            } else {
                $params['price'] = 'ASC';
            }
            $sortsecond = filter_input(INPUT_POST, 'sortsecond');
            if ($sortsecond === "qty_DESC") {
                $params['qty'] = 'DESC';
            } else {
                $params['qty'] = 'ASC';
            }

            setcookie('sortparams', serialize($params), time() + 3600 *24 * 3);
        }
        
        return $params;

    }

    public function getSortParams_old() {
        /*
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
         * 
         */
        $sort = filter_input(INPUT_GET, 'sort');
        if (!isset($sort)) {
            $sort = "name";
        }
        /*
        if (isset($_GET['order']) && $_GET['order'] == 1) {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
         * 
         */
        if (filter_input(INPUT_GET, 'order') == 1) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }
        
        return array($sort, $order);
    }

    public function getId() {
        /*
        if (isset($_GET['id'])) {
         
            return $_GET['id'];
        } else {
            return NULL;
        }
        */
        return filter_input(INPUT_GET, 'id');
    }
    
    
}