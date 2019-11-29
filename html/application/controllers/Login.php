<?
    class Login extends CI_Controller {       // login클래스 선언
        function __construct() {               // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("login_m");    // 모델 login_m 연결
            $this->load->helper(array("url", "date"));

            date_default_timezone_set("Asia/Seoul");
        }

        public function index() {
            if ($this->session->userdata('rank') != 1) redirect("/~four12");
        }

        public function check() {
            $uid12 = $this->input->post("uid", TRUE);
            $pwd12 = $this->input->post("pwd", TRUE);
            $row = $this->login_m->getrow($uid12, $pwd12);
            if ($row) {   
                $data = array(
                    "uid"=>$row->uid12,
                    "rank"=>$row->rank12
                );
                $this->session->set_userdata($data);
            }
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("main_footer");                  // 하단 출력 
        }

        public function logout() {
            $data = array("uid", "rank");
            $this->session->unset_userdata($data);
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("main_footer");                  // 하단 출력 
        }
    }
?>