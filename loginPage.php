<!--  هاد الملف الخاص ببرمجة صفحة دخول الى حساب قديم-->
<?php
session_start();// عشان افتح جلسة عشان لمن المستخدم ينتقل بين صفخات المشروع يحفظ بياناته

include('database_infouser.php');// استدعاء لملف الخاص بفحص الاتصال

//* لمن المستخدم يدخل الاسم وكلمة السر
// * stripcslashes عشان احذف اي سلاشات وشرطات مائلة رح يكتبها المستخدم وهاد كله عشانالحماية من الاختراق
// يعني مثلا لو كتب المستخدم <html></html>
// رح يحذف السلاش عشان ما يقدر يخترق الصفحة والموقع
// * $_POST['username'] المسؤولة عن التقاط البيانات
// $_POST بيتم استخدامها لمن بكون الفورم نوعه بوست عشان تجمع كل البيانات يلي في الفورم
// 'username' لازم تكون نفس ال name يلي موجود داخل حقول الادخال
// وهكذا لكلمة السر 

if(isset($_POST['username']) && isset($_POST['password'])){
    $username=stripcslashes(strtolower(($_POST['username']))); // لازالة اي سلاش من الحقل لحماية البيانات من الاختراق
    $password=stripcslashes($_POST['password']);
    $username=filter_input(INPUT_POST,'username');
    $md5_pass=md5($_POST['password']);

    // حماية البيانات من الاختراق
    // حماية البيانات من الاختراق
// * htmlentities تحول اي رمز لنص
// * mysqli_real_escape_string يتدور على الرموز الخاصة وبتحط قبلها باك سلاش عشان يتعامل المتصفح 
// مع الرموز انها نصوص مش اوامر برمجة
    $username=htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));

    //للتحقق من القيمة التي يتم ادخالها في اسم المستخدم
    if(empty($username)){ // للتحقق اذا ما كتب اشي
        $user_error="please enter username <br>"; // رسالة رح تظهر للمشتحدم لو مكتبش اشي
        $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
    }

    //للتحقق من القيمة التي يتم ادخالها في كلمة السر 
    if(empty($password)){ // للتحقق اذا ما كتب اشي
        $password_error="please enter password <br>"; // رسالة رح تظهر للمشتحدم لو مكتبش اشي
        $err_s=1;//عشان لو كان الاشي فاضي يعني خطأ رح بعطي لهاد المتغير قيمة واحد عشان لقدام رح احكي اذا المتغير هاد قيمته مش واحد يعني كل اشي تم ادخاله كان صح نفذ كذا كذا
        include('html_loginPage.php');
    }
}

//التحقق اذا ما كان في خطأ 
// هاد الكود رح يصير لمن يدخل المستخدم قيمة قي اسم المستخدم و في كلمة المرور فرح ناخد هاي القيم و نفحص عنها في قاعدة البيانات اذا موجودة او لا 
if(isset($_POST['username']) && !isset($err_s)){ // أضفت شرط التأكد أن الفورم أُرسل
    // هان عشان بدي احدد من عمود ال id , username من الجدول user يلي في قاعدة البيانات
    // التعديل الوحيد هنا: أضفنا id في الـ SELECT لكي نستطيع استخدامه في السيشين
    $sql = "SELECT id, username FROM user WHERE username='$username' AND password='$password'"; 
    $result = mysqli_query($conn, $sql);// رح تتخزن على شكل مصفوفة 
    //*mysqli_fetch_assoc يلي رح استقبل فيها النتائج معلومات المستحدم اذا كان موجود
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id']; // السطر الجديد والمهم لربط الجداول
        
        // هاي الصفحة يلي بدنا نروح الها لو كانت البيانات صح
        header('Location:roadmap.php'); 
        exit(); // هاد معناه خلص انهاء للجلسة
    }else{
         $user_error=" username or password is wrong! <br>"; // رسالة رح تظهر للمشتحدم لو كتب اشي غلط
         include('html_loginPage.php');
         exit(); 
    }
} else {
    // لو لم يتم إرسال البيانات (فتح الصفحة لأول مرة) 
    if(!isset($_POST['username'])) {
        include('html_loginPage.php');
    }
}
?>

