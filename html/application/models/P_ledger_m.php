<?
    class P_Ledger_m extends CI_Model     // 모델 클래스 선언
    {
        public function insertrow($row) {
            return $this->db->insert("ledger12", $row);
        }

        public function rowcount($text1) {
            $sql = "select * from ledger12 where type12 = 0 and date12 = '$text1'";
            return $this->db->query($sql)->num_rows();
        }

        public function getlist($text1, $start, $limit) {
            // select문 정의
            $sql = "select ledger12.*, product12.name12 as product_name from ledger12 left join product12 on ledger12.product_no12 = product12.no12 where ledger12.type12 = 0 and ledger12.date12 = '$text1'";
            
            // 쿼리실행, 결과 리턴
            return $this->db->query($sql)->result();
        }

        public function getlist_product() {
            $sql = "select * from product12 order by name12";
            return $this->db->query($sql)->result();
        }

        public function getrow($no) {
            $sql = "select ledger12.*, product12.name12 as product_name from ledger12 left join product12 on ledger12.product_no12 = product12.no12 where ledger12.no12 = $no";
            return $this->db->query($sql)->row();
        }

        public function updaterow($row, $no)
        {
            $where = array("no12" => $no);
            return $this->db->update("ledger12", $row, $where);
        }

        public function deleterow($no) {
            $sql = "delete from ledger12 where no12 = $no";
            return $this->db->query($sql);
        }
    }
?>