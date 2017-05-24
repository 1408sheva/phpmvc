<?php

class ErrorController extends Controller {
    public function ForbiddenAction()
    {
        $this->setTitle('Помилка доступу!');
        $this->setView('403');
        $this->renderLayout();
    }
    public function RedirectAction()
    {

    }
}