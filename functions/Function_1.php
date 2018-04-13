<?php 
require_once("config.php");
session_start();

class Function_1
{

    public function __construct()
    {

		$connect=new Config();

		$this->db=$connect->connection();
				date_default_timezone_set("Asia/Kolkata");

    }
    public function view_student()
    {
    	$res1 = $this->db->query("SELECT * from new");
    	$res2 = $res1->fetch_assoc();
    	$res3 = $res2['s_id'];
        $res = $this->db->query("SELECT * from chem_issued_by_students where s_id = $res3");
        return $res;
    }
    public function get_id_and_delete()
    {
    	$res1 = $this->db->query("SELECT * from new");
    	$res2 = $res1->fetch_assoc();
    	$res3 = $res2['s_id'];
    	$res1 = $this->db->query("SELECT * FROM student WHERE s_id='$res3'");
        if($res1->num_rows == 0)
        {
             echo "<script type='text/javascript'>alert('Student does not exist');</script>";
        }
        else{
        $res2 = $this->db->query("DELETE FROM student WHERE s_id='$res3'");
        return TRUE;
        }
    }
    public function get_chemical_name($id)
    {
    	//echo $id;
    	$id = (int)$id;
    	$res1 = $this->db->query("SELECT * from chemical where c_id = $id ");
    	$res4 = $res1->fetch_assoc();
    	$res5 = $res4['name'];
    	return $res5;
    }
    public function get_equip_name($id)
    {
    	//echo $id;
    	$id = (int)$id;
    	$res1 = $this->db->query("SELECT * from equipment where eq_id = $id ");
    	$res4 = $res1->fetch_assoc();
    	$res5 = $res4['name'];
    	return $res5;
    }
    public function delete_student($id)
    {
    	$id = (int)$id;
    	$res1 = $this->db->query("DELETE from student where s_id = $id");
    	$res2 = $res1->fetch_assoc();
    	return $res2;
    }
    public function get_chem_id_added_to_the_table($sid)
    {
    	$res = $this->db->query("SELECT * FROM Chemical where c_id = $sid ");
       	$res4 = 0;
       	//echo "in the function";
        if($res->num_rows > 0)
        {
        	//echo "in if";
            $ans = $res->fetch_assoc();
            $res4 = $ans['quantity'];
            
        }
        return $res4;
    }
    public function get_user_id()
    {
    	//echo "Trying to get user id";
    	$res1 = $this->db->query("SELECT * from new");
    	$res2 = $res1->fetch_assoc();
    	$res3 = $res2['s_id'];
    	//echo "";
    	return $res3;
    }
    public function update_chem($quant, $g, $mid, $res2)	//-------------------------(requested value),(chem_avl),(chem),(user)-----------------------------
    {
    	//echo "in updating function";
    	$v = (int)$g - (int)$quant;
    	$res111 = $this->db->query("UPDATE chemical SET quantity = $v where c_id = $mid ");
    	//echo $v;
    	$res112 = $this->db->query("UPDATE chem_issued_by_students SET quantity = quantity+$quant where c_id = $mid and s_id = $res2");
    	return TRUE;
    }
    public function display_chem($id)
    {
    	$res111 = $this->db->query("select * from Chemical where chemical.c_id in (select chem_issued_by_students.c_id from student,chem_issued_by_students where student.s_id = $id and student.s_id in (select distinct chem_issued_by_students.s_id from chem_issued_by_students))");
    	$ids = array();
        if($res111->num_rows > 0)
        {
            while($data = $res111->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['name'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['name'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
    }
    public function check_if_exists($mid, $res2)
    {
    	$res11 = $this->db->query("SELECT * from chem_issued_by_students where c_id = $mid and s_id = $res2");
    	if($res11->num_rows > 0){
    		return 1;
    	}
    	else
    	{
    		return 0;
    	}
    }
    public function add_chemical($mid, $res2, $quantity)
    {
    	$res11 = $this->db->query("INSERT into chem_issued_by_students values($res2, $mid, $quantity)");
    	echo "adding chemical";
    	return TRUE;
    }
}
$new_fun = new Function_1();