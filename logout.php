<?
header("Content-type: text/html; charset=utf-8");
// เชื่อมต่อดาต้าเบส ********************
$host = "127.0.0.1";
$sys_user ="root";
$sys_password = "123456";
$database = "code-father-test";
$link = mysql_connect($host,$sys_user,$sys_password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());
// เชื่อมต่อดาต้าเบส ********************
                
if($submit=="Login" ){ 
            $sql="Select * from user Where user_name='".$user_name."' and user_password='".$user_password."' ";
            
            $rstTemp=mysql_query($sql);
                    if(mysql_num_rows($rstTemp)==0){
?>
                            <script language="JavaScript">
                                alert("รหัสไม่ถูกต้อง หรือ ยังไม่มีอยู่ในระบบ กรุณาลองใหม่อีกครั้ง หรือติดต่อเจ้าหน้าที่ เพื่อดำเนินการต่อไป ......  ^_^ ");
                                window.location.href = "index.php";
                            </script>
<?                    
                    }else{
?>
                            <script language="JavaScript">
                                alert("สวัสดีครับ คุณ <?=$user_name?> ยินดีต้อนรับเข้าสู่ระบบครับ");
                                window.location.href = "member.php"; //ส่ง user ไำปยังหน้าที่เราต้องการ
                            </script>
<?
                    }
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบล๊อกอินง่าย ๆ</title>
<form name="Myform" method="post"  action="index.php?submit=Login">
   User Name : <input name="user_name" type="text" size="15" maxlength="15">
   <br><br>
   Password  : <input name="user_password" type="password" size="15" maxlength="15">
   <br><br>
   <input type="submit" name="OK" value="   LOG - IN    "  >
   <input type="reset" name="OK2" value="    CLEAR     "  >
</form>
//เริ่มต้นจากการสร้างฟอร์มเพื่อรับค่า User และ Password  จากผู้ใช้งาน โค้ดก็ง่าย ๆ ดามนี้ครับ//
<form name="Myform" method="post"  action="index.php?submit=Login">
   User Name : <input name="user_name" type="text" size="15" maxlength="15">
   <br><br>
   Password  : <input name="user_password" type="password" size="15" maxlength="15">
   <br><br>
   <input type="submit" name="OK" value="   LOG - IN    "  >
   <input type="reset" name="OK2" value="    CLEAR     "  >
</form>
//อธิบายขั้นตอนและตัวแปร
action="index.php?submit=Login" เมื่อผู้ใช้กดปุ่ม Log-IN ให้ส่งข้อมูลไปที่หน้า index.php และส่งตัวแปร submit=Login ไปด้วย เพื่อตรวจเช็ค
name="user_name" เป็นชื่อของช่องกรอก User name
name="user_password" เป็นชื่อของช่องกรอก Use Password
เมื่อผู้ใช้กรอก User name  และ Password  แล้ว ทำการกดปุ่ม LOG-IN ระบบจะส่งค่าไปที่หน้า index.php โดยจะมีโค้ดไว้ตรวจสอบดังนี้ครับ//
<?php
header("Content-type: text/html; charset=utf-8");
                
if($_GET['submit']=="Login" ){ //ตรวจสอบว่าผู้ใช้ได้กดปุ่ม submit เพื่อทำการ Log-in หรือไม่?
   // เชื่อมต่อดาต้าเบส ********************
       $host = "127.0.0.1";
       $sys_user ="root";
       $sys_password = "123456";
      $database = "code-father-test";
      $link = mysql_connect($host,$sys_user,$sys_password) or die(mysql_error());
       mysql_select_db($database) or die(mysql_error());
      เชื่อมต่อดาต้าเบส ********************//
        $sql="Select * from user Where user_name='".$_POST['user_name']."' and user_password='".$_POST['user_password']."' "; // คำสั่ง sql สำหรับ query หรือ เลือกข้อมูลจากฐานข้อมูล
            $rstTemp=mysql_query($sql);

                    if(mysql_num_rows($rstTemp)==0){ // ถ้าข้อมูลที่ได้มาคือ 0 แถว (หรือไม่มีข้อมูลนั่นเอง) ให้แสดงข้อความแจ้งให้ผู้ใช้ทราบ การล๊อกอินผิดพลาด
?>
                            <script language="JavaScript">
                                alert("รหัสไม่ถูกต้อง หรือ ยังไม่มีอยู่ในระบบ กรุณาลองใหม่อีกครั้ง หรือติดต่อเจ้าหน้าที่ เพื่อดำเนินการต่อไป ......  ^_^ ");
                                window.location.href = "index.php";
                            </script>

                <?php }else{ // ถ้าข้อมูลที่ได้มาคือ 1 แถว (หรือมีข้อมูลนั่นเอง) ให้แสดงข้อความแจ้งให้ผู้ใช้ทราบ การล๊อกอินสำเร็จ  ?>

                            <script language="JavaScript">
                                alert("สวัสดีครับ คุณ <?=$user_name?> ยินดีต้อนรับเข้าสู่ระบบครับ");
                                window.location.href = "member.php"; //ส่ง user ไำปยังหน้าที่เราต้องการ
                            </script>
<?php
                    }
}
?>
//อธิบายกระบวนการทำงานของระบบกันสักนิดนะครับ
 หลังจากผุ้ใช้ส่งค่า User Pasword มา เราก็ทำการตรวจสอบก่อนว่าตัวแปร $_GET['submit']=="Login"
จากนั้นก็เป็นคำสั่งเชื่อมต่อฐานข้อมูล (อันนี้เป็นแบบ mysql ธรรมดานะครับ) สร้างโค้ดคำสั่ง sql สำหรับ query ข้อมูลจากฐานข้อมูล ตามเงื่อนไข User และ Password ที่เราต้องการ
 $sql="Select * from user Where user_name='".$_POST['user_name']."' and user_password='".$_POST['user_password']."' ";
ตรวจสอบค่าที่ได้จากฐานข้อมูล ด้วยคำสั่ง if(mysql_num_rows($rstTemp)==0){ หากมีค่า=0 (หรือไม่พบรายการใดๆ) แสดงว่า User หรือ Password ไม่ถูกต้อง หรือ User นี้ไม่มีอยู่ในระบบ ก็แสดง alert แจ้งผู้ใช้ทราบ
}else{หากพบข้อมูลก็แสดงผล แจ้งให้ผู้ใช้ทราบ ว่าล๊อกอินถูกต้อง หลักการทำงานของระบบล๊อกอินก็มีเท่านี้ครับ ไม่ได้ยุ่งยาก หรือ ซับซ้อนมากนัก
หากเข้าใจหลักการแล้ว เราก็สามารถเขียนโค้ด สั่งให้ระบบทำตามที่เราต้องการได้ เนื่องจากโค้ดตัวอย่างนี้ ทำไว้ในหน้าเดียวกัน จึงจำเป็นต้องมีการตรวจสอบเงื่อนไข หรือ ตัวแปร
ทำให้หลายคนที่ไม่เคยเขียนโค้ดรวมไว้ในหน้าเดียวกัน อาจจะดูแล้วงง ๆ ว่าทำไมไม่แยกหน้าไปเลย จะได้ดูง่าย ๆ
ส่วนตัวผมคิดว่า รวมไว้หน้าเดียวแบบนี้ ง่ายกว่า และสะดวกกว่า ไฟล์ไม่เยอะ เปิดไฟล์เดียว...จบ
 
ก็หวังว่าจะเป็นประโยชน์สำหรับมือใหม่ หรือ ผุ้ที่กำลังเริ่มต้นฝึกเขียนโปรแกรมด้วย PHP กันนะครับ//
