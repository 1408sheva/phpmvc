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
        $model = $this->getModel('Product');
        $this->registry['saved'] = 0;
        $this->setTitle("Редагування товару");
        $id = filter_input(INPUT_POST, 'id');
        if ($id) {
            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->saveItem($id,$values);
        }
        $this->registry['product'] = $model->getItem($this->getId());
        $this->setView();
        $this->renderLayout();
    }

    public function AddAction() {

        $model = $this->getModel('Product');
        $this->setTitle("Додавання товару");
        if ($values = $model->getPostValues()) {
            global $erorr;
            $erorr=[];
            if (empty($values['sku'])){
                $erorr[] = "Ви не ввели код товару;";
            }
            if (empty($values['name'])){
                $erorr[] = "Ви не ввели ім'я товару;";
            }
            if (empty($values['price'])){
                $erorr[] = "Ви не ввели ціну;";
            }
            elseif (!is_numeric($values['price'])) {
                $erorr[] = "Ціна повина бути числом;";
            }
            if (empty($values['qty'])){
                $erorr[] = "Ви не ввели кількісь;";
            }
            elseif (!is_numeric($values['qty'])) {
                $erorr[] = "Кількість повина бути числом;";
            }
            if ($erorr == false) {
                $model->addItem($values);
            }
        }
        $this->setView();
        $this->renderLayout('layout', $erorr);
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