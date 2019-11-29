<?
    class Product extends CI_Controller {       // product클래스 선언
        function __construct() {               // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("product_m");    // 모델 product_m 연결
            $this->load->helper(array("url", "date"));
            $this->load->library("pagination");
            $this->load->library("upload");
            $this->load->library("image_lib");
        }

        public function index() {              // 제일 먼저 실행되는 함수
            $this->lists();                    // list 함수 호출
        }

        // Product Create
        public function add() {
            $uri_array=$this->uri->uri_to_assoc(3);
            $text1=array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->load->library("form_validation");            
            $this->form_validation->set_rules("category_no","구분명","required");
            $this->form_validation->set_rules("name","제품명","required|max_length[50]");
            $this->form_validation->set_rules("price","단가","required|numeric");          
            if ($this->form_validation->run()==FALSE) { // 목록화면의 추가버튼 클릭한 경우
                $data["list"] = $this->product_m->getlist_category();
                $this->load->view("main_header");
                $this->load->view("product_add", $data);    // 입력화면 표시
                $this->load->view("main_footer");
            }
            else { // 입력화면의 저장버튼 클릭한 경우
                $data = array(
                    "category_no12" => $this->input->post("category_no", TRUE),
                    "name12"	    => $this->input->post("name", TRUE),
                    "price12"	    => $this->input->post("price", TRUE),
                    "stock12"	    => $this->input->post("stock", TRUE)
                );
                $image_name = $this->call_upload();
                if($image_name) $data["image12"] = $image_name;
                $this->product_m->insertrow($data); 

                redirect("product/lists" . $text1 . $page);    //   목록화면으로 이동.
            }
        }

        // Product SelectAll
        public function lists() {
            $uri_array = $this->uri->uri_to_assoc(3); 
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            if ($text1 == "") $base_url = "/product/lists/page"; // $page_segment = 4;
            else $base_url = "/product/lists/text1/$text1/page"; // $page_segment = 6;

            $page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
            $base_url = "/~four12" . $base_url;

            $config["per_page"] = 5; // 페이지 당 표시할 line 수
            $config["total_rows"] = $this->product_m->rowcount($text1); // 전체 레코드 개수
            $config["uri_segment"] = $page_segment; // 페이지가 있는 segment 위치
            $config["base_url"] = $base_url; // 기본 url
            $this->pagination->initialize($config); // pagination 설정 적용

            $data["page"] = $this->uri->segment($page_segment, 0); // 시작 위치, 없으면 0
            $data["pagination"] = $this->pagination->create_links(); // 페이지 소스 생성

            $start = $data["page"]; // n페이지. 시작 위치
            $limit = $config["per_page"]; // 페이지 당 라인 수
            $data["list"] = $this->product_m->getlist($text1, $start, $limit); // 해당 페이지 자료 읽기
            $data["text1"] = $text1;
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("product_list", $data);           // product_list에 자료전달
            $this->load->view("main_footer");                  // 하단 출력 
        }

        // Product SelectOne
        public function view() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? urldecode($uri_array["no"]) : "";
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
            $data["row"] = $this->product_m->getrow($no);    // 자료읽어 data배열에 저장 
            $data["no"] = $no;
            $data["text1"] = $text1;
            $data["page"] = $page;
            $this->load->view("main_header");
            $this->load->view("product_view", $data);
            $this->load->view("main_footer");
        }

        // Product Update
        public function edit() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

            $this->load->library("form_validation");
            $this->form_validation->set_rules("category_no","구분명","required");
            $this->form_validation->set_rules("name","제품명","required|max_length[50]");
            $this->form_validation->set_rules("price","단가","required|numeric");
            if ( $this->form_validation->run()==FALSE ) {     // 수정버튼 클릭한 경우
                $this->load->view("main_header");
                $data["list"] = $this->product_m->getlist_category();                
                $data["row"]=$this->product_m->getrow($no);
                $this->load->view("product_edit", $data);
                $this->load->view("main_footer");
            }
            else {                                             // 저장버튼 클릭한 경우
                $data = array(
                    "category_no12" => $this->input->post("category_no", TRUE),
                    "name12"	    => $this->input->post("name", TRUE),
                    "price12"	    => $this->input->post("price", TRUE),
                    "stock12"	    => $this->input->post("stock", TRUE)
                );
                $image_name = $this->call_upload();
                if($image_name) $data["image12"] = $image_name;
                $result = $this->product_m->updaterow($data, $no);
                redirect("/product/lists" . $text1 . $page);
            }
        }

        // Product Delete
        public function del() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1", $uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $this->product_m->deleterow($no);
            redirect("/product/lists" . $text1 . $page);
        }

        public function call_upload() {
            $config['upload_path']  	= './product_img';
            $config['allowed_types']	= 'gif|jpg|png'; 
            $config['overwrite']    	= TRUE;
            $config['max_size']         = 10000000;
            $config['max_width']        = 10000;
            $config['max_height']       = 10000;

            $this->upload->initialize($config); 
            if (!$this->upload->do_upload('image')) 
                $image_name="";
            else
                $image_name=$this->upload->data("file_name");

                $config['image_library']     = 'gd2';
                $config['source_image']      = './product_img/' . $image_name;
                $config['thumb_marker']      = '';
                $config['new_image']         = './product_img/thumb';
                $config['create_thumb']      = TRUE; 
                $config['maintain_ratio']    = TRUE; 
                $config['width']             = 200;
                $config['height']            = 150;  

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            return $image_name;        
        }

        public function cal_stock() {
            $sql = "drop table if exists stock12;";
            $this->db->query($sql);

            $sql = "create table stock12 (
                        no12 int not null auto_increment,
                        product_no12 int,
                        stock12 int default 0,
                        primary key(no12)
                    );";
            $this->db->query($sql);

            $sql = "update product12 set stock12 = 0;";
            $this->db->query($sql);

            $sql = "insert into stock12 (product_no12, stock12) select product_no12, sum(pq12) - sum(sq12) from ledger12 group by product_no12";
            $this->db->query($sql);

            $sql = "update product12 inner join stock12 on product12.no12 = stock12.product_no12 set product12.stock12 = stock12.stock12;";
            $this->db->query($sql);
        }
    }
?>