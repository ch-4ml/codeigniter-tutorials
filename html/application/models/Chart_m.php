<?
    class Chart_m extends CI_Model     // 모델 클래스 선언
    {
        public function rowcount($text1, $text2) {
            $sql = "select product12.name12 as product_name, count(ledger12.sq12) as count_sq, sum(ledger12.sq12) as total_sq
            from ledger12 left join product12 on ledger12.product_no12 = product12.no12
            where type12 = 1 and ledger12.date12 between '$text1' and '$text2'
            group by product12.name12";
            return $this->db->query($sql)->num_rows();
        }

        public function getlist($text1, $text2) {
            // select문 정의
            $sql = "select category12.name12 as category_name, count(ledger12.sq12) as count_sq 
                    from (category12 right join product12 on category12.no12 = product12.category_no12)
                    right join ledger12 on product12.no12 = ledger12.product_no12
                    where type12 = 1 and ledger12.date12 between '$text1' and '$text2'
                    group by category12.name12
                    order by count_sq desc limit 14";
            // 쿼리실행, 결과 리턴
            return $this->db->query($sql)->result();
        }
    }
?>