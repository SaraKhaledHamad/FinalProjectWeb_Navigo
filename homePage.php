<!-- هاد الملف الخاص ببرمجة صفحة انشاء حساب -->
<?php
session_start(); // عشان افتح جلسة عشان لمن المستخدم ينتقل بين صفخات المشروع يحفظ بياناته

include('database_infouser.php'); // استدعاء لملف الخاص بفحص الاتصال

if(isset($_POST['submit'])){ // كل الشغل والفحص والتأكد رح يصير بعد الضغط على زر الارسال

// * stripcslashes عشان احذف اي سلاشات وشرطات مائلة رح يكتبها المستخدم وهاد كله عشانالحماية من الاختراق
// يعني مثلا لو كتب المستخدم <html></html>
// رح يحذف السلاش عشان ما يقدر يخترق الصفحة والموقع
// * $_POST['username'] المسؤولة عن التقاط البيانات
// $_POST بيتم استخدامها لمن بكون الفورم نوعه بوست عشان تجمع كل البيانات يلي في الفورم
// 'username' لازم تكون نفس ال name يلي موجود داخل حقول الادخال
// وهكذا لكلة السر والايميل
$username=stripcslashes(strtolower(($_POST['username']))); // لازالة اي سلاش من الحقل لحماية البيانات من الاختراق
$email=stripcslashes($_POST['email']);
$password=stripcslashes($_POST['password']);

// حماية البيانات من الاختراق
// * htmlentities تحول اي رمز لنص
// * mysqli_real_escape_string يتدور على الرموز الخاصة وبتحط قبلها باك سلاش عشان يتعامل المتصفح 
// مع الرموز انها نصوص مش اوامر برمجة
$username=htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
$md5_pass=md5($password);

 $user_error="";
 $email_error="";
 $password_error="";
 $err_s=0;

//للتحقق من القيمة التي يتم ادخالها في اسم المستخدم هل موجودة مسبقا او لا
//* $check_user هاد متغير عشان رح اخزن فيه نتيجة الاستعلام يلي رح يتم عمله 
// رح بتم عمل استعلام على جدول اليوزر يلي في قاعدة البيانات بالذات عمود اسم المستخدم
// بعدها رح يصير يفحص هل اسم المستخدم يلي تم ادخاله الان مساوي لاسم موجود في الجدول قبل او لا 
//* $check_result هو يلي رح ياخد نتيجة الفحص
// mysqli_query هي يلي رح ترسل طلي الاستعلام واليحث لقاعدة البيانات 
// ورح تاخد قيمتين الاولى ملف الاتصال بقاعدة البيانات والتانية هب الامر يلي قبلها
//*$num_rows هاد عشان رح يرجع عدد الصفوف بلب الهم نفس اسم المستخدم
$check_user="SELECT * FROM `user` WHERE username='$username'";
$check_result=mysqli_query($conn,$check_user);
$num_rows=mysqli_num_rows($check_result);

$check_email="SELECT * FROM `user` WHERE email='$email'";
$check_result_email=mysqli_query($conn,$check_email);
$num_rows_email=mysqli_num_rows($check_result_email);

if($num_rows!=0){ // لو شاف في مستخدم اله هاد الاسم
    $user_error="This username exists, enter another one <br>"; // رسالة رح تظهر للمشتحدم لو كتب اشي موجود
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}elseif(($num_rows==0)&&($num_rows_email!=0)){
    $email_error="This email exists, enter another one <br>"; // رسالة رح تظهر للمشتحدم لو كتب اشي موجود
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا

}

//للتحقق من القيمة التي يتم ادخالها في اسم المستخدم
if(empty($username)){ // للتحقق اذا ما كتب اشي
    $user_error="please enter username <br>"; // رسالة رح تظهر للمشتحدم لو مكتبش اشي
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}elseif(strlen($username)<6){
    $user_error="please enter username greater than 6 <br>"; // رسالة رح تظهر للمشتحدم لو كان الطول اقل من 6 
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}elseif(filter_var($username,FILTER_VALIDATE_INT)){
    $user_error="please enter valid username not number <br>"; // رسالة رح تظهر للمشتحدم لو كتب ارقام 
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}


//للتحقق من القيمة التي يتم ادخالها في الايميل 

if(empty($email)){ // للتحقق اذا ما كتب اشي
    $email_error="please enter email <br>"; // رسالة رح تظهر للمشتحدم لو مكتبش اشي
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_error="please enter valid email  <br>"; // رسالة رح تظهر للمشتحدم لو كتب ارقام 
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
}


//للتحقق من القيمة التي يتم ادخالها في كلمة السر 

if(empty($password)){ // للتحقق اذا ما كتب اشي
    $password_error="please enter password <br>"; // رسالة رح تظهر للمشتحدم لو مكتبش اشي
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
    include('htmlhomePage.php');
}elseif(strlen($password)<6){
    $password_error="please enter password greater than 6 <br>"; // رسالة رح تظهر للمشتحدم لو كان الطول اقل من 6 
    $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
    include('htmlhomePage.php');
}
else{
  if(($err_s==0)&&($num_rows==0)&&($num_rows_email==0)){
    //* هاد كله لو ما في ولا علطة يعني كل القيم اللي دخلهم صح وفش تكرار للايميل و الاسم
    // ضيف على جدول اليوزر في الاعمدة المحددة القيم يلي دخلهم المستخدم
    $sql="INSERT INTO user(username,email,password,md5_pass) VALUES('$username','$email','$password','$md5_pass')";
    mysqli_query($conn,$sql);

    // جلب الـ id الجديد
    //* هان رح يتم اخد قيمة الايدي تاعت المستخدم يلي سجل جديد من قاعد البيانات وتخزينها في متغير
    $id = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $id;      
    $_SESSION['username'] = $username;    
    $_SESSION['email'] = $email;          
    header('location:specificexamePage.php'); // انتقل لصفحة الامتحان
  }else{
    include('htmlhomePage.php'); // لو في خطأ ضلك في الصفحة

  }

}

}
if(isset($_POST['login'])){
     header('Location:html_loginPage.php');
   
}

?>
