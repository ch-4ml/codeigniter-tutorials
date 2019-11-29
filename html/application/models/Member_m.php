<?
    class Member_m extends CI_Model     // 모델 클래스 선언
    {
        public function insertrow($row) {
            return $this->db->insert("member12", $row);
        }

        public function rowcount($text1) {
            if(!$text1) $sql = "select * from member12";
            else $sql = "select * from member12 where name12 like '%$text1%'";
            return $this->db->query($sql)->num_rows();
        }

        public function getlist($text1, $start, $limit) {
            // select문 정의
            if(!$text1) $sql = "select * from member12 order by name12 limit $start, $limit";
            else $sql = "select * from member12 where name12 like '%$text1%' order by name12 limit $start, $limit";
            
            // 쿼리실행, 결과 리턴
            return $this->db->query($sql)->result();
        }

        public function getrow($no) {
            $sql = "select * from member12 where no12 = $no";
            return $this->db->query($sql)->row();
        }

        public function updaterow($row, $no)
        {
            $where = array("no12" => $no);
            return $this->db->update("member12", $row, $where);
        }

        public function deleterow($no) {
            $sql = "delete from member12 where no12 = $no";
            return $this->db->query($sql);
        }
    }
?>