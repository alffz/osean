<?php
    class model_Test extends Model
    {
        public function getTest()
        {
            $sql = "SELECT * FROM test";
            $result = $this->db->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

?>