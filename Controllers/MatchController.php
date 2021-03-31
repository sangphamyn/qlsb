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
        $home = 1;
        $this->view->index($home);
    }
    public function create()
    {
        $taotran = 1;
        $lichsan = $this->model->lichsan();
        $data = $this->model->create();
        $club = $this->model->yourClub();
        $this->view->create($lichsan, $club, $data, $taotran);
    }
    public function createClub()
    {
        $taodoi = 1;
        $this->view->createClub($taodoi);
    }
    public function dadat()
    {
        $dadat = 1;
        $data = $this->model->cacDoiDaDat();
        $xacnhan = $this->model->cacDoiDaDatXacNhan();
        $this->view->dadat($data,$xacnhan,$dadat);
    }
    public function choghep()
    {
        $choghep = 1;
        $data = $this->model->choGhep();
        $this->view->choghep($data,$choghep);
    }
    public function allClub()
    {
        $allClub = 1;
        $data = $this->model->allClub();
        $this->view->allClub($data, $allClub);
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