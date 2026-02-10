<!-- هاد عشان صفحة تسجبل دخول لمستخدم موجود مسبقا -->


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
هاد الميتا من خلالها رح اساعد انه  الموقع رح تظهر في نتائج البحث
    -->
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" >   
    <meta name="description" content="Take a skill assessment test, visualize your learning journey with an interactive roadmap, and access curated guides for every step. Stop guessing, start learning." >
    <meta name="keywords" content="Skill Assessment, Skill Mapping,Competency Test,Skill Level Test,Professional Development,Learning Roadmap,Learning Path,Step-by-Step Guide,Educational Resources,Tech Roadmap,Programming Path,Web Development Roadmap, Mobile App Development Path, Cybersecurity Guide, Networking Skills Test, Database Management Learning, Operating Systems Course, AI and Machine Learning Roadmap, Ethical Hacking Path, Data base Roadmap" >
    <meta http-equiv="author" content="Sara Hamad & Yara Hamad" >

    <link href="style_homePage.css" type="text/css" rel="stylesheet">
    <title> Navigo-LogIn  </title>
</head>
<body id="body">
<!-- هان لما اضغط على زر السبمينت رح يبعت البيانات للصفحة الموجودة في الاكشن -->
    <form  id="LogIn" action="loginPage.php" method="POST">
    <!--صفحة الدخول لحساب موجود-->
     <div id="loginPage">  
     <p id="logaccount">Login</p>
     <p id="information">Please enter this information</p>
     <?php  
    //  هاد رح تخلي رسائل الخطا الي تم كتابتها في  البرمجة تظهر فوق حقل الادخال
       if(isset($user_error)){
          echo $user_error; // الرسالة يلي رح بتم اظهارها 
       }
     ?>
     <input type="text" id="username_log" placeholder="username" name="username">
     <br><br>
     <?php 
         //  هاد رح تخلي رسائل الخطا الي تم كتابتها في  البرمجة تظهر فوق حقل الادخال

       if(isset($password_error)){
          echo $password_error;// الرسالة يلي رح بتم اظهارها  
       }
     ?>
    <input type="password" id="password_log" placeholder="password" name="password">
    <br><br>
    <button type="submit" id="login_log" name="login">Login</button>
    </div>
    </form>


<footer class="simple-footer">
    <div class="footer-container">
        <p id="foot_statment"> Start your journey from where you are, and we will chart the course for you.</p>
        <p>&copy; 2026 Navigo. All rights reserved.</p>
        <div class="footer-links">   
            <a href="mailto:navigo@gmail.com">call with us</a>
        </div>
    </div>
</footer>
</body>

</html>