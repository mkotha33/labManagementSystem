<?php 
require_once("config.php");
session_start();

class Functions
{

    public function __construct()
    {

		$connect=new Config();

		$this->db=$connect->connection();
				date_default_timezone_set("Asia/Kolkata");

    }

    public function insert_equipment()
    {
        $res = $this->db->query("load data local infile 'C:/Users/maahi/Desktop/MiniProject/equipment.txt' into table equipment fields terminated by ',';");
        
        $res = $this->db->query("load data local infile 'C:/Users/maahi/Desktop/MiniProject/dealer.txt' into table dealer fields terminated by ',';");

        return $res;
    }

    public function insert_student($s_id,$name,$grade ,$phone, $email, $coll_id,$password)
    {

        $res1 = $this->db->query("SELECT * FROM student WHERE mail_id = '$email' or s_id='$s_id'");
        if($res1->num_rows > 0)
        {
            return "student already exists";
        }
        else{
        $res2 = $this->db->query("INSERT INTO student(s_id,name,grade,phone_number,mail_id,coll_id,password) VALUES('$s_id','$name','$grade','$phone','$email','$coll_id','$password')");
        echo "<script type='text/javascript'>alert('Student has been successfully added');</script>";
        mail($email,'new user welcome!','Congrats! you have joined');
        echo "after sending.......";
        return TRUE;
        }
    }

    public function login_student($email, $password)
    {

        $res = $this->db->query("SELECT * FROM student where mail_id = '$email' and  password = $password ");
       
        if($res->num_rows > 0)
        {
            //echo "<script type='text/javascript'>alert('Student already exists');</script>";
            //$this->db->query("truncate table new");
            $res3 = $this->db->query("SELECT s_id from student where mail_id = '$email' and  password = $password");
            $ans = $res3->fetch_assoc();
            $res4 = $ans['s_id'];
            //echo $res4;
            $res6 = $this->db->query("TRUNCATE table new");
            $res5 = $this->db->query("INSERT into new(s_id) values($res4)");
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/chemistry_lab/login_register.php';</script>";
           // echo "<script type='text/javascript'>window.location.href = 'http://localhost/chemistry_lab/login_register.php';</script>";
            //return "student already exists";
        }
        else{
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/chemistry_lab/insert_student.php';</script>";
            //redirect to register page
            //return TRUE;
        }
        return TRUE;
        
    }

    public function update_student($s_id,$name,$grade ,$phone,$email, $coll_id,$password)
    {

        $res1 = $this->db->query("SELECT * FROM student WHERE s_id='$s_id'");
        if($res1->num_rows==0){
            echo "<script type='text/javascript'>alert('Student does not exist');</script>";
        }
        else{
            $data = $res1->fetch_assoc();
            if($data['name']!=$name){
                $res2 = $this->db->query("UPDATE student SET name='$name' where s_id='$s_id'");
            }
            if($data['grade']!=$grade){
                $res2 = $this->db->query("UPDATE student SET grade='$grade' where s_id='$s_id'");
            }
            if($data['phone_number']!=$phone){
                $res2 = $this->db->query("UPDATE student SET phone_number='$phone' where s_id='$s_id'");
            }
            if($data['mail_id']!=$email){
                $res2 = $this->db->query("UPDATE student SET mail_id='$email' where s_id='$s_id'");
            }
            if($data['coll_id']!=$coll_id){
                $res2 = $this->db->query("UPDATE student SET coll_id='$coll_id' where s_id='$s_id'");
            }
            if($data['password']!=$password){
                $res2 = $this->db->query("UPDATE student SET password='$password' where s_id='$s_id'");
            }
            return TRUE;
        }
    }


    public function delete_student($s_id)
    {
        //echo "ok2";
        /*$res2 = $this->db->query("select * from student where student.s_id in (select distinct chem_issued_by_students.s_id from chem_issued_by_students)");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['name'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['name'];
        //echo "ok";
        }
        return TRUE;*/
        $res1 = $this->db->query("SELECT * FROM student WHERE s_id='$s_id'");
        if($res1->num_rows == 0)
        {
             echo "<script type='text/javascript'>alert('Student does not exist');</script>";
        }
        else{
        $res2 = $this->db->query("DELETE FROM student WHERE s_id='$s_id'");
        return TRUE;
        }
    }
    public function nested_query_1()
    {
        //echo "ok2";
        $res2 = $this->db->query("select distinct * from student where (student.s_id in (select distinct chem_issued_by_students.s_id from chem_issued_by_students)) or (student.s_id in (select distinct equip_issued_by_students.s_id from equip_issued_by_students))");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
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
    public function nested_query_2()
    {
        //echo "ok2";
        $res2 = $this->db->query("select chemical.name from Chemical where chemical.c_id in (select chem_issued_by_students.c_id from student,chem_issued_by_students where student.name = 'Maheshwari' and student.s_id in (select distinct chem_issued_by_students.s_id from chem_issued_by_students))");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
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
    public function nested_query_3()
    {
        //echo "ok2";
        $res2 = $this->db->query("select equipment.name from Equipment where equipment.eq_id in (select equip_issued_by_students.eq_id from student,equip_issued_by_students where student.name = 'Maheshwari' and student.s_id in (select distinct equip_issued_by_students.s_id from equip_issued_by_students))");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
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
    public function join_query_one($phno)
    {
        //echo "ok2";
        $res6 = $this->db->query("DROP view my_table1");
        $res3 = $this->db->query("create view my_table1 as(select college.college_name as c,lab.l_id as l from college inner join lab on college.coll_id=lab.coll_id where lab.coll_id=(select coll_id from lab where lab.l_phone= $phno))");
        $res2 = $this->db->query("SELECT * from my_table1");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['c'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['c'], ' ', $id['l'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
        //return TRUE;
    }
    public function join_query_two($cname)
    {
        //echo "ok2";
        $res6 = $this->db->query("DROP view my_table1");
        $res3 = $this->db->query("create view my_table1 as(select student.name as c,student.mail_id as m,college.college_name as cn from student inner join college on student.coll_id=college.coll_id where college.coll_id=(select coll_id from college where college.college_name = '$cname'))");
        $res2 = $this->db->query("SELECT * from my_table1");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['c'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['c'], ' ', $id['m'], ' ' , $id['cn'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
        //return TRUE;
    }
    public function join_query_three()
    {
        //echo "ok2";
        $res6 = $this->db->query("DROP view my_table1");
        $res3 = $this->db->query("create view my_table1 as(select * from chemical_dealer NATURAL JOIN dealer)");
        $res2 = $this->db->query("SELECT * from my_table1");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['c'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['deal_id'], ' ', $id['quantity'], ' ' , $id['c_id'], ' ' , $id['dname'], ' ' , $id['d_phone'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
        //return TRUE;
    }
    public function trigger_one($cname)
    {
        //echo "ok2";
        $res6 = $this->db->query("DROP view my_table1");
        $res3 = $this->db->query("create view my_table1 as(select student.name as c,student.mail_id as m,college.college_name as cn from student inner join college on student.coll_id=college.coll_id where college.coll_id=(select coll_id from college where college.college_name = '$cname'))");
        $res2 = $this->db->query("SELECT * from my_table1");
        //echo "ok3";
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['c'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['c'], ' ', $id['m'], ' ' , $id['cn'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
        //return TRUE;
    }
    public function view_viewing($id)
    {
        //echo "ok2";
        $res1 = $this->db->query("DROP view view_1");
        $res3 = $this->db->query("create view view_1 as(select distinct equipment.name as one,student.s_id,student.name from student,equip_issued_by_students,equipment where (student.s_id = $id and equipment.eq_id in (select distinct equip_issued_by_students.eq_id from equip_issued_by_students where equip_issued_by_students.s_id = $id)))");
        //echo "ok3";
        $res2 = $this->db->query("SELECT * from view_1");
        $ids = array();
        if($res2->num_rows > 0)
        {
            while($data = $res2->fetch_assoc())
            {
                array_push($ids,$data);
                //echo $data['name'];
            }
        }
        //echo "ok1";
        foreach($ids as $id){
            echo $id['one'], ' ' , $id['s_id'], ' ' , $id['name'];
            echo "<br>";
        //echo "ok";
        }
        return TRUE;
        //return TRUE;
    }

}
$functions = new Functions();