<?php
require_once "Models/MatchModel.php";
require_once "Views/MatchView.php";

class MatchController{
	/**
     * @var MatchModel
     */
    private $model;
    /**
     * @var MatchView
     */
    private $view;

    public function __construct()
    {
        $this->model = new MatchModel();
        $this->view = new MatchView();
    }
    public function index()
    {
        $this->view->index();
    }
    public function login()
    {
        $this->view->login();
    }
    public function create()
    {
        $lichsan = $this->model->lichsan();
        $data = $this->model->create();
        $club = $this->model->yourClub();
        $this->view->create($lichsan, $club, $data);
    }
    public function createClub()
    {
        $this->view->createClub();
    }
    public function dadat()
    {
        $data = $this->model->cacDoiDaDat();
        $xacnhan = $this->model->cacDoiDaDatXacNhan();
        $this->view->dadat($data,$xacnhan);
    }
    public function choghep()
    {
        $data = $this->model->choGhep();
        $this->view->choghep($data);
    }
    public function allClub()
    {
        $data = $this->model->allClub();
        $this->view->allClub($data);
    }
    public function yourClub()
    {
        $data = $this->model->yourClub();
        $this->view->yourClub($data);
    }
    public function joinClub()
    {
        $this->model->joinClub();
    }
    public function exitClub()
    {
        $this->model->exitClub();
    }
    public function ghep()
    {
        $this->model->ghep();
    }
    public function chonSan(){
        $this->model->chonSan();
    }
    public function clubMember(){
        $data = $this->model->clubMember();
        $this->view->clubMember($data);
    }
}