<?
    class S_ledger extends CI_Controller {       // s_ledger클래스 선언
        function __construct() {               // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("s_ledger_m");    // 모델 s_ledger_m 연결
            $this->load->helper(array("url", "date"));
            $this->load->library("pagination");

            date_default_timezone_set("Asia/Seoul");
        }

        public function index() {              // 제일 먼저 실행되는 함수
            $this->lists();                    // list 함수 호출
        }

        // S_Ledger Create
        public function add() {
            $uri_array=$this->uri->uri_to_assoc(3);
            $text1=array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->load->library("form_validation");            
            $this->form_validation->set_rules("date","날짜","required");
            $this->form_validation->set_rules("product_no","제품명","required");
            if ($this->form_validation->run()==FALSE) { // 목록화면의 추가버튼 클릭한 경우
                $data["list"] = $this->s_ledger_m->getlist_product();
                $this->load->view("main_header");
                $this->load->view("s_ledger_add", $data);    // 입력화면 표시
                $this->load->view("main_footer");
            }
            else { // 입력화면의 저장버튼 클릭한 경우
                $data = array(
                    "type12"        => 1,
                    "date12"	    => $this->input->post("date", TRUE),
                    "product_no12"  => $this->input->post("product_no", TRUE),
                    "price12"	    => $this->input->post("price", TRUE),
                    "pq12"          => 0,
                    "sq12"          => $this->input->post("sq", TRUE),
                    "prices12"      => $this->input->post("prices", TRUE),
                    "remarks12"     => $this->input->post("remarks", TRUE)
                );
                $this->s_ledger_m->insertrow($data); 

                redirect("s_ledger/lists" . $text1 . $page);    //   목록화면으로 이동.
            }
        }

        // S_Ledger SelectAll
        public function lists() {
            $uri_array = $this->uri->uri_to_assoc(3); 
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d");
            $base_url = "/s_ledger/lists/text1/$text1/page"; // $page_segment = 6;

            $page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
            $base_url = "/~four12" . $base_url;

            $config["per_page"] = 5; // 페이지 당 표시할 line 수
            $config["total_rows"] = $this->s_ledger_m->rowcount($text1); // 전체 레코드 개수
            $config["uri_segment"] = $page_segment; // 페이지가 있는 segment 위치
            $config["base_url"] = $base_url; // 기본 url
            $this->pagination->initialize($config); // pagination 설정 적용

            $data["page"] = $this->uri->segment($page_segment, 0); // 시작 위치, 없으면 0
            $data["pagination"] = $this->pagination->create_links(); // 페이지 소스 생성

            $start = $data["page"]; // n페이지. 시작 위치
            $limit = $config["per_page"]; // 페이지 당 라인 수
            $data["list"] = $this->s_ledger_m->getlist($text1, $start, $limit); // 해당 페이지 자료 읽기
            $data["text1"] = $text1;
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("s_ledger_list", $data);           // s_ledger_list에 자료전달
            $this->load->view("main_footer");                  // 하단 출력 
        }

        // S_Ledger SelectOne
        public function view() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? urldecode($uri_array["no"]) : "";
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
            $data["row"] = $this->s_ledger_m->getrow($no);    // 자료읽어 data배열에 저장 
            $data["no"] = $no;
            $data["text1"] = $text1;
            $data["page"] = $page;
            $this->load->view("main_header");
            $this->load->view("s_ledger_view", $data);
            $this->load->view("main_footer");
        }

        // S_Ledger Update
        public function edit() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

            $this->load->library("form_validation");
            $this->form_validation->set_rules("date","날짜","required");
            $this->form_validation->set_rules("product_no","제품명","required");
            if ( $this->form_validation->run()==FALSE ) {     // 수정버튼 클릭한 경우
                $this->load->view("main_header");
                $data["list"] = $this->s_ledger_m->getlist_product();                
                $data["row"] = $this->s_ledger_m->getrow($no);
                $this->load->view("s_ledger_edit", $data);
                $this->load->view("main_footer");
            }
            else {                                             // 저장버튼 클릭한 경우
                $data = array(
                    "type12"        => 1,
                    "date12"	    => $this->input->post("date", TRUE),
                    "product_no12"  => $this->input->post("product_no", TRUE),
                    "price12"	    => $this->input->post("price", TRUE),
                    "pq12"          => 0,
                    "sq12"          => $this->input->post("sq", TRUE),
                    "prices12"      => $this->input->post("prices", TRUE),
                    "remarks12"     => $this->input->post("remarks", TRUE)
                );
                $result = $this->s_ledger_m->updaterow($data, $no);
                redirect("/s_ledger/lists" . $text1 . $page);
            }
        }

        // S_Ledger Delete
        public function del() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->s_ledger_m->deleterow($no);
            redirect("/s_ledger/lists" . $text1 . $page);
        }
    }
?>