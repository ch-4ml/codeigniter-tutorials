<?
    class Monthly_m extends CI_Model     // 모델 클래스 선언
    {
        public function getlist($text1) {
            $sql = "select product12.name12 as product_name,
                        sum(if(month(ledger12.date12) = 1, ledger12.sq12, 0)) as s1,
                        sum(if(month(ledger12.date12) = 2, ledger12.sq12, 0)) as s2,
                        sum(if(month(ledger12.date12) = 3, ledger12.sq12, 0)) as s3,
                        sum(if(month(ledger12.date12) = 4, ledger12.sq12, 0)) as s4,
                        sum(if(month(ledger12.date12) = 5, ledger12.sq12, 0)) as s5,
                        sum(if(month(ledger12.date12) = 6, ledger12.sq12, 0)) as s6,
                        sum(if(month(ledger12.date12) = 7, ledger12.sq12, 0)) as s7,
                        sum(if(month(ledger12.date12) = 8, ledger12.sq12, 0)) as s8,
                        sum(if(month(ledger12.date12) = 9, ledger12.sq12, 0)) as s9,
                        sum(if(month(ledger12.date12) = 10, ledger12.sq12, 0)) as s10,
                        sum(if(month(ledger12.date12) = 11, ledger12.sq12, 0)) as s11,
                        sum(if(month(ledger12.date12) = 12, ledger12.sq12, 0)) as s12
                    from ledger12 left join product12 on ledger12.product_no12 = product12.no12
                    where year(ledger12.date12) = $text1 
                    group by ledger12.product_no12 
                    order by product12.name12";
            return $this->db->query($sql)->result();
        }
    }
?>