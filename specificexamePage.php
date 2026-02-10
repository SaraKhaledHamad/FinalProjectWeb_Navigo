<!-- هاد الملف الخاص ببرمجة صفحة الامتحان -->
<?php
session_start();// عشان افتح جلسة عشان لمن المستخدم ينتقل بين صفخات المشروع يحفظ بياناته
//* لو دخل المستخدم المجال رح باخده ويخزنه في السيرفر وبعدين يحوله على صفحة الرود ماب
if(isset($_POST['field'])){
    $_SESSION['field'] = $_POST['field'];
    
    header("Location: roadmap.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <!-- 
هاد الميتا من خلالها رح اساعد انه  الموقع رح تظهر في نتائج البحث
    -->
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Take a skill assessment test, visualize your learning journey with an interactive roadmap, and access curated guides for every step. Stop guessing, start learning." >
    <meta name="keywords" content="Skill Assessment, Skill Mapping,Competency Test,Skill Level Test,Professional Development,Learning Roadmap,Learning Path,Step-by-Step Guide,Educational Resources,Tech Roadmap,Programming Path,Web Development Roadmap, Mobile App Development Path, Cybersecurity Guide, Networking Skills Test, Database Management Learning, Operating Systems Course, AI and Machine Learning Roadmap, Ethical Hacking Path, Data base Roadmap" >
    <meta name="robots" content="nofollow" >
    <meta http-equiv="author" content="Sara Hamad & Yara Hamad" >

    
    <link href="style_examPages.css" type="text/css" rel="stylesheet">
    <title> Navigo-Exam </title>
</head>
<body id="body">

<h1 id="heading">Specific Exam</h1>
<form id="fieldForm">
   <P id="choice_statment">Choose the area in which you want to determine your level</P> 
  <input type="radio" name="field" value="AI"> Artificial intelligence and machine learning<br>
  <input type="radio" name="field" value="Web"> Web programming<br>
  <input type="radio" name="field" value="Mobile"> Mobile application programming<br>
  <input type="radio" name="field" value="Cyber"> Cybersecurity<br>
  <input type="radio" name="field" value="Network"> Networks<br>
  <input type="radio" name="field" value="OS"> Operating systems<br>
  <input type="radio" name="field" value="DB"> databases<br>
</form>

<section id="exame_section">
<!-- قسم الذكاء الاصطناعي -->
<div id="AI" class="exam">
  <h3>AI and ML Exam</h3>
  <p>
    <!-- هان لما اضغط على زر السبمينت رح يبعت البيانات للصفحة الموجودة في الاكشن -->
<form id="aiExam"action="roadmap.php" method="POST">
<input type="hidden" name="field" value="AI">
<div class="question">
<p>1. True or False: Supervised learning requires labeled data.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>
<div class="question">
<p>2. True or False: AI stands for Artificial Intelligence.</p>
<input type="radio" name="q2" value="correct"> True<br>
<input type="radio" name="q2" value="wrong"> False
</div>

<div class="question">
<p>3. Which algorithm is used for regression problems?</p>
<input type="radio" name="q3" value="correct"> Linear Regression<br>
<input type="radio" name="q3" value="wrong"> K-Means<br>
<input type="radio" name="q3" value="wrong"> Decision Tree
</div>

<div class="question">
<p>4. True or False: Neural networks are inspired by the human brain.</p>
<input type="radio" name="q4" value="correct"> True<br>
<input type="radio" name="q4" value="wrong"> False
</div>

<div class="question">
<p>5. Which type of data is used in supervised learning?</p>
<input type="radio" name="q5" value="correct"> Labeled data<br>
<input type="radio" name="q5" value="wrong"> Unlabeled data<br>
<input type="radio" name="q5" value="wrong"> Random data
</div>

<div class="question">
<p>6. True or False: Classification problems predict categories.</p>
<input type="radio" name="q6" value="correct"> True<br>
<input type="radio" name="q6" value="wrong"> False
</div>

<div class="question">
<p>7. Which of these is used for clustering?</p>
<input type="radio" name="q7" value="correct"> K-Means<br>
<input type="radio" name="q7" value="wrong"> Linear Regression<br>
<input type="radio" name="q7" value="wrong"> Decision Tree
</div>

<div class="question">
<p>8. True or False: AI can only make decisions based on rules.</p>
<input type="radio" name="q8" value="wrong"> True<br>
<input type="radio" name="q8" value="correct"> False
</div>

<div class="question">
<p>9. What is the main goal of AI?</p>
<input type="radio" name="q9" value="correct"> Simulate human intelligence<br>
<input type="radio" name="q9" value="wrong"> Store large data<br>
<input type="radio" name="q9" value="wrong"> Build websites
</div>

<div class="question">
<p>10. True or False: Reinforcement learning uses rewards and penalties.</p>
<input type="radio" name="q10" value="correct"> True<br>
<input type="radio" name="q10" value="wrong"> False
</div>

<div class="question">
<p>11. Which method is commonly used for predicting numeric values?</p>
<input type="radio" name="q11" value="correct"> Regression<br>
<input type="radio" name="q11" value="wrong"> Classification<br>
<input type="radio" name="q11" value="wrong"> Clustering
</div>

<div class="question">
<p>12. True or False: PCA is used to reduce data dimensionality.</p>
<input type="radio" name="q12" value="correct"> True<br>
<input type="radio" name="q12" value="wrong"> False
</div>

<div class="question">
<p>13. Which of these is an activation function?</p>
<input type="radio" name="q13" value="correct"> Sigmoid<br>
<input type="radio" name="q13" value="wrong"> CSV<br>
<input type="radio" name="q13" value="wrong"> SQL
</div>

<div class="question">
<p>14. True or False: Overfitting occurs when a model performs well on training data but poorly on unseen data.</p>
<input type="radio" name="q14" value="correct"> True<br>
<input type="radio" name="q14" value="wrong"> False
</div>

<div class="question">
<p>15. Which AI algorithm is commonly used for decision trees?</p>
<input type="radio" name="q15" value="correct"> CART<br>
<input type="radio" name="q15" value="wrong"> KNN<br>
<input type="radio" name="q15" value="wrong"> CNN
</div>

<div class="question">
<p>16. True or False: Gradient Descent is used to minimize a loss function.</p>
<input type="radio" name="q16" value="correct"> True<br>
<input type="radio" name="q16" value="wrong"> False
</div>

<div class="question">
<p>17. Which type of learning finds patterns without labeled data?</p>
<input type="radio" name="q17" value="correct"> Unsupervised<br>
<input type="radio" name="q17" value="wrong"> Supervised<br>
<input type="radio" name="q17" value="wrong"> Reinforcement
</div>

<div class="question">
<p>18. True or False: Convolutional Neural Networks are mainly used for image recognition.</p>
<input type="radio" name="q18" value="correct"> True<br>
<input type="radio" name="q18" value="wrong"> False
</div>

<div class="question">
<p>19. Which metric evaluates classification performance?</p>
<input type="radio" name="q19" value="correct"> Accuracy<br>
<input type="radio" name="q19" value="wrong"> MSE<br>
<input type="radio" name="q19" value="wrong"> Loss
</div>

<div class="question">
<p>20. True or False: Hyperparameters are learned automatically by the model.</p>
<input type="radio" name="q20" value="wrong"> True<br>
<input type="radio" name="q20" value="correct"> False
</div>

<div class="question">
<p>21. Which algorithm is used for dimensionality reduction?</p>
<input type="radio" name="q21" value="correct"> PCA<br>
<input type="radio" name="q21" value="wrong"> K-Means<br>
<input type="radio" name="q21" value="wrong"> Logistic Regression
</div>

<div class="question">
<p>22. True or False: Reinforcement learning learns by trial and error.</p>
<input type="radio" name="q22" value="correct"> True<br>
<input type="radio" name="q22" value="wrong"> False
</div>

<div class="question">
<p>23. Which type of learning uses both labeled and unlabeled data?</p>
<input type="radio" name="q23" value="correct"> Semi-supervised<br>
<input type="radio" name="q23" value="wrong"> Unsupervised<br>
<input type="radio" name="q23" value="wrong"> Supervised
</div>

<div class="question">
<p>24. True or False: Backpropagation is used to train neural networks.</p>
<input type="radio" name="q24" value="correct"> True<br>
<input type="radio" name="q24" value="wrong"> False
</div>

<div class="question">
<p>25. Which of these is a problem of deep learning?</p>
<input type="radio" name="q25" value="correct"> Vanishing gradients<br>
<input type="radio" name="q25" value="wrong"> Low accuracy<br>
<input type="radio" name="q25" value="wrong"> Easy overfitting
</div>

<div class="question">
<p>26. True or False: Ensemble methods combine multiple models to improve performance.</p>
<input type="radio" name="q26" value="correct"> True<br>
<input type="radio" name="q26" value="wrong"> False
</div>

<div class="question">
<p>27. Which technique is used to prevent overfitting?</p>
<input type="radio" name="q27" value="correct"> Dropout<br>
<input type="radio" name="q27" value="wrong"> ReLU<br>
<input type="radio" name="q27" value="wrong"> PCA
</div>

<div class="question">
<p>28. True or False: Support Vector Machines can handle non-linear data using kernels.</p>
<input type="radio" name="q28" value="correct"> True<br>
<input type="radio" name="q28" value="wrong"> False
</div>

<div class="question">
<p>29. Which reinforcement learning algorithm is used for policy optimization?</p>
<input type="radio" name="q29" value="correct"> Policy Gradient<br>
<input type="radio" name="q29" value="wrong"> K-Means<br>
<input type="radio" name="q29" value="wrong"> Decision Tree
</div>

<div class="question">
<p>30. True or False: LSTM networks are designed to handle sequential data.</p>
<input type="radio" name="q30" value="correct"> True<br>
<input type="radio" name="q30" value="wrong"> False
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>
  </p>
</div>


<!-- قسم برمجة الويب -->
<div id="Web" class="exam">
  <h3>Web Programming Exam</h3>
  <p>
<form id="webExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="Web">
<div class="question">
<p>1. True or False: &lt;div&gt; is a block-level element.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which CSS property changes text color?</p>
<input type="radio" name="q2" value="correct"> color<br>
<input type="radio" name="q2" value="wrong"> background-color<br>
<input type="radio" name="q2" value="wrong"> font-size
</div>

<div class="question">
<p>3. True or False: The &lt;script&gt; tag is used for JavaScript.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which HTML element is used to create a hyperlink?</p>
<input type="radio" name="q4" value="correct">&lt;a&gt;<br>
<input type="radio" name="q4" value="wrong">&lt;link&gt;<br>
<input type="radio" name="q4" value="wrong">&lt;href&gt;
</div>

<div class="question">
<p>5. True or False: Inline CSS uses the style attribute.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which JS method selects an element by its id?</p>
<input type="radio" name="q6" value="correct"> getElementById("id")<br>
<input type="radio" name="q6" value="wrong"> querySelector(".id")<br>
<input type="radio" name="q6" value="wrong"> getElements(".id")
</div>

<div class="question">
<p>7. True or False: position: absolute; positions an element relative to its nearest positioned ancestor.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which property sets the space inside an element’s border in CSS?</p>
<input type="radio" name="q8" value="correct"> padding<br>
<input type="radio" name="q8" value="wrong"> margin<br>
<input type="radio" name="q8" value="wrong"> border-width
</div>

<div class="question">
<p>9. True or False: &lt;form&gt; is used to collect user input.</p>
<input type="radio" name="q9" value="correct"> True<br>
<input type="radio" name="q9" value="wrong"> False
</div>

<div class="question">
<p>10. Which JS event occurs when a user clicks a button?</p>
<input type="radio" name="q10" value="correct"> onclick<br>
<input type="radio" name="q10" value="wrong"> onhover<br>
<input type="radio" name="q10" value="wrong"> onsubmit
</div>

<div class="question">
<p>11. True or False: &lt;span&gt; is an inline element.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which HTML tag is used for table rows?</p>
<input type="radio" name="q12" value="correct">&lt;tr&gt;<br>
<input type="radio" name="q12" value="wrong">&lt;td&gt;<br>
<input type="radio" name="q12" value="wrong">&lt;th&gt;
</div>

<div class="question">
<p>13. True or False: CSS Flexbox can align items both horizontally and vertically.</p>
<input type="radio" name="q13" value="correct"> True<br>
<input type="radio" name="q13" value="wrong"> False
</div>

<div class="question">
<p>14. Which method adds an element to the end of an array in JavaScript?</p>
<input type="radio" name="q14" value="correct"> push()<br>
<input type="radio" name="q14" value="wrong"> pop()<br>
<input type="radio" name="q14" value="wrong"> shift()
</div>

<div class="question">
<p>15. True or False: The &lt;link&gt; tag is used to link CSS files.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which property sets the background color in CSS?</p>
<input type="radio" name="q16" value="correct"> background-color<br>
<input type="radio" name="q16" value="wrong"> color<br>
<input type="radio" name="q16" value="wrong"> border
</div>

<div class="question">
<p>17. True or False: document.querySelectorAll returns all matching elements.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which attribute is used to provide alternative text for images?</p>
<input type="radio" name="q18" value="correct"> alt<br>
<input type="radio" name="q18" value="wrong"> src<br>
<input type="radio" name="q18" value="wrong"> href
</div>

<div class="question">
<p>19. True or False: CSS Grid can create complex layouts without floats.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which method removes the last element from an array in JavaScript?</p>
<input type="radio" name="q20" value="correct"> pop()<br>
<input type="radio" name="q20" value="wrong"> push()<br>
<input type="radio" name="q20" value="wrong"> shift()
</div>

<div class="question">
<p>21. True or False: &lt;h1&gt; is the largest heading element in HTML.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which CSS property changes the font family?</p>
<input type="radio" name="q22" value="correct"> font-family<br>
<input type="radio" name="q22" value="wrong"> font-size<br>
<input type="radio" name="q22" value="wrong"> text-align
</div>

<div class="question">
<p>23. True or False: JavaScript is a statically typed language.</p>
<input type="radio" name="q23" value="wrong"> True<br>
<input type="radio" name="q23" value="correct"> False
</div>

<div class="question">
<p>24. Which HTML element is used to define a table header?</p>
<input type="radio" name="q24" value="correct">&lt;th&gt;<br>
<input type="radio" name="q24" value="wrong">&lt;td&gt;<br>
<input type="radio" name="q24" value="wrong">&lt;tr&gt;
</div>

<div class="question">
<p>25. True or False: CSS pseudo-classes can style elements based on their state.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which property sets the border radius in CSS?</p>
<input type="radio" name="q26" value="correct"> border-radius<br>
<input type="radio" name="q26" value="wrong"> border-style<br>
<input type="radio" name="q26" value="wrong"> border-width
</div>

<div class="question">
<p>27. True or False: The &lt;canvas&gt; element is used to draw graphics in HTML5.</p>
<input type="radio" name="q27" value="correct"> True<br>
<input type="radio" name="q27" value="wrong"> False
</div>

<div class="question">
<p>28. Which JS method removes the first element of an array?</p>
<input type="radio" name="q28" value="correct"> shift()<br>
<input type="radio" name="q28" value="wrong"> pop()<br>
<input type="radio" name="q28" value="wrong"> push()
</div>

<div class="question">
<p>29. True or False: The &lt;meta&gt; tag defines metadata in HTML.</p>
<input type="radio" name="q29" value="correct"> True<br>
<input type="radio" name="q29" value="wrong"> False
</div>

<div class="question">
<p>30. Which JS method selects the first element that matches a CSS selector?</p>
<input type="radio" name="q30" value="correct"> querySelector()<br>
<input type="radio" name="q30" value="wrong"> getElementById()<br>
<input type="radio" name="q30" value="wrong"> querySelectorAll()
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>
  </p>
</div>

<!-- قسم برمجة تطبيقات الهواتف -->
<div id="Mobile" class="exam">
  <h3>Mobile App Programming Exam</h3>
  <p>
<form id="mobileExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="Mobile">

<div class="question">
<p>1. True or False: In Android, an Activity represents a single screen.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which language is primarily used for native Android development?</p>
<input type="radio" name="q2" value="correct"> Kotlin<br>
<input type="radio" name="q2" value="wrong"> Swift<br>
<input type="radio" name="q2" value="wrong"> JavaScript
</div>

<div class="question">
<p>3. True or False: In iOS, ViewController represents a screen controller.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which method starts an Activity in Android?</p>
<input type="radio" name="q4" value="correct"> startActivity()<br>
<input type="radio" name="q4" value="wrong"> openActivity()<br>
<input type="radio" name="q4" value="wrong"> launchActivity()
</div>

<div class="question">
<p>5. True or False: In Flutter, widgets are immutable.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which layout in Android stacks elements on top of each other?</p>
<input type="radio" name="q6" value="correct"> FrameLayout<br>
<input type="radio" name="q6" value="wrong"> LinearLayout<br>
<input type="radio" name="q6" value="wrong"> RelativeLayout
</div>

<div class="question">
<p>7. True or False: iOS uses Storyboards to design UI visually.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which Flutter widget is used for a scrollable list?</p>
<input type="radio" name="q8" value="correct"> ListView<br>
<input type="radio" name="q8" value="wrong"> Column<br>
<input type="radio" name="q8" value="wrong"> Container
</div>

<div class="question">
<p>9. True or False: Gradle is used to build Android applications.</p>
<input type="radio" name="q9" value="correct"> True<br>
<input type="radio" name="q9" value="wrong"> False
</div>

<div class="question">
<p>10. Which file defines permissions in Android?</p>
<input type="radio" name="q10" value="correct"> AndroidManifest.xml<br>
<input type="radio" name="q10" value="wrong"> Info.plist<br>
<input type="radio" name="q10" value="wrong"> build.gradle
</div>

<div class="question">
<p>11. True or False: Hot reload is a feature in Flutter that speeds up development.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which Swift keyword defines a constant?</p>
<input type="radio" name="q12" value="correct"> let<br>
<input type="radio" name="q12" value="wrong"> var<br>
<input type="radio" name="q12" value="wrong"> const
</div>

<div class="question">
<p>13. True or False: RecyclerView is more efficient than ListView in Android.</p>
<input type="radio" name="q13" value="correct"> True<br>
<input type="radio" name="q13" value="wrong"> False
</div>

<div class="question">
<p>14. Which lifecycle method is called when an Android Activity is first created?</p>
<input type="radio" name="q14" value="correct"> onCreate()<br>
<input type="radio" name="q14" value="wrong"> onStart()<br>
<input type="radio" name="q14" value="wrong"> onResume()
</div>

<div class="question">
<p>15. True or False: In iOS, IBOutlet connects UI elements to code.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which Flutter widget creates a button?</p>
<input type="radio" name="q16" value="correct"> ElevatedButton<br>
<input type="radio" name="q16" value="wrong"> Container<br>
<input type="radio" name="q16" value="wrong"> Scaffold
</div>

<div class="question">
<p>17. True or False: Context in Flutter provides access to widget tree information.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which Android component is used for background tasks?</p>
<input type="radio" name="q18" value="correct"> Service<br>
<input type="radio" name="q18" value="wrong"> BroadcastReceiver<br>
<input type="radio" name="q18" value="wrong"> ContentProvider
</div>

<div class="question">
<p>19. True or False: setState() in Flutter rebuilds the widget tree.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which Swift keyword defines a variable?</p>
<input type="radio" name="q20" value="correct"> var<br>
<input type="radio" name="q20" value="wrong"> let<br>
<input type="radio" name="q20" value="wrong"> const
</div>

<div class="question">
<p>21. True or False: Gradle dependencies are defined in build.gradle file.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which Flutter widget is used for layout arrangement like rows?</p>
<input type="radio" name="q22" value="correct"> Row<br>
<input type="radio" name="q22" value="wrong"> Column<br>
<input type="radio" name="q22" value="wrong"> Stack
</div>

<div class="question">
<p>23. True or False: Android Studio supports Kotlin and Java development.</p>
<input type="radio" name="q23" value="correct"> True<br>
<input type="radio" name="q23" value="wrong"> False
</div>

<div class="question">
<p>24. Which iOS file contains app configuration?</p>
<input type="radio" name="q24" value="correct"> Info.plist<br>
<input type="radio" name="q24" value="wrong"> AppDelegate.swift<br>
<input type="radio" name="q24" value="wrong"> main.swift
</div>

<div class="question">
<p>25. True or False: Gradle allows modular builds and dependency management.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which Flutter widget provides material design scaffold?</p>
<input type="radio" name="q26" value="correct"> Scaffold<br>
<input type="radio" name="q26" value="wrong"> Container<br>
<input type="radio" name="q26" value="wrong"> MaterialApp
</div>

<div class="question">
<p>27. True or False: Android BroadcastReceiver listens for system or app events.</p>
<input type="radio" name="q27" value="correct"> True<br>
<input type="radio" name="q27" value="wrong"> False
</div>

<div class="question">
<p>28. Which method in Flutter updates UI after a change?</p>
<input type="radio" name="q28" value="correct"> setState()<br>
<input type="radio" name="q28" value="wrong"> refresh()<br>
<input type="radio" name="q28" value="wrong"> rebuild()
</div>

<div class="question">
<p>29. True or False: An Intent in Android is used to start activities or communicate between components.</p>
<input type="radio" name="q29" value="correct"> True<br>
<input type="radio" name="q29" value="wrong"> False
</div>

<div class="question">
<p>30. Which Flutter widget allows displaying scrollable content?</p>
<input type="radio" name="q30" value="correct"> SingleChildScrollView<br>
<input type="radio" name="q30" value="wrong"> Column<br>
<input type="radio" name="q30" value="wrong"> Container
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>
    
  </p>
</div>

<!-- قسم الأمن السيبراني -->
<div id="Cyber" class="exam">
  <h3>Cybersecurity Exam</h3>
  <p>
<form id="cyberExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="Cyber">

<div class="question">
<p>1. True or False: HTTPS encrypts data transmitted between client and server.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which of the following is a strong password?</p>
<input type="radio" name="q2" value="wrong"> 123456<br>
<input type="radio" name="q2" value="correct"> P@ssw0rd!2026<br>
<input type="radio" name="q2" value="wrong"> password
</div>

<div class="question">
<p>3. True or False: SQL injection is a type of cyber attack.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which is a common way to protect sensitive data?</p>
<input type="radio" name="q4" value="correct"> Hashing passwords<br>
<input type="radio" name="q4" value="wrong"> Storing plain text passwords<br>
<input type="radio" name="q4" value="wrong"> Printing passwords in console
</div>

<div class="question">
<p>5. True or False: Two-factor authentication increases account security.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which of the following is NOT a malware type?</p>
<input type="radio" name="q6" value="wrong"> Virus<br>
<input type="radio" name="q6" value="wrong"> Trojan<br>
<input type="radio" name="q6" value="correct"> VPN
</div>

<div class="question">
<p>7. True or False: Phishing is an attempt to steal sensitive information by impersonating a trusted entity.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which protocol is used for secure email transmission?</p>
<input type="radio" name="q8" value="correct"> SMTPS<br>
<input type="radio" name="q8" value="wrong"> FTP<br>
<input type="radio" name="q8" value="wrong"> HTTP
</div>

<div class="question">
<p>9. True or False: A firewall can block unauthorized access to a network.</p>
<input type="radio" name="q9" value="correct"> True<br>
<input type="radio" name="q9" value="wrong"> False
</div>

<div class="question">
<p>10. Which attack involves overwhelming a system with traffic to make it unavailable?</p>
<input type="radio" name="q10" value="correct"> DDoS<br>
<input type="radio" name="q10" value="wrong"> Phishing<br>
<input type="radio" name="q10" value="wrong"> Spoofing
</div>

<div class="question">
<p>11. True or False: VPN encrypts internet traffic between the client and server.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which type of malware encrypts files and demands payment?</p>
<input type="radio" name="q12" value="correct"> Ransomware<br>
<input type="radio" name="q12" value="wrong"> Spyware<br>
<input type="radio" name="q12" value="wrong"> Worm
</div>

<div class="question">
<p>13. True or False: Social engineering attacks target human behavior rather than system vulnerabilities.</p>
<input type="radio" name="q13" value="correct"> True<br>
<input type="radio" name="q13" value="wrong"> False
</div>

<div class="question">
<p>14. Which of the following is an example of symmetric encryption?</p>
<input type="radio" name="q14" value="correct"> AES<br>
<input type="radio" name="q14" value="wrong"> RSA<br>
<input type="radio" name="q14" value="wrong"> ECC
</div>

<div class="question">
<p>15. True or False: Cross-Site Scripting (XSS) allows attackers to inject scripts into web pages.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which of the following is used for network intrusion detection?</p>
<input type="radio" name="q16" value="correct"> IDS<br>
<input type="radio" name="q16" value="wrong"> FTP<br>
<input type="radio" name="q16" value="wrong"> SMTP
</div>

<div class="question">
<p>17. True or False: SSL/TLS certificates validate server identity and encrypt traffic.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which tool is commonly used for penetration testing?</p>
<input type="radio" name="q18" value="correct"> Metasploit<br>
<input type="radio" name="q18" value="wrong"> Visual Studio<br>
<input type="radio" name="q18" value="wrong"> Eclipse
</div>

<div class="question">
<p>19. True or False: A honeypot is a system set up to attract attackers.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which method is used to prevent brute-force login attacks?</p>
<input type="radio" name="q20" value="correct"> Account lockout policies<br>
<input type="radio" name="q20" value="wrong"> Plain text passwords<br>
<input type="radio" name="q20" value="wrong"> Open Wi-Fi
</div>

<div class="question">
<p>21. True or False: Public key cryptography uses two keys: public and private.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which attack intercepts communication between two parties?</p>
<input type="radio" name="q22" value="correct"> Man-in-the-middle<br>
<input type="radio" name="q22" value="wrong"> Denial-of-service<br>
<input type="radio" name="q22" value="wrong"> Phishing
</div>

<div class="question">
<p>23. True or False: Keylogging records every keystroke on a device.</p>
<input type="radio" name="q23" value="correct"> True<br>
<input type="radio" name="q23" value="wrong"> False
</div>

<div class="question">
<p>24. Which protocol is used for secure file transfer?</p>
<input type="radio" name="q24" value="correct"> SFTP<br>
<input type="radio" name="q24" value="wrong"> HTTP<br>
<input type="radio" name="q24" value="wrong"> FTP
</div>

<div class="question">
<p>25. True or False: Cross-Site Request Forgery (CSRF) tricks a user into performing unwanted actions.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which type of attack targets vulnerabilities in software dependencies?</p>
<input type="radio" name="q26" value="correct"> Supply chain attack<br>
<input type="radio" name="q26" value="wrong"> SQL injection<br>
<input type="radio" name="q26" value="wrong"> Brute force
</div>

<div class="question">
<p>27. True or False: Two-factor authentication always requires SMS.</p>
<input type="radio" name="q27" value="correct"> False<br>
<input type="radio" name="q27" value="wrong"> True
</div>

<div class="question">
<p>28. Which security standard is used for payment card data?</p>
<input type="radio" name="q28" value="correct"> PCI DSS<br>
<input type="radio" name="q28" value="wrong"> ISO 9001<br>
<input type="radio" name="q28" value="wrong"> GDPR
</div>

<div class="question">
<p>29. True or False: Zero-day vulnerabilities are publicly known before they are exploited.</p>
<input type="radio" name="q29" value="correct"> False<br>
<input type="radio" name="q29" value="wrong"> True
</div>

<div class="question">
<p>30. Which protocol ensures secure web communication?</p>
<input type="radio" name="q30" value="correct"> HTTPS<br>
<input type="radio" name="q30" value="wrong"> HTTP<br>
<input type="radio" name="q30" value="wrong"> FTP
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>
  </p>
</div>

<!-- قسم الشبكات -->
<div id="Network" class="exam">
  <h3>Networking Exam</h3>
  <p>
    
<form id="networkExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="Network">

<div class="question">
<p>1. True or False: TCP is a connection-oriented protocol.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which device connects multiple networks together?</p>
<input type="radio" name="q2" value="correct"> Router<br>
<input type="radio" name="q2" value="wrong"> Switch<br>
<input type="radio" name="q2" value="wrong"> Hub
</div>

<div class="question">
<p>3. True or False: IP addresses identify devices on a network.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which protocol is used to send emails?</p>
<input type="radio" name="q4" value="correct"> SMTP<br>
<input type="radio" name="q4" value="wrong"> FTP<br>
<input type="radio" name="q4" value="wrong"> HTTP
</div>

<div class="question">
<p>5. True or False: LAN stands for Local Area Network.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which protocol is used to assign IP addresses automatically?</p>
<input type="radio" name="q6" value="correct"> DHCP<br>
<input type="radio" name="q6" value="wrong"> DNS<br>
<input type="radio" name="q6" value="wrong"> FTP
</div>

<div class="question">
<p>7. True or False: A switch works at the data link layer.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which protocol translates domain names to IP addresses?</p>
<input type="radio" name="q8" value="correct"> DNS<br>
<input type="radio" name="q8" value="wrong"> DHCP<br>
<input type="radio" name="q8" value="wrong"> ICMP
</div>

<div class="question">
<p>9. True or False: HTTP is a secure protocol by default.</p>
<input type="radio" name="q9" value="correct"> False<br>
<input type="radio" name="q9" value="wrong"> True
</div>

<div class="question">
<p>10. Which cable is commonly used in Ethernet networks?</p>
<input type="radio" name="q10" value="correct"> UTP<br>
<input type="radio" name="q10" value="wrong"> HDMI<br>
<input type="radio" name="q10" value="wrong"> VGA
</div>

<div class="question">
<p>11. True or False: UDP is faster than TCP but less reliable.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which layer is responsible for routing packets?</p>
<input type="radio" name="q12" value="correct"> Network Layer<br>
<input type="radio" name="q12" value="wrong"> Transport Layer<br>
<input type="radio" name="q12" value="wrong"> Application Layer
</div>

<div class="question">
<p>13. True or False: ICMP is used for error reporting.</p>
<input type="radio" name="q13" value="correct"> True<br>
<input type="radio" name="q13" value="wrong"> False
</div>

<div class="question">
<p>14. Which protocol is used for secure web communication?</p>
<input type="radio" name="q14" value="correct"> HTTPS<br>
<input type="radio" name="q14" value="wrong"> HTTP<br>
<input type="radio" name="q14" value="wrong"> FTP
</div>

<div class="question">
<p>15. True or False: MAC addresses are unique.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which device filters traffic based on security rules?</p>
<input type="radio" name="q16" value="correct"> Firewall<br>
<input type="radio" name="q16" value="wrong"> Hub<br>
<input type="radio" name="q16" value="wrong"> Repeater
</div>

<div class="question">
<p>17. True or False: NAT hides private IP addresses.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which protocol is used for file transfer?</p>
<input type="radio" name="q18" value="correct"> FTP<br>
<input type="radio" name="q18" value="wrong"> SMTP<br>
<input type="radio" name="q18" value="wrong"> SNMP
</div>

<div class="question">
<p>19. True or False: Bandwidth refers to data transfer speed.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which topology uses a central device?</p>
<input type="radio" name="q20" value="correct"> Star<br>
<input type="radio" name="q20" value="wrong"> Ring<br>
<input type="radio" name="q20" value="wrong"> Bus
</div>

<div class="question">
<p>21. True or False: IPv6 uses 128-bit addresses.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which protocol is used for network management?</p>
<input type="radio" name="q22" value="correct"> SNMP<br>
<input type="radio" name="q22" value="wrong"> FTP<br>
<input type="radio" name="q22" value="wrong"> HTTP
</div>

<div class="question">
<p>23. True or False: VLANs improve network security.</p>
<input type="radio" name="q23" value="correct"> True<br>
<input type="radio" name="q23" value="wrong"> False
</div>

<div class="question">
<p>24. Which algorithm is used for routing?</p>
<input type="radio" name="q24" value="correct"> Dijkstra<br>
<input type="radio" name="q24" value="wrong"> Bubble Sort<br>
<input type="radio" name="q24" value="wrong"> Linear Search
</div>

<div class="question">
<p>25. True or False: QoS manages network traffic priority.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which protocol tests network connectivity?</p>
<input type="radio" name="q26" value="correct"> ICMP<br>
<input type="radio" name="q26" value="wrong"> SMTP<br>
<input type="radio" name="q26" value="wrong"> FTP
</div>

<div class="question">
<p>27. True or False: Packet loss affects network performance.</p>
<input type="radio" name="q27" value="correct"> True<br>
<input type="radio" name="q27" value="wrong"> False
</div>

<div class="question">
<p>28. Which layer ensures reliable delivery?</p>
<input type="radio" name="q28" value="correct"> Transport Layer<br>
<input type="radio" name="q28" value="wrong"> Physical Layer<br>
<input type="radio" name="q28" value="wrong"> Session Layer
</div>

<div class="question">
<p>29. True or False: Wi-Fi is a wired network technology.</p>
<input type="radio" name="q29" value="correct"> False<br>
<input type="radio" name="q29" value="wrong"> True
</div>

<div class="question">
<p>30. Which protocol uses port 80 by default?</p>
<input type="radio" name="q30" value="correct"> HTTP<br>
<input type="radio" name="q30" value="wrong"> HTTPS<br>
<input type="radio" name="q30" value="wrong"> FTP
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>
  </p>
</div>

<!-- قسم أنظمة التشغيل -->
<div id="OS" class="exam">
  <h3>Operating Systems Exam</h3>
  <p>

<form id="osExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="OS">

<div class="question">
<p>1. True or False: An operating system manages computer hardware.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which of the following is an operating system?</p>
<input type="radio" name="q2" value="correct"> Linux<br>
<input type="radio" name="q2" value="wrong"> Python<br>
<input type="radio" name="q2" value="wrong"> HTML
</div>

<div class="question">
<p>3. True or False: The kernel is the core of the OS.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which OS is open-source?</p>
<input type="radio" name="q4" value="correct"> Linux<br>
<input type="radio" name="q4" value="wrong"> Windows<br>
<input type="radio" name="q4" value="wrong"> macOS
</div>

<div class="question">
<p>5. True or False: Multitasking allows multiple programs to run simultaneously.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which component manages memory?</p>
<input type="radio" name="q6" value="correct"> Memory Manager<br>
<input type="radio" name="q6" value="wrong"> Compiler<br>
<input type="radio" name="q6" value="wrong"> Editor
</div>

<div class="question">
<p>7. True or False: A process is a program in execution.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which OS is mainly used on servers?</p>
<input type="radio" name="q8" value="correct"> Linux<br>
<input type="radio" name="q8" value="wrong"> Android<br>
<input type="radio" name="q8" value="wrong"> iOS
</div>

<div class="question">
<p>9. True or False: A thread is lighter than a process.</p>
<input type="radio" name="q9" value="correct"> True<br>
<input type="radio" name="q9" value="wrong"> False
</div>

<div class="question">
<p>10. Which OS is used in smartphones?</p>
<input type="radio" name="q10" value="correct"> Android<br>
<input type="radio" name="q10" value="wrong"> Ubuntu Server<br>
<input type="radio" name="q10" value="wrong"> DOS
</div>

<div class="question">
<p>11. True or False: Paging is a memory management technique.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which scheduling algorithm is preemptive?</p>
<input type="radio" name="q12" value="correct"> Round Robin<br>
<input type="radio" name="q12" value="wrong"> FCFS<br>
<input type="radio" name="q12" value="wrong"> SJF (non-preemptive)
</div>

<div class="question">
<p>13. True or False: Deadlock occurs when processes wait forever.</p>
<input type="radio" name="q13" value="correct"> True<br>
<input type="radio" name="q13" value="wrong"> False
</div>

<div class="question">
<p>14. Which of the following is NOT a scheduling algorithm?</p>
<input type="radio" name="q14" value="correct"> Binary Search<br>
<input type="radio" name="q14" value="wrong"> Round Robin<br>
<input type="radio" name="q14" value="wrong"> Priority Scheduling
</div>

<div class="question">
<p>15. True or False: Virtual memory uses disk as extra RAM.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which system call creates a new process in Unix?</p>
<input type="radio" name="q16" value="correct"> fork()<br>
<input type="radio" name="q16" value="wrong"> exec()<br>
<input type="radio" name="q16" value="wrong"> exit()
</div>

<div class="question">
<p>17. True or False: Context switching saves CPU state.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which component handles device communication?</p>
<input type="radio" name="q18" value="correct"> Device Driver<br>
<input type="radio" name="q18" value="wrong"> Kernel Scheduler<br>
<input type="radio" name="q18" value="wrong"> Shell
</div>

<div class="question">
<p>19. True or False: Semaphore is used for synchronization.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which OS feature prevents unauthorized access?</p>
<input type="radio" name="q20" value="correct"> Access Control<br>
<input type="radio" name="q20" value="wrong"> Multitasking<br>
<input type="radio" name="q20" value="wrong"> Scheduling
</div>

<div class="question">
<p>21. True or False: Monolithic kernels include all services in kernel space.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which OS uses a microkernel architecture?</p>
<input type="radio" name="q22" value="correct"> Minix<br>
<input type="radio" name="q22" value="wrong"> Linux<br>
<input type="radio" name="q22" value="wrong"> Windows XP
</div>

<div class="question">
<p>23. True or False: Thrashing occurs due to excessive paging.</p>
<input type="radio" name="q23" value="correct"> True<br>
<input type="radio" name="q23" value="wrong"> False
</div>

<div class="question">
<p>24. Which algorithm avoids deadlock?</p>
<input type="radio" name="q24" value="correct"> Banker’s Algorithm<br>
<input type="radio" name="q24" value="wrong"> FCFS<br>
<input type="radio" name="q24" value="wrong"> Round Robin
</div>

<div class="question">
<p>25. True or False: Kernel mode has full system access.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which memory allocation is fixed-size?</p>
<input type="radio" name="q26" value="correct"> Paging<br>
<input type="radio" name="q26" value="wrong"> Segmentation<br>
<input type="radio" name="q26" value="wrong"> Virtual Memory
</div>

<div class="question">
<p>27. True or False: System calls provide an interface between user programs and OS.</p>
<input type="radio" name="q27" value="correct"> True<br>
<input type="radio" name="q27" value="wrong"> False
</div>

<div class="question">
<p>28. Which OS concept isolates processes?</p>
<input type="radio" name="q28" value="correct"> Process Isolation<br>
<input type="radio" name="q28" value="wrong"> Scheduling<br>
<input type="radio" name="q28" value="wrong"> Caching
</div>

<div class="question">
<p>29. True or False: Swap space is part of physical RAM.</p>
<input type="radio" name="q29" value="correct"> False<br>
<input type="radio" name="q29" value="wrong"> True
</div>

<div class="question">
<p>30. Which OS is real-time?</p>
<input type="radio" name="q30" value="correct"> RTOS<br>
<input type="radio" name="q30" value="wrong"> Windows<br>
<input type="radio" name="q30" value="wrong"> Ubuntu
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form>

  </p>
</div>

<!-- قسم قواعد البيانات -->
<div id="DB" class="exam">
  <h3>Databases Exam</h3>
  <p> 
   
<form id="dbExam" action="roadmap.php" method="POST">
<input type="hidden" name="field" value="DB">

<div class="question">
<p>1. True or False: A database is used to store data.</p>
<input type="radio" name="q1" value="correct"> True<br>
<input type="radio" name="q1" value="wrong"> False
</div>

<div class="question">
<p>2. Which of the following is a database?</p>
<input type="radio" name="q2" value="correct"> MySQL<br>
<input type="radio" name="q2" value="wrong"> HTML<br>
<input type="radio" name="q2" value="wrong"> CSS
</div>

<div class="question">
<p>3. True or False: SQL is used to query databases.</p>
<input type="radio" name="q3" value="correct"> True<br>
<input type="radio" name="q3" value="wrong"> False
</div>

<div class="question">
<p>4. Which SQL command retrieves data?</p>
<input type="radio" name="q4" value="correct"> SELECT<br>
<input type="radio" name="q4" value="wrong"> INSERT<br>
<input type="radio" name="q4" value="wrong"> DELETE
</div>

<div class="question">
<p>5. True or False: A table consists of rows and columns.</p>
<input type="radio" name="q5" value="correct"> True<br>
<input type="radio" name="q5" value="wrong"> False
</div>

<div class="question">
<p>6. Which SQL command adds new data?</p>
<input type="radio" name="q6" value="correct"> INSERT<br>
<input type="radio" name="q6" value="wrong"> SELECT<br>
<input type="radio" name="q6" value="wrong"> DROP
</div>

<div class="question">
<p>7. True or False: Primary keys uniquely identify records.</p>
<input type="radio" name="q7" value="correct"> True<br>
<input type="radio" name="q7" value="wrong"> False
</div>

<div class="question">
<p>8. Which of these is a DBMS?</p>
<input type="radio" name="q8" value="correct"> PostgreSQL<br>
<input type="radio" name="q8" value="wrong"> JavaScript<br>
<input type="radio" name="q8" value="wrong"> Linux
</div>

<div class="question">
<p>9. True or False: DELETE removes a table structure.</p>
<input type="radio" name="q9" value="correct"> False<br>
<input type="radio" name="q9" value="wrong"> True
</div>

<div class="question">
<p>10. Which SQL command removes a table?</p>
<input type="radio" name="q10" value="correct"> DROP TABLE<br>
<input type="radio" name="q10" value="wrong"> DELETE TABLE<br>
<input type="radio" name="q10" value="wrong"> REMOVE TABLE
</div>

<div class="question">
<p>11. True or False: A foreign key creates a relationship between tables.</p>
<input type="radio" name="q11" value="correct"> True<br>
<input type="radio" name="q11" value="wrong"> False
</div>

<div class="question">
<p>12. Which clause filters rows?</p>
<input type="radio" name="q12" value="correct"> WHERE<br>
<input type="radio" name="q12" value="wrong"> ORDER BY<br>
<input type="radio" name="q12" value="wrong"> GROUP BY
</div>

<div class="question">
<p>13. True or False: NULL means zero.</p>
<input type="radio" name="q13" value="correct"> False<br>
<input type="radio" name="q13" value="wrong"> True
</div>

<div class="question">
<p>14. Which SQL function counts rows?</p>
<input type="radio" name="q14" value="correct"> COUNT()<br>
<input type="radio" name="q14" value="wrong"> SUM()<br>
<input type="radio" name="q14" value="wrong"> AVG()
</div>

<div class="question">
<p>15. True or False: Indexes improve query performance.</p>
<input type="radio" name="q15" value="correct"> True<br>
<input type="radio" name="q15" value="wrong"> False
</div>

<div class="question">
<p>16. Which join returns matching rows?</p>
<input type="radio" name="q16" value="correct"> INNER JOIN<br>
<input type="radio" name="q16" value="wrong"> LEFT JOIN<br>
<input type="radio" name="q16" value="wrong"> FULL JOIN
</div>

<div class="question">
<p>17. True or False: GROUP BY is used with aggregate functions.</p>
<input type="radio" name="q17" value="correct"> True<br>
<input type="radio" name="q17" value="wrong"> False
</div>

<div class="question">
<p>18. Which normal form removes partial dependency?</p>
<input type="radio" name="q18" value="correct"> 2NF<br>
<input type="radio" name="q18" value="wrong"> 1NF<br>
<input type="radio" name="q18" value="wrong"> 3NF
</div>

<div class="question">
<p>19. True or False: Transactions ensure data consistency.</p>
<input type="radio" name="q19" value="correct"> True<br>
<input type="radio" name="q19" value="wrong"> False
</div>

<div class="question">
<p>20. Which command commits a transaction?</p>
<input type="radio" name="q20" value="correct"> COMMIT<br>
<input type="radio" name="q20" value="wrong"> SAVE<br>
<input type="radio" name="q20" value="wrong"> PUSH
</div>

<div class="question">
<p>21. True or False: ACID properties ensure reliable transactions.</p>
<input type="radio" name="q21" value="correct"> True<br>
<input type="radio" name="q21" value="wrong"> False
</div>

<div class="question">
<p>22. Which isolation level prevents dirty reads?</p>
<input type="radio" name="q22" value="correct"> READ COMMITTED<br>
<input type="radio" name="q22" value="wrong"> READ UNCOMMITTED<br>
<input type="radio" name="q22" value="wrong"> SERIALIZABLE
</div>

<div class="question">
<p>23. True or False: NoSQL databases use fixed schemas.</p>
<input type="radio" name="q23" value="correct"> False<br>
<input type="radio" name="q23" value="wrong"> True
</div>

<div class="question">
<p>24. Which NoSQL database is document-based?</p>
<input type="radio" name="q24" value="correct"> MongoDB<br>
<input type="radio" name="q24" value="wrong"> Redis<br>
<input type="radio" name="q24" value="wrong"> Neo4j
</div>

<div class="question">
<p>25. True or False: Sharding distributes data across servers.</p>
<input type="radio" name="q25" value="correct"> True<br>
<input type="radio" name="q25" value="wrong"> False
</div>

<div class="question">
<p>26. Which index structure is most common?</p>
<input type="radio" name="q26" value="correct"> B-Tree<br>
<input type="radio" name="q26" value="wrong"> Stack<br>
<input type="radio" name="q26" value="wrong"> Queue
</div>

<div class="question">
<p>27. True or False: Denormalization can improve performance.</p>
<input type="radio" name="q27" value="correct"> True<br>
<input type="radio" name="q27" value="wrong"> False
</div>

<div class="question">
<p>28. Which SQL constraint enforces uniqueness?</p>
<input type="radio" name="q28" value="correct"> UNIQUE<br>
<input type="radio" name="q28" value="wrong"> CHECK<br>
<input type="radio" name="q28" value="wrong"> DEFAULT
</div>

<div class="question">
<p>29. True or False: Views store data physically.</p>
<input type="radio" name="q29" value="correct"> False<br>
<input type="radio" name="q29" value="wrong"> True
</div>

<div class="question">
<p>30. Which concept ensures referential integrity?</p>
<input type="radio" name="q30" value="correct"> Foreign Key<br>
<input type="radio" name="q30" value="wrong"> Index<br>
<input type="radio" name="q30" value="wrong"> Trigger
</div>

<button type="submit" class="specific_sub" name="submitExam">Submit</button>
</form> 
  </p>
</div>
</section>

<script >

document.addEventListener("DOMContentLoaded", () => {
  // إخفاء كل الأقسام عند تحميل الصفحة
  document.querySelectorAll(".exam").forEach(div => {
    div.style.display = "none";
  });
//* انشاء متغير عشان احط فيه قيمة الراديو بوتون
  const radios = document.getElementsByName("field");

  radios.forEach(radio => {
    radio.addEventListener("change", () => {// اذا ضغطت على الراديو رح يعمل تغيير 
      document.querySelectorAll(".exam").forEach(div => {
        div.style.display = "none"; // اخفاء اي قسم ظاهر سابقا
      });

      document.getElementById(radio.value).style.display = "block"; // القسم المختار هو يلي رح يظهر
    });
  });
});


</script>

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