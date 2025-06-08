<?php


class notFoundController extends Controller{
    public function index(){
        $this->carregarTemplate('404');
    }
}