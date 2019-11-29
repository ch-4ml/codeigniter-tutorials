<?
    class Ledger_m extends CI_Model     // 모델 클래스 선언
    {
        public function rowcount($text1, $text2, $text3) {
            if($text3 == "0") $sql = "select * from ledger12 where ledger12.date12 between '$text1' and '$text2'";
            else $sql = "select ledger12.*, product12.name12 as product_name 
                        from ledger12 left join product12 on ledger12.product_no12 = product12.no12 
                        where ledger12.date12 between '$text1' and '$text2' and product12.no12 = '$text3'";
            return $this->db->query($sql)->num_rows();
        }

        public function getlist($text1, $text2, $text3, $start, $limit) {
            // select문 정의
            if($text3 == "0") 
            $sql = "select ledger12.*, product12.name12 as product_name 
                    from ledger12 left join product12 on ledger12.product_no12 = product12.no12 
                    where ledger12.date12 between '$text1' and '$text2' 
                    order by ledger12.date12 desc
                    limit $start, $limit";
            else $sql = "select ledger12.*, product12.name12 as product_name 
                    from ledger12 left join product12 on ledger12.product_no12 = product12.no12 
                    where ledger12.date12 between '$text1' and '$text2' and product12.no12 = '$text3' 
                    order by ledger12.date12 desc
                    limit $start, $limit";
                    
            // 쿼리실행, 결과 리턴
            return $this->db->query($sql)->result();
        }

        public function getlist_product() {
            $sql = "select * from product12 order by name12";
            return $this->db->query($sql)->result();
        }

        public function getlist_all($text1, $text2, $text3) {
            if($text3 == "0")
                $sql = "select ledger12.*, product12.name12 as product_name
                        from ledger12 left join product12 on ledger12.product_no12 = product12.no12
                        where ledger12.date12 between '$text1' and '$text2'
                        order by ledger12.no12";
            else
                $sql = "select ledger12.*, product12.name12 as product_name
                        from ledger12 left join product12 on ledger12.product_no12 = product12.no12
                        where ledger12.date12 between '$text1' and '$text2' and ledger12.product_no12 = $text3 
                        order by ledger12.no12";
            
            return $this->db->query($sql)->result();
        }
    }
?>