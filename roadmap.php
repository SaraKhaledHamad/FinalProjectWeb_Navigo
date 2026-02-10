<!-- هاد الملف الخاص ببرمجة صفحة الخريطة -->

<?php
session_start();
include('database_infouser.php');
//* اذا حاول يدخل على الرود ماب من دون تسجيل دخول
//  التحقق من الجلسة (استخدام user_id كما في صفحة إنشاء الحساب)
if (!isset($_SESSION['user_id'])) {
    header("Location: loginPage.php");  // رح يبعته على ضفحة تسجبل دخول
    exit;
}

// تعريف المستخدم الحالي
$current_user = $_SESSION['user_id']; 

// لو ضغط على زر ارسال الامتحان
if (isset($_POST['submitExam'])) {
    $total = 30; // عدد الاسئلة
    $field = $_POST['field'] ?? ''; // تخزين المجال يلي تم اختياره 
    $score = 0; // نتيجة المستخدم في الامتحان
    //* رح يصير تصحيح الامتحان بسكل الكتروني
    //*foreach عشان تمر على كل عنصر في المصفوفة
    //$_POST هي المصفوفة
    //$key تاعت كل سؤالname هي قيمة ال 
    //$value هي قيمة السؤال يعني صخ او خطأ
    // * رح يتم فحص اذا القيمة صح يعني المستخدم جاوب السؤال صح زود على متغير السكور واحد
    foreach ($_POST as $key => $value) {
        if ($value == "correct") $score++;
    }
    $percent = ($score / $total) * 100; // بعد ما يشوف كل الاسئلة وبحسب نتيجتها
    
    // تحديد المستوى
    if ($percent >= 80) $level = "Advanced";
    elseif ($percent >= 50) $level = "Intermediate";
    else $level = "Beginner";

    // * هاد عشان يشوف هل المستخدم عنده خريطة للمجال يلي اختاره وقدم الامتحان عليه قبل هيك
    //*$checkSql  يبحث في قاعدة البيانات في حدول نتاسج الامتحان في عمود الايدي عن الايدي تاع المستخدم يلي موجود في جدول المستخدمين و عن المجال يلي اختاره وتخزن في جدزل نتائج الامتحان
    //*   عشان افصل البيانات عن الكود عشان الحماية$stmt رح احضر الاستعلام واحطه في 
    //*$stmt->bind_param  عشان اربط القيم تاعت المستخدم بدل علامة الاستفهام عشان عندي نوعين من البيانات رح احط is
    //$current_user هاد عشان اخد الايدي
    // $field هاد عشان اخد المجال
    $checkSql = "SELECT id FROM exam_results WHERE user_id = ? AND field = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("is", $current_user, $field);
    $stmt->execute(); // عشان انفذ الاستعلام هلحين 
    $res = $stmt->get_result(); // نتيجة الاستعلام رح بتم تحزبنها هان
// * نتبجة الاستعلام اما  اكتر من صفر او صفر 
// صقر معناها انه المستخدم اول  مرة يقدم امتحام في هاد المجال فرح اعرض الخريطة
// اكتر من صفر يعني المستخدم قدم امتحان في هاد المجال قبل هيك فرح يعمل تحديث على الخريطة السابقة
    if ($res->num_rows > 0) { // هاد لو المستخدم كان مقدم قبل هيك الامتحان لهاد المجال
        // تحديث للمستخدم الحالي
        //* استعلام تحديث على جدول النتائج رح احط فيم السكور والنسبة والمستوى على حسب الايدي والمجال
        $updateSql = "UPDATE exam_results SET score=?, percent=?, level=? WHERE user_id=? AND field=?";
        $stmtU = $conn->prepare($updateSql);// تحضير الاستعلام
        //*idiss اختصار لانواع البيانات يلي رح احطها مكان علامات الاستفهام
        $stmtU->bind_param("idiss", $score, $percent, $level, $current_user, $field);
        $stmtU->execute(); // نفذ الاستعلام
    } else { // هان لو المستخدم مش مفدم امتحان في هاد المجال قبل هيك
        // إدخال جديد للمستخدم الحالي
        //*  استعلام اضافة هلى جدول النتائج على كل الاعمدة بالقيم يلي طلعت بعد ا قدم الامتحان
        $insertSql = "INSERT INTO exam_results (user_id, field, score, percent, level) VALUES (?, ?, ?, ?, ?)";
        $stmtI = $conn->prepare($insertSql); // تحضير
        //*isids اختصار لانواع البيانات يلي رح احطها مكان علامات الاستفهام
        $stmtI->bind_param("isids", $current_user, $field, $score, $percent, $level);
        $stmtI->execute(); // نفذ الاستعلام
    }
    
    // إعادة توجيه لنفس الصفحة لعرض النتائج المحدثة
    header("Location: roadmap.php");
    exit;
}

//*جلب البيانات من قاعدة البيانات للعرض
//* رح اجيب النتائج النتائج للاعمدة السكور والمجال والمستوى و النسبة من جدول النتائج لعمود اللايدي تاعت اليوزر عشان المستخدم يشوف نتيجته بس
//*ORDER BY id DESC" عشان ارتب انه الامتحان يلي بيقدمه المستخدم بالاخر يكون صفه في قاعدة البيانات بالاول
$sql = "SELECT field, score, level, percent FROM exam_results WHERE user_id = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql); // تخضير
$stmt->bind_param("i", $current_user);
$stmt->execute();// نفذ
//* $all_results عشان اخزن المعلومات للميتخدم لو قدم اكتر من امتحان ورح بتم استخدامه في كود عرض الخربطة عشان يعرض كل وحدة لحالها
$all_results = $stmt->get_result();

//* $roadmaps مصفوفة الخرائط
$roadmaps = [
    'AI' => [
        'Beginner'     => ['Python Basics', 'Math Foundations', 'Data Handling','Data Visualization','ML Concept'],
        'Intermediate' => ['Classical ML','Feature Engneering', 'Model Evaluation', 'Data Managment'],
        'Advanced'     => ['Deep Learning Fundamentals', 'Deep Learning Framework', 'Computer Vision','NLP']
    ],
    'Web' => [
        'Beginner'     => ['HTML Fundamentals', 'CSS Styling', 'JS Fundamentals','Php Fundamentals'],
        'Intermediate' => ['Fronted FrameWork' ,'Backend Basics','DataBase','Authentication'],
        'Advanced'     => ['Full Stack Development', 'Security', 'Performance Optimization','Testing','DevOps of web']
    ],
    'Mobile' => [
        'Beginner'     => ['Programming Language Basics', 'Mobile App Basics','Local Storage'],
        'Intermediate' => ['State Managment', 'APIs Integration', 'Authentication','DataBase','App Architecture'],
        'Advanced'     => ['Advanced UI/UX', 'Performance Optimization', 'Security','Testing','App Deployment']
    ],
    'Cyber' => [
        'Beginner'     => ['IT and Networking Basics', 'Linux Fundamentals', 'Security Fundamentals','Introduction to Cryptography'],
        'Intermediate' => ['Ethical Hacking Basics', 'Penetration Testing Tool', 'Web Security','System Security','Vulnerability Assesment'],
        'Advanced'     => ['Advanced Penetration Testing', 'Malware Analysis', 'Reverse Engneering','Digital Forensics','Red/Blue Team Security']
    ],
    'Network' => [
        'Beginner'     => ['Networking Basics', 'OSI and TCP/IP', 'IP Addresing and Subnetting','Networking Devices','Network Services and Ports'],
        'Intermediate' => ['Routing & Switching', 'Wireliss Network', 'Network Monitoring and Tools','VPN and Remote Access','Troubleshooting'],
        'Advanced'     => ['Advanced Routing & Switching', 'Network Security', 'Cloud Networking','QoS and Optimization','Enterprise Networking','Network Automation']
    ],
    'OS' => [
        'Beginner'     => ['OS Basics', 'Computer Architecture Basics', 'File System','Process and Threads','CommandLine Basics'],
        'Intermediate' => ['Process Managment', 'Memory Managment', 'Storge and File System','Input/Output Managment','Scripting and Automation'],
        'Advanced'     => ['Advanced Process Managment', 'Advanced Memory Managment', 'Kernal and OS Internal','Security and Protoction','Virtualization']
    ],
    'DB' => [
        'Beginner'     => ['DataBase Basics', 'Sql Basics', 'Data Modiling','Constraints and Indexes','Tool Setup'],
        'Intermediate' => ['Advanced Sql','DataBase Design','NoSql DataBase', 'Performance and Optemization', 'Backup and Recovery'],
        'Advanced'     => ['Advanced Transactions', 'DataBase Security', 'Distrebuted DataBase ','Big Data and Analytics','DataBase Administration','Cloud DataBase','Advanced Analytics']
    ],
];
//* $colors مصفوفة الالوان عشان كل مجال يطلع الخريطة لون غير عن المجال التاني
$colors = [
    'AI' => '#FF5722', 'Network' => '#03A9F4', 'Mobile' => '#4CAF50',
    'Web' => '#9C27B0', 'Cyber' => '#E91E63', 'DB' => '#795548', 'OS' => '#607D8B'
];
?>
<!-- لصفحة الرود مابhtml كود ال  -->
<!DOCTYPE html>
<html lang="en">
<head>
       <!-- 
هاد الميتا من خلالها رح اساعد انه الموقع رح يظهر في نتائج البحث
    -->
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Take a skill assessment test, visualize your learning journey with an interactive roadmap, and access curated guides for every step. Stop guessing, start learning." >
    <meta name="keywords" content="Skill Assessment, Skill Mapping,Competency Test,Skill Level Test,Professional Development,Learning Roadmap,Learning Path,Step-by-Step Guide,Educational Resources,Tech Roadmap,Programming Path,Web Development Roadmap, Mobile App Development Path, Cybersecurity Guide, Networking Skills Test, Database Management Learning, Operating Systems Course, AI and Machine Learning Roadmap, Ethical Hacking Path, Data base Roadmap" >
    <meta name="robots" content="nofollow" >
    <meta http-equiv="author" content="Sara Hamad & Yara Hamad" >

    <link href="roadmap.css" type="text/css" rel="stylesheet">
    <title>Navigo-Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<body>

<h1>My Learning Dashboard</h1>
<!-- كود عرض النتائج والخريطة -->
<?php
// * هان رح يشوف هل هاد المستخدم اله نتائج قبل ولا لا  
if ($all_results->num_rows > 0): // هان لو دخل من صفحة تسجيل الدخول مباشرة على الرود ماب
    // فلو كان عدد الصفوف اكتر من صفر معناها انه كاين مقدم امتحانات قبل 
    while($row = $all_results->fetch_assoc()):  // هاد حلقة رح تلف على كل المجالات عشان تشوف هل المستخدم قدم فيها او لا
        //* هان رح باخد المستوى والمجال م مصفوفة يلي كانت ترجع كل المعلومات عن نتيجة الاختبار
        // وتم عمل هاد عشان انه اخدد للمستخدم هاد يلي بدي اجيبله الرود مش كل المستخدمين ومش كل المجالات للمستخدم الواحد
        $field = trim($row['field']); 
        $level = trim($row['level']);
        
        // لو صار مشكلة وتخزن في المستوب قبمة صفر
        if ($level === "0" || empty($level)) { // هان بده يشوف اذا في عمود المستوى كان صفر او فاضي
        // رح يرجع يحدد المستوى حسب النسبة يلي رح ياخدها من المصفوفة يلي فيها بيانات الاختبار تاعت المستخدم اللي مسجل دخول
            $p = $row['percent']; 
            if ($p >= 80) $level = "Advanced";
            elseif ($p >= 50) $level = "Intermediate";
            else $level = "Beginner";
        }
//* $steps متغير رح اخزن فيه المجال والمستوى والاشياء المطلوبة من المصفوفة تاعت الرود ماب 
// لو ما لقى اشي رح يعطي مصفوفة فاضية  
// * activeColor هاي عشان يجيب اللون الخاص يالمجال تاع المستخدم الحالي من مصفوفة الالوان    
        $steps = isset($roadmaps[$field][$level]) ? $roadmaps[$field][$level] : [];
        $activeColor = isset($colors[$field]) ? $colors[$field] : '#667eea';
?>
    <div class="container">
        <!-- هان رح يطبع فوق كل خريطة اسم خريطة المجال و رح يجيب المجال من قاعدة البيانات ورح يتغير اسم المجال حسب الامتحان-->
        <!--  htmlspecialchars استخدمت هاد عشان حماية البيانات -->
        <h2><?php echo htmlspecialchars($field); ?> Roadmap</h2>
        <div class="stats-container">
            <!-- هان رح يطبع المستوى الي رح يجيبه من قاعدة البيانات  -->
            <div class="stat-item"><b>Level:</b> <?php echo htmlspecialchars($level); ?></div>
            <!-- هان رح يطبع النتيجة من 30 و رخ يجيبها من مصفوفة ال row -->
            <div class="stat-item"><b>Score:</b> <?php echo $row['score']; ?>/30</div>
            <!-- هان رح يطبع النسبة من 100 و رخ يجيبها من مصفوفة ال row -->
            <div class="stat-item"><b>Result:</b> <?php echo round($row['percent'], 1); ?>%</div>
        </div>

        <?php if (!empty($steps)): ?>
            <!-- هان تم حساب مساخة الرسمة تاعت الخريطة -->
             <!-- العرض ثابت على 900 اما الطول بيتغير حسب المسار والدروس عن طريق معادلة 
              بيتم جمه 150 بكسل مع حاصل ضرب الخطوات يعني الدروس ب 160 يكسل وكل هاد عشان الرسمة تتمدد مع تغير
              خجم الدروس و طولها وعددها -->
            <svg viewBox="0 0 900  <?php echo 150 + (count($steps) * 160); ?>">
                <!--  بدل كل مرة بدي استخدم السهم اروح انشأه defs عملت هات -->
                <defs> 
                    <!--  pathرسم راس السهم يعني مثلث صغير عن طريق 
                      markerWidth="10" markerHeight="10"هاد رح تحدد مساحة المربع الي رخ ارسم فيه راس السهم
                        refX="5" refY="5"احداثيات التقاء راس السهم مع الخط خليته 5 عشان يكوت بالنص
                         orient="auto" هاد وين ما يتجه الخط يتجه السهم معه-->
                    <marker id="arrow_<?php echo str_replace(' ', '_', $field); ?>" markerWidth="10" markerHeight="10" refX="5" refY="5" orient="auto">
                        <!--d="M0,0 L10,5 L0,10 Z" fill="#444" هاد تعليمات للقلم عشان الررسم
                     M0,0 هان رح احكيله انه ضع القلم عند (0,0) وهي الزاوية اليسرى الي فوق في المربع الي رح أرسم فيه راس السهم و هي نقطة البداية للرسم 
                      L10,5 هاد يعني ارسم خط من مكانك للنقطة (10,5) و هاد النقطة رح تكون راس المثلث
                       L0,10 هاد يعني ارسم خط من النقطة الي فبل الي هي راس المثلث للنقطة (0,10) 
                       Z هاد بتحكي للمتصفح انه يغلق الرسمة بشكلل تلقائي  يعني يعمل خط من نقطة النهاية للبداية -->
                        <path d="M0,0 L10,5 L0,10 Z" fill="#444"/>
                    </marker>
                </defs>
                <?php
                //$y = 50 هاد نقطة البداية العمودية  هان المربع رح يبدا من عند 50
                // $x = 300 هاد نقطة البداية من محور السينات ف رح تنزاح نقطة البداية و رخ تصير من عند (300,50) 
                // $height = 80 $width = 300 هاد ابعاد المستطيل 
                // $gap = 80 هاد المسافة بين المربعات
                $y = 50; $x = 300; $height = 80; $width = 300; $gap = 80;  
                // هان رخ تلف على القائمة الي فيها اسماء الدروس الي في كل مستوى 
                // $index هو ترتيب الدرس 
                // $step اسم الدرس 
                foreach ($steps as $index => $step):
                    // الحين كل اسم درس في مربع فعشان اقدر اضغط على المربع و يحولني لصفخة الروابط
                    // urlencode عشان يقدر المتصفح يتعامل مع الاسم على انه رابط 
                    echo '<a href="resources.php?field='.urlencode($field).'&level='.urlencode($level).'&step='.urlencode($step).'">';
                    // هان يعني رح اخلي النص و المستطيل كقروب واحد
                    echo '<g class="box">';
                    // هان رخ ارسم المستطيلات 
                    // x ,y هاد احداثيات نقطة بداية رسم المستطييل 
                    // width, height هاد ابعاد المستطيل   
                    //   rx="20" هاد عشان اخلي زوايا المستطيل دائرية مش قائمة
                    // fill لتلوين المستطيلات باللون المخصص لكل مجال 
                    echo '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" rx="20" fill="'.$activeColor.'"/>';
                    //  هان رح اكتب الن داخل المستطيل 
                    // x="'.($x + $width/2) هاد احداثيات النص و عشان احط النص في المنتصف  تم عمل معادلة الي هي نقطة بداية المستطيل + نصف طوله
                    //text-anchor="middle هاد بخلي النص في المنتصف 
                    echo '<text x="'.($x + $width/2).'" y="'.($y + $height/2 + 6).'" fill="white" font-size="17" text-anchor="middle">'.htmlspecialchars($step).'</text>';
                    echo '</g></a>';
                    //  اقل من محتوى القائمة الي تحتوي علىى الدروس -1 يضل يرسم اسهمindex هان رح يفحص اذا ال 
                    if ($index < count($steps) - 1) {
                        // $lineY1 = $y + $height هاد احداثيات رسم الخط تاع السهم و هو عبارة عم احداثيات المستطيل + طوله يعني من الاحر رح يرسم الخط ملتصق بخافة اللمستطيل من تحت 
                        // $lineY2 = $y + $height + $gap - 10 هاد وين نهاية الخط رح تكون عيارة عن المسافة بين كل مستطيل و التاني -10
                        $lineY1 = $y + $height; $lineY2 = $y + $height + $gap - 10;
                        // هان رخ ارسم الخط
                        // x1,x2 هان الخط تاع السهم يكون في نصف المستطيل
                        //  marker-end هاد رح يخط راس السهم في اخر الخط
                        echo '<line x1="'.($x + $width/2).'" y1="'.$lineY1.'" x2="'.($x + $width/2).'" y2="'.$lineY2.'" stroke="#888" stroke-width="3" marker-end="url(#arrow_'.str_replace(' ', '_', $field).')" />';
                    }
                    //  عشان يتم رسم المربعات و الاسهم في المكان الجديدy هان بتعمل تحديث لفيمة ال 
                    // الي هو عبارة عن القيمة الي قبل + طول المربع + المسافة بين المربع
                    $y += $height + $gap;
                    // لانهاء اللفات
                endforeach;
                ?>
            </svg>
            <!-- هان عشان لو ما كان في دروس داخل المستوى يلي طلع للمستخدم رح بطبعله الرسالة -->
        <?php else: ?>
            <p id="Nostepsfound">No steps found for <?php echo "$field ($level)"; ?>.</p>
        <?php endif; ?> <!-- svgانهاء البلوك الخاص برسم -->
    </div>
    <!-- هان عشان لو المستخدم راح على الرود ماب قبل ما يجتاز اي امتحان -->
<?php 
// هان رح انهي اللوب الي كانت تلف على نتائج المستخدم
    endwhile; 
    // هاد اذا بحثنا و لقينا انه المستخدم م قدم الامتحان رح يطبق الكود الي تحت اللي هو جملة الطباعة
else: 
?>
    <div class="container" style="text-align: center; padding: 50px;">
        <h2>You haven't taken any exams yet!</h2>
        <p id="completeanexam">Please complete an exam to generate your personalized learning roadmap.</p>
    </div>
<?php endif; ?>
<!-- هاد الزر عشان يروح على صفحة الاختبار-->
<div class="btn-container"> 
    <a href="specificexamePage.php" class="btn-another">Take Exam</a> 
</div>


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