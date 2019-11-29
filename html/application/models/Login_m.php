<?
    class Login_m extends CI_Model     // 모델 클래스 선언
    {
        public function getrow($uid, $pwd) {
            $sql = "select * from member12 where uid12='$uid' and pwd12='$pwd'";
            return $this->db->query($sql)->row();
        }
    }
?>