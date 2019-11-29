<?
    class Search_product_m extends CI_Model     // 모델 클래스 선언
    {
        public function insertrow($row) {
            return $this->db->insert("product12", $row);
        }

        public function rowcount($text1) {
            if(!$text1) $sql = "select * from product12";
            else $sql = "select * from product12 where name12 like '%$text1%'";
            return $this->db->query($sql)->num_rows();
        }

        public function getlist($text1, $start, $limit) {
            // select문 정의
            if(!$text1) $sql = "select product12.*, category12.name12 as category_name from product12 left join category12 on product12.category_no12 = category12.no12 order by product12.name12 limit $start, $limit";
            else $sql = "select product12.*, category12.name12 as category_name from product12 left join category12 on product12.category_no12 = category12.no12 where product12.name12 like '%$text1%' order by product12.name12 limit $start, $limit";
            
            // 쿼리실행, 결과 리턴
            return $this->db->query($sql)->result();
        }

        public function getlist_category() {
            $sql = "select * from category12 order by name12";
            return $this->db->query($sql)->result();
        }
    }
?>