<?
    class Search_product extends CI_Controller {        // product클래스 선언
        function __construct() {                        // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();                    // 데이터베이스 연결
            $this->load->model("search_product_m");     // 모델 product_m 연결
            $this->load->helper(array("url", "date"));
            $this->load->library("pagination");
            $this->load->library("upload");
        }

        // public function index() { // 제일 먼저 실행되는 함수
        //     $this->lists();       // list 함수 호출
        // }

        // Product SelectAll
        public function lists() {
            $uri_array = $this->uri->uri_to_assoc(3); 
            $type = array_key_exists("type", $uri_array) ? urldecode($uri_array["type"]) : "";
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            if ($text1 == "") $base_url = "/search_product/type/$type/lists/page";    // $page_segment = 4;
            else $base_url = "/search_product/type/$type/lists/text1/$text1/page";    // $page_segment = 6;

            $page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
            $base_url = "/~four12" . $base_url;

            $config["per_page"] = 5;                                                  // 페이지 당 표시할 line 수
            $config["total_rows"] = $this->search_product_m->rowcount($text1);        // 전체 레코드 개수
            $config["uri_segment"] = $page_segment;                                   // 페이지가 있는 segment 위치
            $config["base_url"] = $base_url;                                          // 기본 url
            $this->pagination->initialize($config);                                   // pagination 설정 적용

            $data["page"] = $this->uri->segment($page_segment, 0);                    // 시작 위치, 없으면 0
            $data["pagination"] = $this->pagination->create_links();                  // 페이지 소스 생성

            $start = $data["page"];                                                   // n페이지. 시작 위치
            $limit = $config["per_page"];                                             // 페이지 당 라인 수
            $data["list"] = $this->search_product_m->getlist($text1, $start, $limit); // 해당 페이지 자료 읽기
            $data["type"] = $type;
            $data["text1"] = $text1;
            $this->load->view("main_header_nomenu");                                  // 상단출력(메뉴 없음)
            $this->load->view("search_product_list", $data);                          // product_list에 자료전달
            $this->load->view("main_footer");                                         // 하단 출력 
        }
    }
?>