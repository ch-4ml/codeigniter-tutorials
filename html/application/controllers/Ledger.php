<?
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    require_once __DIR__ . "/../libraries/PhpSpreadsheet/autoload.php";    

    class Ledger extends CI_Controller {       // ledger클래스 선언
        function __construct() {               // 클래스생성할 때 초기설정
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("ledger_m");    // 모델 ledger_m 연결
            $this->load->helper(array("url", "date"));
            $this->load->library("pagination");

            date_default_timezone_set("Asia/Seoul");
        }

        public function index() {              // 제일 먼저 실행되는 함수
            $this->lists();                    // list 함수 호출
        }

        public function lists() {
            $uri_array = $this->uri->uri_to_assoc(3); 
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month"));
            $text2 = array_key_exists("text2", $uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");
            $text3 = array_key_exists("text3", $uri_array) ? urldecode($uri_array["text3"]) : "0";
            $base_url = "/ledger/lists/text1/$text1/text2/$text2/text3/$text3/page"; // $page_segment = 6;

            $page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
            $base_url = "/~four12" . $base_url;

            $config["per_page"] = 5; // 페이지 당 표시할 line 수
            $config["total_rows"] = $this->ledger_m->rowcount($text1, $text2, $text3); // 전체 레코드 개수
            $config["uri_segment"] = $page_segment; // 페이지가 있는 segment 위치
            $config["base_url"] = $base_url; // 기본 url
            $this->pagination->initialize($config); // pagination 설정 적용

            $data["page"] = $this->uri->segment($page_segment, 0); // 시작 위치, 없으면 0
            $data["pagination"] = $this->pagination->create_links(); // 페이지 소스 생성

            $start = $data["page"]; // n페이지. 시작 위치
            $limit = $config["per_page"]; // 페이지 당 라인 수
            $data["list"] = $this->ledger_m->getlist($text1, $text2, $text3, $start, $limit); // 해당 페이지 자료 읽기
            $data["list_product"] = $this->ledger_m->getlist_product();
            $data["text1"] = $text1;
            $data["text2"] = $text2;
            $data["text3"] = $text3;
            $this->load->view("main_header");                  // 상단출력(메뉴)
            $this->load->view("ledger_list", $data);           // ledger_list에 자료전달
            $this->load->view("main_footer");                  // 하단 출력 
        }

        public function excel() {
            $uri_array = $this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month"));
            $text2 = array_key_exists("text2", $uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");
            $text3 = array_key_exists("text3", $uri_array) ? urldecode($uri_array["text3"]) : "0";
            $page = array_key_exists("page", $uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0;

            $count = $this->ledger_m->rowcount($text1, $text2, $text3);
            $list = $this->ledger_m->getlist_all($text1, $text2, $text3);

            $sheet = new Spreadsheet();

            // 각 열의 너비 정렬
            $sheet->getActiveSheet()->getColumnDimension("A")->setWidth(12);
            $sheet->getActiveSheet()->getColumnDimension("B")->setWidth(40);
            $sheet->getActiveSheet()->getColumnDimension("C")->setWidth(12);
            $sheet->getActiveSheet()->getColumnDimension("D")->setWidth(12);
            $sheet->getActiveSheet()->getColumnDimension("E")->setWidth(12);
            $sheet->getActiveSheet()->getColumnDimension("F")->setWidth(12);
            $sheet->getActiveSheet()->getColumnDimension("G")->setWidth(24);

            $sheet->getActiveSheet()->getStyle("A")->getAlignment()->setHorizontal("center");
            $sheet->getActiveSheet()->getStyle("B")->getAlignment()->setHorizontal("left");
            $sheet->getActiveSheet()->getStyle("C:F")->getAlignment()->setHorizontal("right");
            $sheet->getActiveSheet()->getStyle("G")->getAlignment()->setHorizontal("left");

            // 제목 (Font size, style)
            $sheet->setActiveSheetIndex(0)->setCellValue("A1", "매출입장");
            $sheet->getActiveSheet()->getStyle("A1")->getFont()->setSize(13);
            $sheet->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
            
            // 기간 (Alignment)
            $sheet->setActiveSheetIndex(0)->setCellValue("G1", "기간: $text1 - $text2");
            $sheet->getActiveSheet()->getStyle("G1")->getAlignment()->setHorizontal("right");

            // 헤더 정렬, 배경 색
            $sheet->getActiveSheet()->getStyle("A2:G2")->getAlignment()->setHorizontal("center");
            $sheet->getActiveSheet()->getStyle("A2:G2")->getFill()
                  ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                  ->getStartColor()->setARGB("FFCCCCCC");

            $sheet->setActiveSheetIndex(0)
                  ->setCellValue("A2", "날짜")
                  ->setCellValue("B2", "제품명")
                  ->setCellValue("C2", "단가")
                  ->setCellValue("D2", "매입수량")
                  ->setCellValue("E2", "매출수량")
                  ->setCellValue("F2", "금액")
                  ->setCellValue("G2", "비고");
            
            $i = 3;
            foreach ($list as $row) {
                $sheet->setActiveSheetIndex(0)
                      ->setCellValue("A$i", $row->date12)
                      ->setCellValue("B$i", $row->product_name)
                      ->setCellValue("C$i", $row->price12 ? $row->price12 : "")
                      ->setCellValue("D$i", $row->pq12 ? $row->pq12 : "")
                      ->setCellValue("E$i", $row->sq12 ? $row->sq12 : "")
                      ->setCellValue("F$i", $row->prices12 ? $row->prices12 : "")
                      ->setCellValue("G$i", $row->remarks12 ? $row->remarks12 : "");
                $i ++;
            }

            // 파일 이름, 저장
            $sheet->setActiveSheetIndex(0);

            $filename = "매출입장($text1-$text2).xlsx";
            $filename = iconv("UTF-8", "EUC-KR", $filename);
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment;filename=$filename");
            header("Cache-Control:max-age=0");
            header("Cache-Control:max-age=1");

            $writer = IOFactory::createWriter($sheet, "Xlsx");
            $writer->save("php://output");
        }
    }
?>