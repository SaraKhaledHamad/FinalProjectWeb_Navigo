<!--هاد عشان صفحة تسجبل دخول لمستخدم جديد -->


<!DOCTYPE html>
<html lang="en">
<head>
   <!-- 
هاد الميتا من خلالها رح اساعد انه الموقع رح يظهر في نتائج البحث
    -->
    <meta charset="UTF-8"name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="Take a skill assessment test, visualize your learning journey with an interactive roadmap, and access curated guides for every step. Stop guessing, start learning." >
    <meta name="keywords" content="Skill Assessment, Skill Mapping,Competency Test,Skill Level Test,Professional Development,Learning Roadmap,Learning Path,Step-by-Step Guide,Educational Resources,Tech Roadmap,Programming Path,Web Development Roadmap, Mobile App Development Path, Cybersecurity Guide, Networking Skills Test, Database Management Learning, Operating Systems Course, AI and Machine Learning Roadmap, Ethical Hacking Path, Data base Roadmap" >
     <meta http-equiv="author" content="Sara Hamad & Yara Hamad" >

<!-- هان ربط الصفحة بكود css الخاص فيها -->
    <link href="style_homePage.css" type="text/css" rel="stylesheet">
    <title> Navigo-Create an account </title>
</head>

<body id="body">
  <!-- هان لما اضغط على زر السبمينت رح يبعت البيانات للصفحة الموجودة في الاكشن -->

    <form  id="registration" action="homePage.php" method="POST">
    <!--انشاء حساب جديد -->
     <div id="HomePage">  
     <p id="newaccount">Create a new account</p>
     <p id="information">Please enter this information</p>
    <!-- هان عشان بدي احكيله اذا دخل اشي من الاخطاء تاعت اسم المستخدم يلي خددناها قي صفحة البرمجة-->
     <?php 
       if(isset($user_error)){
          echo $user_error; // الرسالة يلي رح بتم اظهارها 
       }
     ?>
     <input type="text" id="username" placeholder="username" name="username" >
     <br><br>
    <!-- هان عشان بدي احكيله اذا دخل اشي من الاخطاء تاعت الايميل يلي خددناها قي صفحة البرمجة-->
     <?php 
       if(isset($email_error)){
          echo $email_error;// الرسالة يلي رح بتم اظهارها  
       }
     ?>
     <input type="text" id="email" placeholder="email" name="email">
     <br><br>
     <!-- هان عشان بدي احكيله اذا دخل اشي من الاخطاء تاعت كلمة السر يلي خددناها قي صفحة البرمجة-->
     <?php 
       if(isset($password_error)){
          echo $password_error;// الرسالة يلي رح بتم اظهارها  
       }
     ?>
    <input type="password" id="password" placeholder="password" name="password">
    <br><br>
    <button type="submit" id="sub" name="submit">submit</button>
    <br><br>
    <h5  id="account">have an account?</h5>
    <a href="html_loginPage.php" id="login" name="login">Login</a>
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