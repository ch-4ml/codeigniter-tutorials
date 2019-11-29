<?
    class Category extends CI_Controller {       // category클래스 선언
        function __construct() {               // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("category_m");    // 모델 category_m 연결
            $this->load->helper(array("url", "date"));
            $this->load->library("pagination");
        }

        public function index() {              // 제일 먼저 실행되는 함수
            $this->lists();                    // list 함수 호출
        }

        // Category Create
        public function add() {
            $uri_array=$this->uri->uri_to_assoc(3);
            $text1=array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->load->library("form_validation");            
            $this->form_validation->set_rules("name", "이름", "required|max_length[20]");
            if ($this->form_validation->run()==FALSE) { // 목록화면의 추가버튼 클릭한 경우
                $this->load->view("main_header");
                $this->load->view("category_add");    // 입력화면 표시
                $this->load->view("main_footer");
            }
            else { // 입력화면의 저장버튼 클릭한 경우
                $name12 = $this->input->post("name",true);
                $data = array(
                    "name12" => $name12
                );
                $this->category_m->insertrow($data); 

                redirect("category/lists" . $text1 . $page);    //   목록화면으로 이동.
            }
        }

        // Category SelectAll
        public function lists() {
            $uri_array = $this->uri->uri_to_assoc(3); 
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            if ($text1 == "") $base_url = "/category/lists/page"; // $page_segment = 4;
            else $base_url = "/category/lists/text1/$text1/page"; // $page_segment = 6;

            $page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
            $base_url = "/~four12" . $base_url;

            $config["per_page"] = 5; // 페이지 당 표시할 line 수
            $config["total_rows"] = $this->category_m->rowcount($text1); // 전체 레코드 개수
            $config["uri_segment"] = $page_segment; // 페이지가 있는 segment 위치
            $config["base_url"] = $base_url; // 기본 url
            $this->pagination->initialize($config); // pagination 설정 적용

            $data["page"] = $this->uri->segment($page_segment, 0); // 시작 위치, 없으면 0
            $data["pagination"] = $this->pagination->create_links(); // 페이지 소스 생성

            $start = $data["page"]; // n페이지. 시작 위치
            $limit = $config["per_page"]; // 페이지 당 라인 수
            $data["list"] = $this->category_m->getlist($text1, $start, $limit); // 해당 페이지 자료 읽기
    
            $data["text1"] = $text1;
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("category_list", $data);           // category_list에 자료전달
            $this->load->view("main_footer");                  // 하단 출력 
        }

        // Category SelectOne
        public function view() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? urldecode($uri_array["no"]) : "";
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
            $data["row"] = $this->category_m->getrow($no);    // 자료읽어 data배열에 저장 
            $data["no"] = $no;
            $data["text1"] = $text1;
            $data["page"] = $page;
            $this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("category_view", $data);           // category_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
        }

        // Category Update
        public function edit() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

            $this->load->library("form_validation");
            $this->form_validation->set_rules("name", "이름", "required|max_length[20]");
            if ( $this->form_validation->run()==FALSE ) {     // 수정버튼 클릭한 경우
                $this->load->view("main_header");
                $data["row"]=$this->category_m->getrow($no);
                $this->load->view("category_edit", $data);
                $this->load->view("main_footer");
            }
            else {                                             // 저장버튼 클릭한 경우
                $name12 = $this->input->post("name",true);
                $data = array(
                    "name12" => $name12
                );
                $result = $this->category_m->updaterow($data, $no);
                redirect("/category/lists" . $text1 . $page);
            }
        }

        // Category Delete
        public function del() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->category_m->deleterow($no);
            redirect("/category/lists" . $text1 . $page);
        }
    }
?>