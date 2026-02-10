<!-- هاد الملف الخاص ببرمجة صفحة الروابط -->

<?php
session_start();
// url هان بيعمل متغبرات عشان اخد الاشياء والقيم من السيشن ورايط ال 
// اول اشي رح يبحث في الرابط اذا ما لاقى المعلومات في الرابط رح ياخد المعلومات من السبشن واذا رح يحطها فارغة
$field   = $_GET['field']   ?? $_SESSION['field']   ?? '';
$level   = $_GET['level']   ?? $_SESSION['level']   ?? 'Beginner';
$score   = $_SESSION['score']   ?? 0;
$percent = $_SESSION['percent'] ?? 0;
$step    = $_GET['step']    ?? '';
// مصفوفة الروابط لكل درس في كل مستوى في كل مجال
$resources = [

    'AI' => [

        'Beginner' => [

            'Python Basics' => [
                ['Youtube','https://youtu.be/rfscVS0vtbw?si=N_uUcrI6sp9qRyjP'],
                ['Youtube','https://youtu.be/_uQrJ0TkZlc?si=pgI3Xgc4bk5_HJjh'],
                ['Youtube','http://www.youtube.com/playlist?list=PLDoPjvoNmBAyE_gei5d18qkfIe-Z8mocs'],
                ['Python Tutorial','https://docs.python.org/3/tutorial/'],
                ['w3schools','https://www.w3schools.com/python/'],
                ['harmash','https://harmash.com/tutorials/python/overview'],
                ['hsoub','https://wiki.hsoub.com/Python'],
                [' learnpython.org ','https://www.learnpython.org/']

            ],

            'Math Foundations' => [
                ['Youtube','https://www.youtube.com/playlist?list=PLZHQObOWTQDPD3MizzM2xVFitgF8hE_ab'],
                ['Youtube','https://www.youtube.com/playlist?list=PLZHQObOWTQDMsr9K-rj53DwVRMYO3t5Yr'],
                ['Khan Academy','https://www.khanacademy.org/math/linear-algebra'],
                ['Khan Academy','https://www.khanacademy.org/math/statistics-probability'],
                ['maths is fun','https://www.mathsisfun.com/calculus/'],
                ['coursera','https://www.coursera.org/specializations/mathematics-for-machine-learning-and-data-science']

            ],

            'Data Handling' => [
                ['Youtube','http://www.youtube.com/playlist?list=PLUgz8T_NoatsJCH-DmieQhqhSL2WBvlm-'],
                ['Youtube','http://www.youtube.com/playlist?list=PLsNfqtb1rfnNd3YWvlgnstVdXIixTuk-v'],
                ['Youtube','https://youtube.com/playlist?list=PLRZ95XdMpwu_ZGOSCUwfjCAoqcB6RdyRE&si=0uTbaoL06J9HWYYM'],
                ['Youtube','http://www.youtube.com/playlist?list=PLRZ95XdMpwu8d51JhqhDk-67tUUuSf4RF'],
                ['Youtube','https://youtu.be/r-uOLxNrNk8?si=YqRzSqmh6SvpGSbG'],
                ['Youtube','http://www.youtube.com/watch?v=EaGbS7eWSs0'],
                ['NumPy quickstart','https://numpy.org/doc/stable/user/quickstart.html'],
                ['pandas','https://pandas.pydata.org/docs/getting_started/intro_tutorials/index.html'],
                ['kaggle','https://www.kaggle.com/learn/data-cleaning'],
                ['pandas','https://pandas.pydata.org/docs/user_guide/10min.html'],
                ['w3schools','https://www.w3schools.com/python/pandas/pandas_cleaning.asp']

            ],
            'Data Visualization' => [
                ['Youtube','https://youtube.com/playlist?list=PLRZ95XdMpwu92inPY5NlQ4q_O7411w-G6&si=4HS0V3xt2SpLhdOP'],
                ['Youtube','https://youtu.be/3Xc3CA655Y4?si=XB74yfRLAvSkQKlD'],
                ['Youtube','https://youtu.be/DAQNHzOcO5A?si=TcXInlMCGTl_IVpU'],
                ['Youtube','https://youtu.be/GcXcSZ0gQps?si=XP78Zb0AttUTAv9o'],
                ['Youtube','https://www.youtube.com/playlist?list=PL-osiE80TeTvipOqomVEeZ1HRrcEvtZB_'],
                ['kaggle','https://www.kaggle.com/learn/data-visualization'],
                ['matplotlib','https://matplotlib.org/stable/tutorials/index.html'],
                ['seaborn','https://seaborn.pydata.org/tutorial.html']

            ],
            'ML Concept' => [
                ['Youtube','https://youtu.be/Fa_V9fP2tpU?si=_DQpZ0ugMMulnz4j'],
                ['Youtube','https://youtube.com/playlist?list=PLWd4nYaF_Vx6EQZAyuh8F_eEsPhqNZ75K&si=-TcvQ0484OUQql_Y'],
                ['Youtube','https://youtu.be/trA74r0ykbY?si=4rfATnKRxDLH_SaY'],
                ['Youtube','https://youtu.be/o3DztvnfAJg?si=FrEeoS2ZUA13I6MT'],
                ['Youtube','https://youtu.be/eM_MbCbVGb0?si=WZEKnp-a6BmvZ7tn'],
                ['kaggle','https://youtu.be/dSCFk168vmo?si=1iR--Ekk6S3Yem1S'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/machine-learning/machine-learning/'],
                ['learn.microsoft','https://learn.microsoft.com/en-us/training/modules/fundamentals-machine-learning/'],
                ['cloud.google','https://cloud.google.com/discover/what-is-unsupervised-learning'],
                ['cloud.google','https://cloud.google.com/discover/what-is-supervised-learning'],
                ['coursera','https://www.coursera.org/learn/machine-learning'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/machine-learning/underfitting-and-overfitting-in-machine-learning/'],
                ['w3schools','https://www.w3schools.com/python/python_ml_train_test.asp']

            ],
        ],

        'Intermediate' => [

            'Classical ML' => [
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLULU0irPgs1SnKO6wqVjKUsQ&si=gEzZRL18debyhBPQ'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLULU0irPgs1SnKO6wqVjKUsQ&si=Ej2dHkgX-FQOq0T-'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUL3IJ4-yor0HzkqDQ3JmJkc&si=yVERUxSlORVFms96'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUJjeXUvUE0maghNuY2_5fY6&si=Mi_q-S3Li8axYyYD'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUIE96dI3U7oxHaCAbZgfhHk&si=Gq3RSuWf6MR7blSG'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUKxzEP5HA2d-Li7IJkHfXSe&si=MT83vlyZ3qP58oBy'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUIzaEkCLIUxQFjPIlapw8nU&si=9sCRQwiTPPhf6nur'],
                ['Youtube','https://youtube.com/playlist?list=PLblh5JKOoLUIcdlgu78MnlATeyx4cEVeR&si=3XyF6DM-5HMtcFbJ'],
                ['kaggle','https://www.kaggle.com/learn/intro-to-machine-learning'],
                ['coursera','https://www.coursera.org/specializations/machine-learning-introduction'],
                ['scikit-learn','https://scikit-learn.org/stable/supervised_learning.html']

            ],

            'Feature Engneering' => [
                ['Youtube','https://youtu.be/bqhQ2LWBheQ?si=im1pmq9ZFtVYC4DU'],
                ['Youtube','https://youtu.be/pYVScuY-GPk?si=rGy7hfRtCxmhJKmH'],
                ['kaggle','https://www.kaggle.com/learn/feature-engineering'],
                ['scikit-learn','https://scikit-learn.org/stable/modules/preprocessing.html']

            ],
            'Model Evaluation' => [
                ['Youtube','https://youtu.be/Kdsp6soqA7o?si=rK7uhD25L9xeePF9'],
                ['Youtube','https://youtu.be/vP06aMoz4v8?si=ZjjLjR7esd-NN6vQ'],
                ['Youtube','https://youtu.be/4jRBRDbJemM?si=Lt5Zx0Yq26YygY3L'],
                ['Youtube','https://youtu.be/85dtiMz9tSo?si=CYRP5F4y-F7rqSOC'],
                ['Youtube','http://www.youtube.com/playlist?list=PLuRv1IekA3YXlJIZIV8KjVcOEwoDXMY2b'],
                ['scikit-learn','https://scikit-learn.org/stable/modules/model_evaluation.html'],
                ['machinelearningmastery','https://www.machinelearningmastery.com/confusion-matrix-machine-learning/'],
                ['machinelearningmastery','https://www.machinelearningmastery.com/roc-curves-and-precision-recall-curves-for-classification-in-python/'],
                ['datacamp','https://www.datacamp.com/tutorial/k-fold-cross-validation'],
                ['coursera','https://www.coursera.org/learn/machine-learning-with-python']

            ],

            'Data Managment' => [
                ['Youtube','http://www.youtube.com/playlist?list=PLDoPjvoNmBAz6DT8SzQ1CODJTH-NIA7R9'],
                ['Youtube','https://youtu.be/HXV3zeQKqGY?si=5KZPgH-EEI6Hf38R'],
                ['Youtube','https://youtu.be/7mz73uXD9DA?si=GLaW1_zWFjHHXSe-'],
                ['Youtube','https://youtu.be/kGT4PcTEPP8?si=MDkDA4LLAi_byKVr'],
                ['w3schools','https://www.w3schools.com/sql/']

            ],
        ],


        'Advanced' => [

            'Deep Learning Fundamentals' => [
                ['Youtube','https://youtube.com/playlist?list=PLZHQObOWTQDNU6R1_67000Dx_ZCJB-3pi&si=rBZV3wlKokBhu8pC'],
                ['Youtube','http://www.youtube.com/playlist?list=PL2jXoCmw1KK26xY12QRd8aaWMQLUL2r4b'],
                ['Youtube','https://youtu.be/VyWAvY2CF9c?si=7dHyJmH9wb6byaPV'],
                ['Youtube','https://youtu.be/dPWYUELwIdM?si=GSebo-i-kXUEhptz'],
                ['coursera','https://www.coursera.org/specializations/deep-learning']

            ],
            'Deep Learning Framework' => [
                ['Youtube','http://www.youtube.com/playlist?list=PLhBhgortqAcjERnXJE1SqmKvL7UFw7xCp'],
                ['Youtube','https://youtu.be/V_xro1bcAuA?si=yVz66p3N9vpSVhRn'],
                ['Youtube','http://www.youtube.com/playlist?list=PL6-3IRz2XF5VbuU2T0gS_mFhCpKmLxvCP'],
                ['Youtube','https://youtu.be/tPYj3fFJGjk?si=50lc5IxedKIgbEv2'],
                ['Youtube','https://youtu.be/z-ZR_8BZ1wQ?si=r0IGpm-jFdks_LJH'],
                ['pytorch','https://docs.pytorch.org/tutorials/index.html']
            ],
            'Computer Vision' => [
                ['Youtube','https://youtu.be/jVwvnWRYcdk?si=sRYsmyzl_I8Y4Ij4'],
                ['Youtube','https://youtu.be/YRhxdVk_sIs?si=OLKzlTMEC2SzvANa'],
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5XHyhWNs-jxFtfERv4NlZmm&si=wci-aysWaDx6afS-'],
                ['Youtube','https://youtu.be/oXlwWbU8l2o?si=MPXk-TIsLaTIuepo'],
                ['Youtube','https://youtu.be/01sAkU_NvOY?si=8eTXygj17UD2cZTo'],
                ['Youtube','https://youtube.com/playlist?list=PLb49csYFtO2HAdNGChGzohFJGnJnXBOqd&si=6HjxyiG9Y6-5eLvV'],
                ['Youtube','https://youtu.be/wuZtUMEiKWY?si=eA0VScpNpREYufyg'],
                ['kaggle','https://www.kaggle.com/learn/computer-vision']
            ],
            'NLP' => [
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5XpTaCGcWlSx-hy8JcIxsU7&si=r5AbO9FuxqzX-ZEs'],
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5VFSRQLI7skbH8UPEdfCFBg&si=ERhdoIeSITHElnrF'],
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5WYpWu6Y8T3firJLflZ3Ufi&si=-sMYycaoAmzux1rT'],
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5W7brQxe9RHNpHSeUTuz-V_&si=46Ef8Xo-FnKnnzE3'],
                ['Youtube','https://youtube.com/playlist?list=PL6-3IRz2XF5W7QQ3mKJ1kldXpN3Vquzbc&si=QKZtTerkGGLl9Nkv'],
                ['Youtube','https://youtu.be/Q0qT-sbJb74?si=uYMrq0QaVuu4yczA'],
                ['Youtube','https://youtu.be/dIUTsFT2MeQ?si=lQjCW8fnzZvLGg2-'],
                ['Youtube','https://youtu.be/7kLi8u2dJz0?si=LRA1PwHHGjLQVlkh'],
                ['Youtube','https://youtube.com/playlist?list=PL3FW7Lu3i5Jsnh1rnUwq_TcylNr7EkRe6&si=XuPb4zlvicR93gA0'],
                ['huggingface','https://huggingface.co/learn/llm-course/chapter1/1']
            ],
        ],

    ],



    'Web' => [

        'Beginner' => [

            'HTML Fundamentals' => [
                ['codecademy','https://www.codecademy.com/courses/learn-html-fundamentals/lessons/intro-to-html/exercises/intro'],
                ['w3schools','https://www.w3schools.com/html/'],
                ['alison','https://alison.com/course/fundamentals-of-html?utm_source=chatgpt.com#google_vignette'],
                ['udemy','https://www.udemy.com/course/htmlcssjsphp/?utm_source=chatgpt.com&couponCode=MT260202G1B'],
                ['harmash','https://harmash.com/tutorials/html/overview'],
                ['youtube','https://youtube.com/playlist?list=PLDoPjvoNmBAw_t_XWUFbBX-c9MafPk9ji&si=PEvdp6_GFMUbrcpk'],
                ['youtube','https://youtu.be/q3yFo-t1ykw?si=8v6JUBNIwPrjxzSR'],
                ['youtube','https://youtube.com/playlist?list=PLr6-GrHUlVf_ZNmuQSXdS197Oyr1L9sPB&si=tZfOCm1JQ2oXA0k_']

            ],

            'CSS Styling' => [
                ['w3schools','https://www.w3schools.com/css/default.asp'],
                ['harmash','https://harmash.com/tutorials/css/overview'],
                ['harmash','https://harmash.com/tutorials/css/overview'],
                ['youtube','https://youtube.com/playlist?list=PLDoPjvoNmBAzjsz06gkzlSrlev53MGIKe&si=JggnhDfUr88TGh-5'],
                ['youtube','https://youtube.com/playlist?list=PL0Zuz27SZ-6Mx9fd9elt80G1bPcySmWit&si=ECMtdMepmffz9T8q']
            ],

            'JS Fundamentals' => [
                ['w3schools','https://www.w3schools.com/js/default.asp'],
                ['harmash','https://harmash.com/tutorials/javascript/overview'],
                ['youtube','https://youtube.com/playlist?list=PLDoPjvoNmBAx3kiplQR_oeDqLDBUDYwVv&si=baEZvgRwq3ykrZVs'],
                ['udemy','https://www.udemy.com/course/javascript-arabic/?srsltid=AfmBOor_yiarCpaEhrIVqQrZuPiVnO5GkZhcWv356nlN2lp3GDVQVWj_&utm_source=chatgpt.com'],
                ['youtube','https://youtube.com/playlist?list=PLZPZq0r_RZOO1zkgO4bIdfuLpizCeHYKv&si=HMkx0ilp8EvHiFjd']

            ],

            'Php Fundamentals' => [
                ['w3schools','https://www.w3schools.com/php/default.asp'],
                ['youtube','https://youtube.com/playlist?list=PLDoPjvoNmBAy41u35AqJUrI-H83DObUDq&si=W-UuTw4fb3wEQVvv'],
                ['youtube','https://youtube.com/playlist?list=PLZPZq0r_RZOO6bGTY9jbLOyF_x6tgwcuB&si=STc0rCrD52XgSVCl'],
                ['coddy.tech','https://coddy.tech/courses/introduction_to_php?utm_source=gc&utm_medium=Pmax&utm_campaign=23307891763&utm_content=&utm_term=&utm_source=gc&utm_medium=PmaxPythonBestGEOs&utm_campaign=23307891763&utm_content=6637617673&utm_term=&gad_source=1&gad_campaignid=23303768564&gclid=Cj0KCQiAnJHMBhDAARIsABr7b86zwRWh1Q9RO8aHJF-Lv7voItu-s-TyUMtNF_iB1KIOaCOhA7sdlPgaAjdIEALw_wcB']
            ],
        ],

        'Intermediate' => [

            'Fronted FrameWork' => [
                ['w3schools','https://www.w3schools.com/react/default.asp'],
                ['react.dev','https://react.dev/learn?utm'],
                ['freecodecamp','https://www.freecodecamp.org/news/react-for-beginners-handbook/?utm'],
                ['vuejs.org','https://vuejs.org/guide/introduction.html'],
                ['youtube','https://youtu.be/3qBXWUpoPHo?si=zTPxowAdP-KjC7dy'],
                ['kickassux','https://www.kickassux.com/free-ux-design-course?utm'],
                ['coursera','https://www.coursera.org/learn/uxui-design-fundamentals-usability-and-visual-principles?utm'],
                ['uxcel','https://app.uxcel.com/courses/design-accessibility?utm'],
                ['classcentral','https://www.classcentral.com/course/introduction-to-ux-and-accessible-design-19296?utm'],
                ['uxarb','https://uxarb.com/inclusive-design-basics/?utm'],
                ['youtube','https://youtu.be/-zkYtn7cIew?si=5jDoTo0KnDfQQ7_A']

            ],
            'Backend Basics' => [
                ['Youtube','https://youtube.com/playlist?list=PLQtNtS-WfRa8OF9juY3k6WUWayMfDKHK2&si=D9Yr73dkdm3C-Qis'],
                ['Youtube','https://youtube.com/playlist?list=PLWKjhJtqVAbmGQoa3vFjeRbRADAOC9drk&si=OyQkTbFEYakwXYtQ'],
                ['codecademy','https://www-codecademy-com.translate.goog/learn/learn-node-js?_x_tr_sl=en&_x_tr_tl=ar&_x_tr_hl=ar&_x_tr_pto=tc&_x_tr_hist=true'],
                ['nodejs','https://nodejs-org.translate.goog/en/learn/getting-started/introduction-to-nodejs?_x_tr_sl=en&_x_tr_tl=ar&_x_tr_hl=ar&_x_tr_pto=tc&_x_tr_hist=true'],
                ['w3schools','https://www.w3schools.com/nodejs/default.asp'],
                ['w3schools','https://www.w3schools.com/django/index.php'],
                ['youtube','https://youtu.be/DURM6yft8RU?si=7B8EHv92C7FtT6Pz'],
                ['blog.masteringbackend','https://blog.masteringbackend.com/expressjs-5-tutorial-the-ultimate-guide?utm'],
                ['freecodecamp','https://www.freecodecamp.org/news/backend-web-development-with-python-full-course/?utm']
            ],
            'DataBase' => [
                ['w3schools','https://www.w3schools.com/mysql/default.asp'],
                ['harmash','https://harmash.com/tutorials/sql/overview'],
                ['Youtube','https://youtube.com/playlist?list=PL93xoMrxRJIuicqcd1UpFUYMfWKGp7JmI&si=kFqbPhbPVsZDtBCd'],
                ['Youtube','https://youtu.be/7S_tz1z_5bA?si=DQGSDTI5HSdD64XH'],
                ['udemy','https://www.udemy.com/course/complete-database-course-sql-mysql-postgresql-mongodb/?utm'],
                ['w3schools','https://www.w3schools.com/mongodb/index.php'],
                ['w3schools','https://www.w3schools.com/postgresql/index.php'],
                ['Youtube','https://youtube.com/playlist?list=PLDoPjvoNmBAz6DT8SzQ1CODJTH-NIA7R9&si=fuPQHQhqfXGU-17r']

            ],
            'Authentication' => [
                ['learn.microsoft','https://learn.microsoft.com/en-us/entra/identity/authentication'],
                ['developer.mozilla','https://developer.mozilla.org/en-US/docs/Web/Security'],
                ['Youtube','https://youtube.com/playlist?list=PL4cUxeGkcC9jdm7QX143aMLAqyM-jTZ2x&si=5NxVrTxcbar1SRPN']
            ],
        ],

        'Advanced' => [

            'Full Stack Development' => [
                ['developer.mozilla','https://developer.mozilla.org/en-US/docs/Learn_web_development/Extensions/Server-side/Express_Nodejs/Introduction'],
                ['youtube','https://youtu.be/ed8SzALpx1Q?si=gvFdekU6auHE9KJ4'],
                ['scrimba','https://scrimba.com/fullstack-path-c0fullstack'],
                ['graphql.org','https://graphql.org/learn/'],
                ['youtube','https://www.youtube.com/live/YLpCPo0FDtE?si=Ilx8tdwUv7yXnuEl']

            ],
            'Security' => [
                ['Youtube','https://youtube.com/playlist?list=PLLlr6jKKdyK03AlNQ3Wyf7egZrdNf3-hr&si=DgkvJHbhEWxBvWxb'],
                ['owasp','https://owasp.org/www-community/attacks/xss/'],
                ['portswigger','https://portswigger.net/web-security/csrf'],
                ['portswigger','https://portswigger.net/web-security/sql-injection'],
                ['developer.mozilla','https://developer.mozilla.org/en-US/docs/Web/HTTPS'],
                ['cloudflare','https://www.cloudflare.com/learning/ssl/what-is-ssl/']
            ],
            'Performance Optimization' => [
                ['webpack','https://webpack.js.org/guides/code-splitting/'],
                ['developer.mozilla','https://developer.mozilla.org/en-US/docs/Web/Performance/Guides/Lazy_loading'],
                ['developer.chrome','https://developer.chrome.com/docs/workbox/service-worker-overview?hl=ar'],
                ['cloudflare','https://www.cloudflare.com/learning/cdn/what-is-a-cdn/']

            ],
            'Testing' => [
                ['developer.mozilla','https://developer.mozilla.org/en-US/docs/Learn/Tools_and_testing/Testing'],
                ['javascript','https://javascript.info/testing-mocha'],
                ['freecodecamp','https://www.freecodecamp.org/learn/quality-assurance/']
            ],

            'DevOps of web' => [
                ['youtube','https://youtube.com/playlist?list=PLEiEAq2VkUUJS6zkGgXeWw9l32EwRoYdR&si=Hr4cWbmqAxAGHU_o'],
                ['docker-curriculum','https://docker-curriculum.com/'],
                ['digitalocean','https://www.digitalocean.com/community/tutorials'],
                ['techworld-with-nana','https://www.techworld-with-nana.com/devops-bootcamp?utm_source=youtube.com&utm_medium=video&utm_campaign=yt-github-actions-2020'],
                ['youtube','https://youtu.be/R8_veQiYBjI?si=Fhut5iH2FughB9yZ'],
                ['youtube','https://youtu.be/pTFZFxd4hOI?si=czYsybyBVAglCAjw']
            ],
        ],
    ],



    'Mobile' => [

        'Beginner' => [

            'Programming Language Basics' => [
                ['w3schools','https://www.w3schools.com/java/default.asp'],
                ['w3schools','https://www.w3schools.com/kotlin/index.php'],
                ['w3schools','https://www.w3schools.com/swift/default.asp'],
                ['harmash','https://harmash.com/tutorials/java/overview'],
                ['dart','https://dart.dev/docs']

            ],

            'Mobile App Basics' => [
                ['docs.flutter','https://docs.flutter.dev/ui/navigation/deep-linking'],
                ['docs.flutter','https://docs.flutter.dev/ui/navigation'],
                ['docs.flutter','https://docs.flutter.dev/ui/adaptive-responsive'],
                ['developer.android','https://developer.android.com/guide/components/activities/activity-lifecycle?hl=ar'],
                ['youtube','https://youtu.be/7_g2vSrcqmE?si=YFzyLGcky7Xin-_Q'],
                ['youtube','https://youtube.com/playlist?list=PLRSkQ0ISElcbIJapEMf7Qd3AKBc29vHiu&si=vAaYnx58ZRRyskZV'],
                ['youtube','https://youtu.be/1o2L0DADzKQ?si=NNXveMNk4XpKSYCW'],
                ['youtube','https://youtu.be/ThmHV38Ecqk?si=Lm8e3CPM5RN-SoRp']
            ],

            'Local Storage' => [
                ['developer.android','https://developer.android.com/training/data-storage/shared-preferences?hl=ar'],
                ['developer.android','https://developer.android.com/reference/android/content/SharedPreferences'],
                ['developer.android','https://developer.android.com/training/data-storage/sqlite?hl=ar'],
                ['docs.flutter','https://docs.flutter.dev/cookbook/persistence/sqlite'],
                ['developer.android','https://developer.android.com/training/data-storage?hl=ar']

            ],
        ],

        'Intermediate' => [

            'State Managment' => [
                ['youtube','https://youtube.com/playlist?list=PLdIyiVt7IcnFNzA26LxaOlNMy7u1HBvUe&si=sTSPYiq-h6DP8h2b'],
                ['youtube','https://youtube.com/playlist?list=PL3aG1K3LWCrejzY86JLKfjw-hThXYSf_1&si=ZB8igFEjD7bvWU1a'],
                ['youtube','https://youtube.com/playlist?list=PLGVaNq6mHinjCPki-3xraQdGWKVz7PhgI&si=ZbMcPFS8pzyHTwtZ'],
                ['youtube','https://youtube.com/playlist?list=PL93xoMrxRJIv4wze2WyaotWpLX7Wk9u7R&si=qM6wOGuhfcTjL5xu'],
                ['youtube','https://youtube.com/playlist?list=PLcagi9unojzKGq4VDph2J4t3XBJWnJEF5&si=-wFw6aiTgardUXmT'],
                ['pub.dev','https://pub.dev/packages/provider'],
                ['youtube','https://youtube.com/playlist?list=PL93xoMrxRJIv4wze2WyaotWpLX7Wk9u7R&si=KoZ6DkwruxGEAmhY'],
                ['developer.android','https://developer.android.com/topic/libraries/architecture/viewmodel?hl=ar']

            ],

            'APIs Integration' => [
                ['youtube','https://youtu.be/R45cbJLwLco?si=95s8pF3ng1emQwho'],
                ['almdrasa','https://almdrasa.com/products/courses/http-requests-apis'],
                ['korsatcode','https://www.korsatcode.com/course/Flutter-Framework-for-iOS-Android-apps/8-flutter-with-json-api-provider'],
                ['docs.flutter','https://docs.flutter.dev/cookbook/networking/fetch-data'],
                ['pub.dev','https://pub.dev/packages/http'],
                ['filledstacks','https://www.filledstacks.com/post/flutter-api-integration/'],
                ['developer.apple','https://developer.apple.com/documentation/foundation/urlsession'],
                ['youtube','https://youtu.be/wlvKAT7SZIQ?si=eMAdbAxd0UL3j4qH']
            ],

            'Authentication' => [
                ['youtube','https://www.youtube.com/@Firebase'],
                ['youtube','https://youtu.be/Y2H3DXDeS3Q?si=A0Rvx7sD-amCRJMj'],
                ['kodeco','https://www.kodeco.com/flutter/articles'],
                ['youtube','https://youtube.com/playlist?list=PLGVaNq6mHinhxrVAusgWJPxQ3zdJBGFnu&si=38D6v6F3WVlPjSwn'],
                ['jwt.io','https://www.jwt.io/introduction#what-is-json-web-token'],
                ['youtube','https://youtube.com/playlist?list=PLQkwcJG4YTCT-lTlkOmE-PpRkuyNXq6sW&si=IcypmD8MLxVLdSVz'],
                ['firebase.flutter','https://firebase.flutter.dev/docs/auth/overview/'],
                ['firebase.google','https://firebase.google.com/docs/auth/ios/start?hl=ar'],
                ['pub.dev','https://pub.dev/packages/google_sign_in']

            ],

            'DataBase' => [
                ['firebase.google','https://firebase.google.com/docs/firestore?hl=ar'],
                ['youtube','https://youtube.com/playlist?list=PLOU2XLYxmsIKkg55tSHz0Xc8ZMVS1GJQL&si=zVDaTjXM1xRZM6kz'],
                ['youtube','https://youtube.com/playlist?list=PLjnZx7KD6m-ySasHtRKIX-04VuOYmGBmr&si=U2X7Hb4iV-3ry5kn'],
                ['linkedin','https://www.linkedin.com/pulse/mobile-app-data-storage-choosing-right-solution-your-application-3bepc']

            ],

            'App Architecture' => [
                ['developer.android','https://developer.android.com/topic/architecture?hl=ar'],
                ['youtube','https://youtu.be/juMHU0FtA6g?si=cglhktenfvE6vWYZ'],
                ['resocoder','https://resocoder.com/flutter-clean-architecture-tdd/'],
                ['youtube','https://youtu.be/EF33KmyprEQ?si=YJC_EWhfOTSvj5Ss']

            ],
        ],

       'Advanced' => [

            'Advanced UI/UX' => [
                ['youtube','https://youtu.be/h4vyOz4Tztg?si=N9yRPKI4FIp7vDYA'],
                ['youtube','https://youtube.com/playlist?list=PLxUBb2A_UUy9HKsPsmsWwgHRBC4XzFMu1&si=Tp1eH0hx9KQPjUOX'],
                ['m3.material.io','https://m3.material.io/foundations/layout/understanding-layout/overview'],
                ['youtube','https://youtube.com/playlist?list=PLzOt3noWLMtiX8unvZ_IryZDbD7qZ3nix&si=-rfH6f8ldSZO027J'],
                ['youtube','https://youtu.be/2AiWla1cc6Q?si=__nKga0af9ARvAJs'],
                ['youtube','https://youtu.be/cjagE2Ivaro?si=CkzIashAocTj6zj5']

            ],

            'Performance Optimization' => [
                ['youtube','https://youtu.be/_HD4eE4zcIc?si=Wgp4IqMo_ytJoP59'],
                ['docs.flutter','https://docs.flutter.dev/perf'],
                ['developer.android','https://developer.android.com/studio/profile/capture-heap-dump?hl=ar'],
                ['youtube','https://youtu.be/z13NY7etKHU?si=S7AULHntj-i_f8bZ'],
                ['pub.dev','https://pub.dev/packages/cached_network_image'],
                ['youtube','https://youtu.be/LLZNFS2W7Es?si=xIH42p7vnyjSSr2M'],
                ['youtube','https://youtube.com/playlist?list=PLOpRYaE1N6wLONLLmkyVSV80EKJvu2qfG&si=pXowix2n2AaUYkpR']
            ],

            'Security' => [
                ['pub.dev','https://pub.dev/packages/camera'],
                ['pub.dev','https://pub.dev/packages/geolocator'],
                ['pub.dev','https://pub.dev/packages/sensors_plus'],
                ['pub.dev','https://pub.dev/packages/permission_handler'],
                ['youtube','https://youtu.be/HoFWPPv1ih8?si=d2zUCaWPHb6Kzxvq']
  
            ],

            'Testing' => [
                ['youtube','https://youtu.be/nDCCwyS0_MQ?si=75-bA_ueDZ7xoe3X'],
                ['youtube','https://youtu.be/IOsrjuxnmYY?si=93WkNLBLIIS6bKSb'],
                ['youtube','https://youtu.be/qeFWCYc7u3E?si=TYv3JczIBqaYvP55'],
                ['docs.flutter','https://docs.flutter.dev/cookbook/testing']

            ],

            'App Deployment' => [
                ['youtube','https://youtu.be/zt_cNQse05s?si=MG2bEjBoN3dNDtr6'],
                ['youtube','https://youtu.be/itY1VXp9pkc?si=bWx5omUJp-4Eol1Q'],
                ['youtube','https://youtu.be/d8uEdeMgikU?si=-Uu1WBuUezM7ZzE2'],
                ['youtube','https://youtu.be/lrTTrSiHEuo?si=Z1cHS5QH8jMYFf6j'],
                ['youtube','https://youtu.be/odv_1fxt9BI?si=9DMKCmaDhOiwWEgS'],
                ['support.google','https://support.google.com/googleplay/android-developer/answer/9859152'],
                ['docs.flutter','https://docs.flutter.dev/deployment/android']

            ],
        ],
    ],

    'Cyber' => [

        'Beginner' => [

            'IT and Networking Basics' => [
                ['youtube','https://youtube.com/playlist?list=PLvGNfY-tFUN8D7uAQzkBfMkJ7XAFWSsIv&si=B9O6nT1WntdbYbi1'],
                ['youtube','https://youtube.com/playlist?list=PLH-n8YK76vIiDdOMRB-ylvns-_8Zl1euV&si=w0Ibxav15rSTnY9p'],
                ['youtube','https://youtu.be/mLlasPBFRWQ?si=1TRcsTZmFnT736tt'],
                ['youtube','https://youtube.com/playlist?list=PLHKTPL-jkzUqgHIBdC2I16QqZCSDN_6oS&si=jsRly-NePeWbULuy'],
                ['youtube','https://youtube.com/playlist?list=PLlKODvz5UTmdNudymefIhogsUDUtHQHsf&si=Rj4obuZ3vJzAZdYU'],
                ['youtube','https://youtu.be/inWWhr5tnEA?si=h8zD-lt_MGrthVqD'],
                ['guru99','https://www.guru99.com/data-communication-computer-network-tutorial.html']

            ],

            'Linux Fundamentals' => [
                ['youtube','https://youtu.be/42iQKuQodW4?si=Wip8NlqgQlnTuMvh'],
                ['youtube','https://youtu.be/pYdB2uG9pnE?si=INMT2fO1pO0_2dPx'],
                ['youtube','https://youtube.com/playlist?list=PLI6BBuYJW8gtCTkFxmzwfOLsGtvFzHc6W&si=2aarGMDmBc026vdu'],
                ['youtube','https://youtu.be/1K4R6dst6cU?si=wncq3a23bMzZt3u4'],
                ['youtube','https://youtu.be/bJw34fOvdqc?si=gbzgaoMlEz3GmbjF'],
                ['youtube','https://youtu.be/8f2Zsb89uoM?si=f_agEsiUaCuCfTci'],
                ['youtube','https://youtu.be/v392lEyM29A?si=u5ClUFuJthxsfNlL'],
                ['youtube','https://youtu.be/tK9Oc6AEnR4?si=e-Y4hC01dE61NsI9'],
                ['youtube','https://youtu.be/LnKoncbQBsM?si=MCj33_8ZdSQe9nqD'],
                ['youtube','https://youtu.be/PNhq_4d-5ek?si=8I-2cHpGnf_qTisE'],
                ['academy','https://academy.hsoub.com/devops/linux/'],
                ['academy','https://academy.hsoub.com/devops/linux/%D9%85%D8%B1%D8%AC%D8%B9-%D8%A5%D9%84%D9%89-%D8%A3%D8%B4%D9%87%D8%B1-%D8%A3%D9%88%D8%A7%D9%85%D8%B1-%D9%84%D9%8A%D9%86%D9%83%D8%B3-r615/'],
                ['learnshell','https://www.learnshell.org/'],
                ['labex.io','https://labex.io/linuxjourney'],

            ],

            'Security Fundamentals' => [
                ['youtube','https://youtu.be/DHCdJEpRu5Q?si=m_-RO3g078CtAASW'],
                ['youtube','https://youtu.be/kPPFNrlN3zo?si=fZ44yRMp-EI5K98J'],
                ['youtube','https://youtu.be/vywfrY24tNM?si=2Qp0vpP-QrM067qJ'],
                ['youtube','https://youtu.be/7ijBiXddB7w?si=iv-6xVWwahUwjVLZ'],
                ['youtube','https://youtu.be/AKwgjcvGWwg?si=4FuIlQfk_PsnHiKU'],
                ['youtube','https://youtu.be/mqzP7gJDM2s?si=BT0Vv00uKRUIzJZF'],
                ['youtube','https://youtu.be/9HOpanT0GRs?si=u5xylM5ASq62dBIV'],
                ['youtube','https://youtu.be/LLKza5oULAA?si=R-mxZzSEGrjrtxRK'],
                ['learn.microsoft','https://learn.microsoft.com/en-us/security/']

            ],

            'Introduction to Cryptography' => [
                ['youtube','https://youtube.com/playlist?list=PL3boZvi-wmN6r4HUGUpRSk5uhEcTNfjSS&si=TnqIEKmHoQm4Q-uF'],
                ['youtube','https://youtu.be/mZFuZHOESEY?si=EYGOdjxmkWHkCqtR'],
                ['youtube','https://youtu.be/o_g-M7UBqI8?si=Oh4DB-1AIgOLvZLr'],
                ['youtube','https://youtu.be/s22eJ1eVLTU?si=pqpz08OaSJfouKgm'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/ethical-hacking/what-is-a-symmetric-encryption/'],
                ['geeksforgeeks','https://share.google/D3b20IBlcRlA40sER'],
                ['geeksforgeeks','https://share.google/D3b20IBlcRlA40sER'],
                ['geeksforgeeks','https://share.google/YBuNuRHYcwlvh5zWZ']
            ],
        ],

        'Intermediate' => [

            'Ethical Hacking Basics' => [
                ['youtube','https://youtube.com/playlist?list=PLoP_aS_FoPQfBhDAHdRM097ttIFdk5sjZ&si=OkWq0FscX5L5LvHY'],
                ['youtube','https://youtube.com/playlist?list=PLVUHhNrnq_rnh8P359DSj9bFC0qjo3XRe&si=b3bgvHBRrjEIZntt'],
                ['youtube','https://youtu.be/qX2U-txF-bM?si=ohFtZv8UClhuuVdL'],
                ['youtube','https://youtu.be/PApCDws9n-0?si=dnz7ENoPL_L-ldtE'],
                ['youtube','https://youtu.be/FIsEQVd1-Wo?si=em5zHJpfMz27nb2K'],
                ['youtube','https://youtu.be/svjmAJKtZk4?si=bIFtrTcjk8aX4vSm'],
                ['youtube','https://youtu.be/4DahisB3XB4?si=V2n5RVkppa5uPt1N'],
                ['youtube','https://youtu.be/3Kq1MIfTWCE?si=4fSh7qbP5djPsRo-'],
                ['w3schools','https://www.w3schools.com/cybersecurity/index.php']

            ],

            'Penetration Testing Tool' => [
                ['youtube','https://youtu.be/rOLWMyEqPHs?si=Eb5d4MqPif0hfGIV'],
                ['youtube','https://youtu.be/4t4kBkMsDbQ?si=mkzm9UEGnXzJTHfK'],
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGM8V_3OEKhvCM9Xah3qDdIx&si=A-nUeyKyMxjvGS9_'],
                ['youtube','https://youtube.com/playlist?list=PLBbacta63jciTygwsow0qBxzqBS8WhEHB&si=rjK7Rnf-C-FbGh_M'],
                ['youtube','https://youtube.com/playlist?list=PL6FTq_v8hDb2mXzeLoXZcWGEa7DvYkSSb&si=D9NHSD0R8ygSBnw_'],
                ['youtube','https://youtu.be/pZoPTeYEiGc?si=a9YlH8zfiZxYShSM'],
                ['youtube','https://youtube.com/playlist?list=PLW8bTPfXNGdC5Co0VnBK1yVzAwSSphzpJ&si=vczo8KWD5rITcf6k'],
                ['nmap.org','https://nmap.org/book/man.html']
            ],

            'Web Security' => [
                ['youtube','https://youtu.be/fs2wdZMVGI0?si=7aOFAKBXKWg4V4CF'],
                ['youtube','https://youtu.be/yusJWttsD5o?si=vyIgz9ak_NtGR4lW'],
                ['youtube','https://youtu.be/xiw_O5shcK4?si=6JvlV2gnLjH95UFS'],
                ['youtube','https://youtu.be/m-0p2BFAZvI?si=sMXobdjamq-rbEMD'],
                ['youtube','https://youtube.com/playlist?list=PLroS9tRyoUGpAJPAgygxEP9imIZpkxFMi&si=sF8ELcBkm2lNXvEw'],
                ['youtube','https://youtu.be/0t4xGM1IMgo?si=-ASUVPoLTiRti_FI'],
                ['youtube','https://youtube.com/playlist?list=PLv7cogHXoVhXvHPzIl1dWtBiYUAL8baHj&si=0nxachXN_NHMHGsQ'],
                ['lab.wallarm','https://lab.wallarm.com/what/%d8%b1%d9%85%d8%b2-csrf/?lang=ar'],
                ['portswigger.net','https://portswigger.net/web-security/all-topics'],
                ['portswigger.net','https://portswigger.net/web-security/sql-injection'],
                ['portswigger.net','https://portswigger.net/web-security']
            ],

            'System Security' => [
                ['youtube','https://youtube.com/playlist?list=PLUl4u3cNGP62K2DjQLRxDNRi0z2IRWnNh&si=WgtYnNuzKxr9WfrJ'],
                ['youtube','https://youtu.be/kDEX1HXybrU?si=c29lDMdI1FpkIuNV'],
                ['youtube','https://youtu.be/wQSd_piqxQo?si=2ZS1yj1cT89-6Xn6'],
                ['youtube','https://youtu.be/wXoC46Qr_9Q?si=lQw-leWZ1cxGEHkX'],
                ['youtube','https://youtu.be/jbI19FwnBKY?si=K00BXS7dJ6lmTm0j'],
                ['youtube','https://youtu.be/YQKbs0ug0XQ?si=fgrw68yZU9puQls4'],
                ['wikipedia','https://en.wikipedia.org/wiki/Firewall_(computing)'],
                ['wikipedia','https://en.wikipedia.org/wiki/Intrusion_detection_system']

            ],

            'Vulnerability Assesment' => [
                ['youtube','https://youtu.be/hIbkwnOteTc?si=Hzvsp4xjI51qdzbA'],
                ['youtube','https://youtu.be/x87gbgQD4eg?si=luXe6aRL_RmVpjnZ'],
                ['youtube','https://youtu.be/LGh2SetiKaY?si=RFcpTcVRCqw200vx'],
                ['youtube','https://youtu.be/sEzN2U4Pqcs?si=6IcS4E8Um_B0tW93'],
                ['youtube','https://youtu.be/oSyEGkX6sX0?si=DHAInjUU5gqGtjNN'],
                ['wikipedia','https://en.wikipedia.org/wiki/Vulnerability_assessment']

            ],
        ],

       'Advanced' => [

            'Advanced Penetration Testing' => [
                ['youtube','https://youtu.be/Yr3kK6e3Nis?si=1gqxodorPhPis7hv'],
                ['youtube','https://youtu.be/7PpYavvu-6k?si=hSyrRpGjkwadLAco'],
                ['youtube','https://youtube.com/playlist?list=PLDrNMcTNhhYrBNZ_FdtMq-gLFQeUZFzWV&si=_n7uqOrUQRUZHi4G'],
                ['youtube','https://youtu.be/8pNxKX1SUGE?si=7IaOIBnCv9ZDJvgh'],
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGMoQ4B8dXy4kpPoo7ibemEm&si=cWKgxK29jE1AzdSu'],
                ['wikipedia','https://en.wikipedia.org/wiki/Privilege_escalation'],
                ['sciencedirect','https://www.sciencedirect.com/topics/computer-science/post-exploitation']

            ],

            'Malware Analysis' => [
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGMSlOI2HZGc08ePwut6A2Io&si=boF5sVB0Ho1Y8JIo'],
                ['youtube','https://youtu.be/vYW6TOwFK2M?si=ftFjoPZkVh7iBAw6'],
                ['youtube','https://youtu.be/m6L-Cfj8nt4?si=RQ9AotqjsOMiUfeq'],
                ['youtube','https://youtu.be/kn32PHG2wcU?si=4pT9hvTcv9ob8ims'],
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGMoQ4B8dXy4kpPoo7ibemEm&si=cWKgxK29jE1AzdSu'],
                ['wikipedia','https://en.wikipedia.org/wiki/Malware_analysis'],
                ['wikipedia','https://en.wikipedia.org/wiki/Sandbox_(computer_security)']

            ],

            'Reverse Engneering' => [
                ['youtube','https://youtu.be/CjMAMzke7nw?si=hbtIgFxvlg2oZXDu'],
                ['youtube','https://youtu.be/LdWU8JEfPhg?si=nJL_4bJCcXtzcSlV'],
                ['youtube','https://youtube.com/playlist?list=PLHJns8WZXCdu6kPwPpBhA0mfdB4ZuWy6M&si=YNGOLtlsw-I5oO6N'],
                ['youtube','https://youtube.com/playlist?list=PLt9cUwGw6CYG2kmL5n6dFgi4wKMhgLNd7&si=WzYUHv4WNSUq5Xz9'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-organization-architecture/what-is-assembly-language/']

            ],

            'Digital Forensics' => [
                ['youtube','https://youtube.com/playlist?list=PLJu2iQtpGvv-2LtysuTTka7dHt9GKUbxD&si=knDA2Agiohudcbrh'],
                ['youtube','https://youtu.be/o6boK9dG-Lc?si=EXvgMDtZZZS3bfcb'],
                ['youtube','https://youtube.com/playlist?list=PLlv3b9B16Zaf-uDlgouB0DMiPNYU_sJFN&si=26QK70OjIADTMjOP'],
                ['youtube','https://youtu.be/X2UiMLxRdhE?si=3TZ5MbKbDck4jA8u']

            ],

            'Red/Blue Team Security' => [
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGMjSlPmJ73Cydh9vCqxukCu&si=_i0ALaW4Zl6_wloz'],
                ['youtube','https://youtube.com/playlist?list=PLBf0hzazHTGNcIS_dHjM2NgNUFMW1EZFx&si=MacDBlyEecDq-UFJ']
            ],
        ],
    ],

 
    'Network' => [

        'Beginner' => [

            'Networking Basics' => [
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/computer-network-tutorials/'],
                ['youtube','https://youtu.be/wFjn2Nr7ylU?si=72qhf_OuQF4AA3O4'],
                ['youtube','https://youtu.be/z_CU-IeOEzU?si=2o5CWOXDFjrb4foM'],
                ['alison','https://alison.com/tag/computer-networking?utm_source=google&utm_medium=cpc&utm_campaign=Demand-Gen_Low-ROI-Countries&gad_source=1&gad_campaignid=22005425231&gclid=Cj0KCQiAnJHMBhDAARIsABr7b84vfIgyWgW_QO80xkLao-biSE0tM4SaOo83SfrlQiu1VCddrIZHsJgaAnMLEALw_wcB#google_vignette'],
                ['youtube','https://youtu.be/NyZWSvSj8ek?si=xR4hw1dNr2pNLYK-'],
                ['youtube','https://youtu.be/3zJ_ohCjFOs?si=s7CxbSHWw2zhBspk'],
                ['youtube','https://youtu.be/pGGDdKZvYpI?si=99cBiN5tEyRwoz2w'],
                ['youtube','https://youtu.be/uSKdjjw5zow?si=cB3lUvyehbIK602Y']

            ],

            'OSI and TCP/IP' => [
                ['youtube','https://youtube.com/playlist?list=PLLlr6jKKdyK3dM-mtOZfBx6FNTJZ4vgu0&si=lY-D6ouV8b_bZE8-'],
                ['cloudflare','https://www.cloudflare.com/learning/ddos/glossary/open-systems-interconnection-model-osi/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/open-systems-interconnection-model-osi/'],
                ['youtube','https://youtube.com/playlist?list=PLH-n8YK76vIiuIZoWvHL7AvtrDV7hR3He&si=WabdVu0apHV-65Dp'],
                ['youtube','https://youtu.be/bQ6woul_JrQ?si=8IH4s5nA-qu1NF-z'],
                ['youtube','https://youtu.be/2QGgEk20RXM?si=ghc8sApg-PnM6_o2']

            ],

            'IP Addresing and Subnetting' => [
                ['youtube','https://youtu.be/JiaL5A3qezg?si=J9KWFaH_pLELWJKP'],
                ['practicalnetworking','https://www.practicalnetworking.net/stand-alone/subnetting-mastery/'],
                ['youtube','https://youtu.be/s_Ntt6eTn94?si=ZD7sZ0svW4n9Vl73'],
                ['geeksforgeeks','https:/https://www.geeksforgeeks.org/computer-networks/difference-between-hids-and-nids//www.geeksforgeeks.org/computer-networks/differences-between-ipv4-and-ipv6/'],
                ['developer.android','https://developer.android.com/training/data-storage?hl=ar'],
                ['youtube','https://youtu.be/1xzuY7HIyyg?si=dVqGJ2wFYLKbF485'],
                ['youtube','https://youtu.be/2RTTYCnDBbI?si=1yk0r0TL7QcGkRci'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/classless-inter-domain-routing-cidr/'],


            ],

            'Networking Devices' => [
                ['cloudflare','https://www.cloudflare.com/learning/network-layer/what-is-a-network-switch/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/difference-between-hub-switch-and-router/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/network-devices-hub-repeater-bridge-switch-router-gateways/'],
                ['dev.to','https://dev.to/vignesh-j/computer-networking-full-course-5c80'],
                ['youtube','https://youtu.be/1z0ULvg_pW8?si=GUBIfWiv2t7O4VCQ'],
                ['youtube','https://youtube.com/playlist?list=PL7zRJGi6nMRzg0LdsR7F3olyLGoBcIvvg&si=hzeDQLJCjkzfl71Q']

            ],

            'Network Services and Ports' => [
                ['youtube','https://youtu.be/nuJamkM4RsM?si=B8b6Hp3FQ1_HkS-d'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/types-of-network-services/'],
                ['youtube','https://youtu.be/mpQZVYPuDGU?si=aXXLFwbXS2HlXJFH'],
                ['cloudflare','https://www.cloudflare.com/learning/dns/what-is-dns/'],
                ['youtube','https://youtu.be/g2fT-g9PX9o?si=XGGfqyLbhS0DzBDR'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/what-is-network-port/'],
                ['youtube','https://youtu.be/E5bSumTAHZE?si=mfbxKyuxaDjqtt_3'],
                ['youtube','https://youtu.be/dh8h-4u7Wak?si=f17p0pVlGNFL8Qi7']
            ],
        ],

        'Intermediate' => [

            'Routing & Switching' => [
                ['youtube','https://youtu.be/hU9bbmFhKxk?si=X3Gr_huDE7oqxaoD'],
                ['practicalnetworking','https://www.practicalnetworking.net/tag/routing/'],
                ['youtube','https://youtu.be/YRZxshxI1xs?si=4jWJ3yVc0uXv6mnK'],
                ['youtube','https://youtu.be/YRzr56cwgCg?si=TuhsGqcRWw8Gct6o'],
                ['youtube','https://youtu.be/23a6_qexTvs?si=MpPhNtWWAmzKcUXX'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/difference-between-static-and-dynamic-routing/'],
                ['youtube','https://youtu.be/rLNmrFh-sd8?si=CGi_8aMXfSAjsFlM'],
                ['youtube','https://youtu.be/QqFUf-o6wVE?si=dPv9Lta9zWLA377A'],
                ['davuniversity','https://davuniversity.org/images/files/study-material/routing%20protocol-csa510.pdf'],
                ['youtube','https://youtu.be/ATbzbST_OIw?si=tNHh5UjaSdbtMIa5'],
                ['youtube','https://youtu.be/MNZa-S4E-To?si=GaVgD838Uq3n-q5x'],
                ['youtube','https://youtu.be/bQ6D77QeMMg?si=0hlKckTBIeN7XLWP'],
                ['jumpcloud','https://jumpcloud.com/it-index/what-is-vlan-trunking']

            ],


            'Wireliss Network' => [
                ['youtube','https://youtu.be/Uz-RTurph3c?si=ZfLPBNuStdAm0Tko'],
                ['youtube','https://youtu.be/YEDutqG4C4U?si=3NJxPzlgZkrnKoD2'],
                ['ebsco','https://www.ebsco.com/research-starters/communication-and-mass-media/wireless-networks'],
                ['youtube','https://youtu.be/hhks5xSpM-0?si=p60Vi9gBzwPmnVIj'],
                ['youtube','https://youtu.be/bHrD-FIK2Zc?si=rCJv76GPD3saamOJ'],
                ['intel','https://www.intel.com/content/www/us/en/gaming/resources/wifi-6.html'],
                ['networklessons','https://networklessons.com/wireless/wi-fi-5-ghz-frequency-bands-and-channels'],
                ['youtube','https://youtu.be/WZaIfyvERcA?si=V-CUVr0_QJ4n9w-O'],
                ['strong-eu','https://www.strong-eu.com/blog/wpa-wpa2-wpa3-what-are-the-differences-between-wi-fi-security-standards']
   
            ],

            'Network Monitoring and Tools' => [
                ['youtube','https://youtu.be/xUSzx828lzA?si=kGCHpExvoRDNqZyt'],
                ['ibm','https://www.ibm.com/think/topics/network-monitoring'],
                ['youtube','https://youtu.be/vJV-GBZ6PeM?si=gb33CRjX8LMqqjnL'],
                ['youtube','https://youtu.be/8UZFpCQeXnM?si=bTpyie2t4MAWOESl'],
                ['redhat','https://www.redhat.com/en/blog/ping-traceroute-netstat'],
                ['wireshark','https://www.wireshark.org/docs/wsug_html_chunked/ChapterIntroduction.html'],
                ['youtube','https://youtu.be/qTaOZrDnMzQ?si=zux4ZNJdp69RW5Sr'],
                ['youtube','https://youtu.be/5oioSbgBQ8I?si=0YmbvnlX-Cl5L-A2'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/what-is-packet-sniffing/']

            ],


            'VPN and Remote Access' => [
                ['youtube','https://youtu.be/C4IHTdHYHuI?si=VN_9RuGa5t7bJzl0'],
                ['youtube','https://youtu.be/R-JUOpCgTZc?si=zSMlWx0yOUbutjXt'],
                ['azure.microsoft','https://azure.microsoft.com/en-us/resources/cloud-computing-dictionary/what-is-vpn'],
                ['youtube','https://youtu.be/CWy3x3Wux6o?si=l1Bi3cvNiEtL8bXu'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/difference-between-site-to-site-vpn-and-remote-access-vpn/'],
                ['youtube','https://youtu.be/C-xsRxYTNcg?si=Y7m8wJvkYbkuP_2p'],
                ['cloudflare','https://www.cloudflare.com/learning/network-layer/ipsec-vs-ssl-vpn/']
            ],

            'Troubleshooting' => [
                ['moldstud','https://moldstud.com/articles/p-step-by-step-guide-to-troubleshooting-common-network-issues-resolve-connectivity-problems-easily?utm'],
                ['app.sophia','https://app.sophia.org/tutorials/networking-basics-troubleshooting?utm'],
                ['m3luma','https://m3luma.com/windows-detected-ip-address-conflict/?utm'],
                ['support.microsoft','https://support.microsoft.com/ar-sa/topic/dhcp-%D8%A7%D9%84%D9%85%D9%83%D8%B1%D8%B1%D8%A9-%D8%B9%D9%84%D9%89-%D8%B4%D8%A8%D9%83%D8%A9-ip%D8%AD%D9%84-%D8%AA%D8%B9%D8%A7%D8%B1%D8%B6-%D8%B9%D9%86%D8%A7%D9%88%D9%8A%D9%86-d68499da-69a3-da3b-4630-d17e502adf50?utm'],
                ['youtube','https://youtu.be/2LhpLp1ZTuA?si=OsjRZhF5WFGam5Yx'],
                ['youtube','https://youtu.be/M6pxolcLl0Y?si=82jK1UYknN5PlGVB'],
                ['youtube','https://youtube.com/playlist?list=PLYB-6f0WQTufwyX7Nu2ypb5FtFbRuw0eC&si=ciMOxfJNeG5uUApv']

            ],
        ],

       'Advanced' => [

            'Advanced Routing & Switching' => [
                ['wikipedia','https://en.wikipedia.org/wiki/Open_Shortest_Path_First?utm'],
                ['cisco','https://www.cisco.com/c/en/us/support/docs/ip/border-gateway-protocol-bgp/5242-bgp-ospf-redis.html?utm'],
                ['cisco','https://www.cisco.com/c/ar_ae/support/docs/multiprotocol-label-switching-mpls/mpls/13736-mplsospf.html?utm'],
                ['youtube','https://youtu.be/kfvJ8QVJscc?si=a7kRGbuWc4E6pI1U'],
                ['youtube','https://youtube.com/playlist?list=PLQ1QMFywhzWz0Sv2hBbMtbDgeO22y006d&si=q-f8btVwbGNM24gC'],
                ['youtube','https://youtu.be/pDHLnApe6ok?si=WQJ1anf0wkam8IK_'],
                ['youtube','https://youtube.com/playlist?list=PLSHBzUeysAH8p1ENa4EE43M5VXZVOyp-t&si=HvgArAHmY60zWNgW']

            ],

            'Network Security' => [
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/stateless-vs-stateful-packet-filtering-firewalls/'],
                ['it.scribd','https://it.scribd.com/document/817471924/Ch8-firewall-IDS-IPS?utm'],
                ['bacuratec','https://bacuratec.sa/types-of-network-security/?utm'],
                ['macverify','https://www.macverify.com/blog/network-security-basics.php?utm'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/what-is-network-segmentation/'],
                ['swiftorial','https://www.swiftorial.com/tutorials/cybersecurity/cybersecurity/network_security/network_segmentation/?utm'],
                ['youtube','https://youtu.be/rL4-vbsN35w?si=RHTSqNYDA5mH4eLU'],
                ['youtube','https://youtu.be/cFvZvSoVy9g?si=ySAjZOpSqsG1M7Lj'],
                ['youtube','https://youtu.be/spdMK-vUoSw?si=UsNphfwV4LoH_aKP']

            ],

            'Cloud Networking' => [
                ['tutorialspoint','https://www.tutorialspoint.com/software-defined-networking/index.htm?utm'],
                ['learn.microsoft','https://learn.microsoft.com/en-us/windows-server/networking/sdn/?utm'],
                ['networkershome','https://www.networkershome.com/fundamentals/cloudnetworking/what-is-cloud-networking?utm'],
                ['amazon','https://aws.amazon.com/ar/vpc/?utm'],
                ['udemy','https://www.udemy.com/course/amazon-vpc-part-1/?utm'],
                ['youtube','https://youtube.com/playlist?list=PLLlr6jKKdyK1IdAI2mjlwY304unnncO5Z&si=xfhVfE-qan4HEWiW'],
                ['youtube','https://youtu.be/x-QNtpD4_UU?si=AAoZYm046W0cUrkE'],
                ['youtube','https://youtu.be/43tIX7901Gs?si=3XWRweIeS0fAZb9e']
  
            ],

            'QoS and Optimization' => [
                ['youtube','https://youtu.be/ecyR7FYUA4Q?si=XanybEDj6rc3yvqF'],
                ['youtube','https://youtu.be/hDjp2zT2OlQ?si=sCBv9S2PlicNBK8M'],
                ['youtube','https://youtu.be/Lpd75nQNHYw?si=oBzp38jYSD2Zkn1h'],
                ['youtube','https://youtu.be/wo3M5G9ZHo0?si=oMoaXLiDnmcAHrMf'],
                ['techtarget','https://www.techtarget.com/searchunifiedcommunications/definition/QoS-Quality-of-Service?utm'],
                ['simeononsecurity','https://simeononsecurity.com/network-plus/bandwidth-management-qos-networkplus-certification-exam-guide/?utm'],
                ['network-guides','https://network-guides.com/quality-of-service-qos-prioritizing-network-traffic/?utm']

            ],

            'Enterprise Networking' => [
                ['youtube','https://youtu.be/SeL8haa6Ux4?si=nSVhe-09gzG4287O'],
                ['youtube','https://youtu.be/aHDi-eSm6Ls?si=mBqgpD1wUvdi15G0'],
                ['youtube','https://youtu.be/sCR3SAVdyCc?si=Fe_whHHYsE1KRfL9'],
                ['netboxlabs','https://netboxlabs.com/blog/enterprise-network-design-guide/?utm'],
                ['auvik','https://www.auvik.com/franklyit/blog/network-design-best-practices/?utm'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-networks/network-design-principles-for-high-availability-and-redundancy/?utm'],
                ['cycle.io','https://cycle.io/learn/load-balancing-and-high-availability?utm']

            ],




            'Network Automation' => [
                ['youtube','https://youtube.com/playlist?list=PLLlr6jKKdyK3b9plM7HmuEIECd2VLwruq&si=Z_k5MNGiYWKVSwkU'],
                ['youtube','https://youtu.be/l5k1ai_GBDE?si=KlMfGKBCuuSClb23'],
                ['youtube','https://youtu.be/vvmGMP0lwRw?si=D6Taj6EoybZX2tah'],
                ['tdtl.world/technology-training-programs','https://tdtl.world/technology-training-programs/wp-content/uploads/2024/05/2023324290-NetworkAutomationwithPythonandAnsible.pdf?utm']

            ],
        ],
    ],

    'OS' => [

        'Beginner' => [

            'OS Basics' => [
                ['youtube','https://youtu.be/pVzRTmdd9j0?si=FSe_0vMKfw5YwYMq'],
                ['youtube','https://youtu.be/kK7L2ISGucM?si=hl4FWnc_xzYfcQko'],
                ['youtube','https://youtu.be/OrM7nZcxXZU?si=nO7TZKTTCxpULIb0'],
                ['alison','https://youtu.be/PujjqfUhtNo?si=CNyL37Rb_BzBCsK3'],
                ['youtube','https://youtu.be/KN8YgJnShPM?si=xxUDYtHLE4wQlaHe'],
                ['youtube','https://youtu.be/-gSv_-rF_k0?si=WRX7lBnYuS-9r6fT'],
                ['tutorialspoint','https://www.tutorialspoint.com/operating_system/os_overview.htm'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/types-of-operating-systems/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/functions-of-operating-system/']


            ],

            'Computer Architecture Basics' => [
                ['youtube','https://youtu.be/OdziYWEkDIM?si=bXvT3QACoqiVrhyT'],
                ['youtube','https://youtu.be/F18RiREDkwE?si=UgRztpbFFq_8EIlN'],
                ['youtube','https://youtu.be/Q3rssfwxcyA?si=oPuRj0SHvG4el0y1'],
                ['youtube','https://youtu.be/Ol8D69VKX2k?si=ZFhzax6VrzYI3nz7']

            ],

            'File System' => [
                ['youtube','https://youtu.be/KN8YgJnShPM?si=-DQ6g7U376Ag7G2I'],
                ['youtube','https://youtu.be/KTU5O9FTztI?si=wAHaziRAec4ivESL'],
                ['youtube','https://youtu.be/q7kqrGC_sXE?si=q-lbnw0vD5rMLs55'],
                ['youtube','https://youtu.be/_h30HBYxtws?si=9f-raoLFT9b_hI2Z'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/understanding-file-system/'],
                ['swiftorial','https://www.swiftorial.com/tutorials/operating_systems/linux/introduction_to_linux/linux_file_system'],
                ['studocu','https://www.studocu.com/in/document/guru-gobind-singh-indraprastha-university/btech/unit-4-few-topics-fat-vs-ntfs-vs-ext2-vs-ext3/64048440?utm'],


            ],

            'Process and Threads' => [
                ['youtube','https://youtu.be/Fjr45TQBiOA?si=4iEtwgSf9pjhcXIm'],
                ['youtube','https://youtu.be/jZ_6PXoaoxo?si=ksdjSXJrn4P1SrNH'],
                ['youtube','https://youtu.be/LOfGJcVnvAk?si=FD3rDA79ZRx0uKtN'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/difference-between-process-and-thread/?utm'],
                ['wikipedia','https://en.wikipedia.org/wiki/Process_state?utm']

            ],

            'CommandLine Basics' => [
                ['youtube','https://youtube.com/playlist?list=PLT98CRl2KxKHaKA9-4_I38sLzK134p4GJ&si=uezq4kjW-X1XGg8j'],
                ['youtube','https://youtube.com/playlist?list=PL6gx4Cwl9DGDV6SnbINlVUd0o2xT4JbMu&si=tuDqs1HYe4ld5tNc'],
                ['youtube','https://youtu.be/H0gwnFV_SFs?si=fxg5F0zRFF92vM4-'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/linux-unix/basic-linux-commands/'],
                ['youtube','https://youtu.be/dzHscTzpAME?si=GuMprmF-Fds3ptvP'],
                ['support.microsoft','https://support.microsoft.com/en-us/windows/command-prompt-and-windows-powershell-6453ce98-da91-476f-8651-5c14d5777c20']
            ],
        ],

        'Intermediate' => [

            'Process Managment' => [
                ['youtube','https://youtube.com/playlist?list=PLIY8eNdw5tW_lHyageTADFKBt9weJXndE&si=uswyYyxbJ9N-mbZy'],
                ['youtube','https://youtu.be/vTgccrbYHYs?si=9ipm5T979gA5xXQb'],
                ['youtube','https://youtu.be/dJuYKfR8vec?si=W00BdnEfMLWsev7z'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/process-schedulers-in-operating-system/'],
                ['hostragons','https://www.hostragons.com/ar/%D9%85%D8%AF%D9%88%D9%86%D8%A9/%D8%AE%D9%88%D8%A7%D8%B1%D8%B2%D9%85%D9%8A%D8%A7%D8%AA-%D8%AC%D8%AF%D9%88%D9%84%D8%A9-%D8%A7%D9%84%D9%85%D8%B9%D8%A7%D9%85%D9%84%D8%A7%D8%AA-fcfs-%D9%88sjf-round-robin/?utm'],
                ['wikipedia','https://en.wikipedia.org/wiki/Inter-process_communication?utm']

            ],

            'Memory Managment' => [
                ['youtube','https://youtu.be/2quKyPnUShQ?si=bPzG9abzUhChKdS-'],
                ['youtube','https://youtu.be/gTtfq610s48?si=BBubAcLOU_DaCMQz'],
                ['youtube','https://youtube.com/playlist?list=PL8tc66sMn9Kjt2Wf5H9O-TMqZFQukoCQ1&si=LRk6FzEpn6rLP6aQ'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/virtual-memory-in-operating-system/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/memory-management-in-operating-system/']
   
            ],

            'Storge and File System' => [
                ['youtube','https://youtube.com/playlist?list=PLaBMACsXuUE7bpZ0J4zv5Pk2ejUzc8KUG&si=J_9Q9oQIM7qiqcwp'],
                ['youtube','https://youtu.be/ISJ44S5sZu8?si=QvbxCUwstev3jRdY'],
                ['youtube','https://youtu.be/3P-fUxzkmdY?si=sjRUs4awavFW3tJ5'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/disk-scheduling-algorithms/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/file-system-implementation-in-operating-system/']

            ],

            'Input/Output Managment' => [
                ['youtube','https://youtu.be/F18RiREDkwE?si=DEzG7TEdshgWgaiu'],
                ['youtube','https://youtu.be/iSiyDHobXHA?si=bk6cwZhhT0Fu8uZd'],
                ['youtube','https://youtu.be/Xy_rLc-E4Xg?si=-0hwrBY9xpwL_XM_'],
                ['youtube','https://youtu.be/G7bqvpAw7HE?si=TmCi4Z_FPP7NXHko'],
                ['wikipedia','https://en.wikipedia.org/wiki/Device_driver?utm']
            ],

            'Scripting and Automation' => [
                ['youtube','https://youtube.com/playlist?list=PLT98CRl2KxKGj-VKtApD8-zCqSaN2mD4w&si=3Xa81SKLHPUyByz8'],
                ['youtube','https://youtu.be/j6-r--HFcuI?si=IwxsQjn0dpAZpHyW'],
                ['w3schools','https://www.w3schools.com/bash/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/linux-unix/bash-scripting-introduction-to-bash-and-bash-scripting/']

            ],
        ],

       'Advanced' => [

            'Advanced Process Managment' => [
                ['youtube','https://youtu.be/uh6K9g0RPjk?si=MjNKsttrrRhE_BjJ'],
                ['youtube','https://youtu.be/XDIOC2EY5JE?si=ZhRXvSrqYyer-B-p'],
                ['youtube','https://youtu.be/PgDaJEjlBuI?si=nNzWClADinuw-_So'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/mutex-vs-semaphore/'],
                ['reddit','https://www.reddit.com/r/learnpython/comments/1egf6r7/multi_threading_vs_concurrency/']

            ],

            'Advanced Memory Managment' => [
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/virtual-memory-in-operating-system/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/design-and-implementation-in-operating-system/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/page-replacement-algorithms-in-operating-systems/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/memory-protection-in-operating-systems/'],
                ['youtube','https://youtu.be/nkV11C8G998?si=ukP250HkX9V61k1W'],
                ['youtube','https://youtube.com/playlist?list=PLIY8eNdw5tW-BxRY0yK3fYTYVqytw8qhp&si=smnQ09aHPIDRw6YC'],
                ['youtube','https://youtu.be/KTx9RNfyFO8?si=8hGnd1mXk8-0QBwG']

            ],

            'Kernal and OS Internal' => [
                ['youtube','https://youtu.be/S-zxoWY5u6s?si=vyQZz9BKsmsjAIpV'],
                ['youtube','https://youtu.be/UMsscWnM67g?si=GIOiWg6bnBHLQdVc'],
                ['youtube','https://youtu.be/lhToWeuWWfw?si=C4e-853VusUIr64i'],
                ['youtube','https://youtu.be/XpFsMB6FoOs?si=Ip_VOMgUTuGGVdIm'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/booting-and-dual-booting-of-operating-system/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/introduction-of-system-call/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/difference-between-microkernel-and-monolithic-kernel/']
  
            ],


            'Security and Protoction' => [
                ['youtube','https://youtu.be/aCBqGgNlZK0?si=4lGD6oQIiGUgWkpr'],
                ['youtube','https://youtu.be/i3sRSS6fN0g?si=zEVGAP5JGdUKCLt4'],
                ['is.muni.cz','https://is.muni.cz/th/uny2u/xcsanyi_bc.pdf']

            ],

            'Virtualization' => [
                ['youtube','https://youtu.be/daDbY2iDmU0?si=_dmJc1Ws0ts5SPVM'],
                ['youtube','https://youtu.be/LMAEbB2a50M?si=JQO8K-x4bvogpGhM'],
                ['youtube','https://youtu.be/0qotVMX-J5s?si=HPduxUCOpq953ZHd'],
               
                ['geeksforgeeks','https://www.geeksforgeeks.org/operating-systems/difference-between-virtual-machines-and-containers/'],
                ['cycle.io','https://medium.com/@amir21abdallah/docker-container-type-1-and-type-2-hypervisor-virtualization-part-i-65e2e44b64eb']

            ],
        ],
    ],


    'DB' => [

        'Beginner' => [

            'DataBase Basics' => [
                ['youtube','https://youtu.be/wR0jg0eQsZA?si=mDrYAvvFdvFPucDV'],
                ['youtube','https://youtu.be/hRulZhTtUTg?si=rciMC76AN8Sp02z0'],
                ['youtube','https://youtu.be/E9AgJnsEvG4?si=iscjiGLOorRdxaRw'],
                ['youtube','https://youtu.be/Fa0Q-5DMUBg?si=icvQ8QFofCmHq-hl'],
                ['youtube','https://youtu.be/zxTYvebpVq8?si=M_nNHd7g8VbCYEiY'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/computer-science-fundamentals/basic-database-concepts/'],
                ['geeksforgeeks','https://share.google/AaHWksXQGmaFkMdp8']


            ],

            'Sql Basics' => [
                ['youtube','https://youtu.be/kbKty5ZVKMY?si=wg-WfkJ6elnhNY6E'],
                ['youtube','https://youtu.be/HXV3zeQKqGY?si=jH9RBtCSptrGLOR'],
                ['youtube','https://youtu.be/5tEApCGgpEQ?si=8vvEnZ5k5D-SwpYR'],
                ['youtube','https://youtu.be/yg4ZhrjqYf8?si=jZZH1oqvZ2bnmRxt'],
                ['youtube','https://youtu.be/QX1eOjAZzws?si=Lu5iScZJvQ30LtLm'],
                ['youtube','https://youtu.be/zGSv0VaOtR0?si=wL2tOQoTXyfHiwMq'], 
                ['w3schools','https://www.w3schools.com/sql/default.asp'],
                ['support.microsoft','https://share.google/O5cEPZoWfDAOtUbje'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/sql/sql-tutorial/']
            ],

            'Data Modiling' => [
                ['youtube','https://youtu.be/OwQoj3GJfNY?si=ijxEUdqVYfJBU75Z'],
                ['youtube','https://youtube.com/playlist?list=PLrL_PSQ6q060qiKUuOkYZnqg0uERbdPrA&si=cwHdi4E--JUjMXW'],
                ['youtube','https://youtu.be/MR0PK0qkCD8?si=HEjH7m3vCnSyQPb9'],
                ['youtube','https://youtube.com/playlist?list=PL8F16BAACB5FF94C7&si=tbrZdj8LxKZ_j0C6'],
                ['youtube','https://youtube.com/playlist?list=PLBlnK6fEyqRjbGLICGNDfggpjgvL7OG2F&si=yWckiFYUMtceD06x'],
                ['geeksforgeeks',' https://www.geeksforgeeks.org/data-analysis/data-modeling-a-comprehensive-guide-for-analysts/'],
                ['support.microsoft',' https://share.google/3IIfsa5jMPWFnWk3k'],
                ['geeksforgeeks',' https://share.google/Muw6Jc1Iv8ddM9BfR'],
                ['geeksforgeeks',' https://share.google/NL8T9JjMYaO5cfYoI'],
                ['support.microsoft',' https://share.google/L0Z4MPakBSojSwE7A']


            ],

            'Constraints and Indexes' => [
                ['youtube','https://youtu.be/yfZww-qEpb0?si=0-v5iZDhsslu5tD3'],
                ['youtube','https://youtu.be/pSS-9Nt2BF0?si=xBxHulkzXVnmecKc'],
                ['youtube','https://youtu.be/BIlFTFrEFOI?si=ptMuhLUlNQFiifNy'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/sql/sql-constraints/'],
                ['geeksforgeeks','https://share.google/2XPPkEnwKu4TwQJuV']

            ],

        ],

        'Intermediate' => [

            'Advanced Sql' => [
                ['youtube','https://youtube.com/playlist?list=PLUaB-1hjhk8EBZNL4nx4Otoa5Wb--rEpU&si=1nk7U-X1qg7idYPq'],
                ['youtube','https://youtu.be/Yh4CrPHVBdE?si=LZ4nt9YY8jw1gcyz'],
                ['youtube','https://youtu.be/nJIEIzF7tDw?si=F8AlR5BYiVWEKGqI'],
                ['youtube','https://youtu.be/HR2DJYE0Kss?si=SGbLtVF5Cidqu3k_'],
                ['youtube','https://youtu.be/wHUOeXbZCYA?si=pXg9bWZQzY6M7vte'],
                ['kaggle','https://www.kaggle.com/learn/advanced-sql'],
                ['geeksforgeeks','https://share.google/1yAtKPoCC6AfF0eiJ'],
                ['geeksforgeeks','https://share.google/6oxe0PmgU6JnDwGXD']

            ],

            'DataBase Design' => [
                ['youtube','https://youtu.be/ztHopE5Wnpc?si=qVC-vaI8sNeo_cbT'],
                ['youtube','https://youtube.com/playlist?list=PL_c9BZzLwBRK0Pc28IdvPQizD2mJlgoID&si=X9WNiZDcer7eolNz'],
                ['youtube','https://youtu.be/GFQaEYEc8_8?si=A2U6xhRrmeHXecIR'],
                ['youtube','https://youtu.be/4bTq0GdSeQs?si=XN73VO9RYev6ZhDY'],
                ['youtube','https://youtu.be/7LRH7DY1QbQ?si=yeaDt0_4bZUE3_3H'],
                ['geeksforgeeks','https://share.google/lcKkg6HCNbGHdCqI5'],
                ['geeksforgeeks','https://share.google/7MiMvOFlQqWzZnZ4h'],
                ['geeksforgeeks','https://share.google/heH72k9j343QJrTlH'],
                ['geeksforgeeks','https://share.google/b0LZ1PKqvxUlcXq5T'],
                ['support.microsoft','https://support.microsoft.com/en-us/office/database-design-basics-eb2159cf-1e30-401a-8084-bd4f9c9ca1f5'],
                ['support.microsoft','https://share.google/TgN4BN0oELRYJ0EBl'],
                ['codilime','https://share.google/cWQKx1unzzjbY12Vm']
   
            ],

            'NoSql DataBase' => [
                ['youtube','https://youtu.be/FRqrZGB8NBs?si=NaCt9avqk5JkBWWD'],
                ['youtube','https://youtube.com/playlist?list=PL4cUxeGkcC9h77dJ-QJlwGlZlTd4ecZOA&si=i7UMLv2m72INxu3F'],
                ['youtube','https://youtu.be/_Ss42Vb1SU4?si=v_8pwz6jJbTdJJHS'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/introduction-to-nosql/'],
                ['w3schools','https://share.google/vMZQDg5DS4XvukzPw']

            ],

            'Performance and Optemization' => [
                ['youtube','https://youtu.be/GA8SaXDLdsY?si=3p2sTcUeMjQms5kX'],
                ['youtube','https://youtu.be/dGAgxozNWFE?si=YPE3kUwm9ffkgxDW'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/query-optimization-in-relational-algebra/'],
                ['geeksforgeeks','https://share.google/PsQBVogwZAjTF9hxk']
            ],

            'Backup and Recovery' => [
                ['youtube','https://youtu.be/Aupe8vPuFIk?si=sj8-jwU6vQxzZ6oU'],
                ['youtube','https://youtu.be/bZFXxhkrD44?si=vflVmjpK_ENLRqZ-'],
                ['youtube','https://youtu.be/Z-6GkXCTPic?si=KZs-SsHnXp-Q9bXY'],
                ['youtube','https://youtu.be/WZqGS-wczaY?si=Ca5DO6jz_8bEnzlP'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/postgresql/how-to-dump-and-restore-postgresql-database/'],
                ['docs.cloud','https://share.google/9cyDuvgFULQ2HUwz9']

            ],
        ],

       'Advanced' => [

            'Advanced Transactions' => [
                ['youtube','https://youtu.be/XN4f8h5MxoY?si=sQGa34wM9LMejZxP'],
                ['youtube','https://youtu.be/-gxyut1VLcs?si=ylR1WMd_c9JizyLO'],
                ['youtube','https://youtu.be/QB-1tPVxNek?si=FcQnoJM3Rshlbdvp']
            ],

            'DataBase Security' => [
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/database-security/'],
                ['geeksforgeeks','https://youtu.be/NWissPtTIWY?si=k3ySvWkAnx_dgCCd'],
                ['youtube','https://youtu.be/D-eYYPP5J1Y?si=NhiTbwjCd7ifwHow'],
                ['youtube','https://youtu.be/z96ALO0EGq8?si=IxkpuS4QVKk96wbE'],
                ['youtube','https://youtu.be/05Wbt1el5A8?si=i0eBaHGJ_rFqtGCj']

            ],

            'Distrebuted DataBase' => [
                ['youtube','https://youtu.be/J-sj3GUrq9k?si=wWXZQr0tzrsHLjfd'],
                ['youtube','https://youtube.com/playlist?list=PL5Tp7iTffRrdoRIjWXe8kWK4YyE6YNJHg&si=ADqAjz8U_sXf1T81'],
                ['youtube','https://youtu.be/BHqjEjzAicA?si=qiQlolkAtu9HzFxk'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/distributed-database-system/'],
                ['tutorialspoint','https://share.google/kuymWNNNUSyVLzlYq']
  
            ],

            'Big Data and Analytics' => [
                ['youtube','https://youtu.be/k4tK2ttdSDg?si=XBM8bwznS0y-z9oD'],
                ['youtube','https://youtu.be/OW5OgsLpDCQ?si=03DG_J34TPNL5nHR'],
                ['youtube','https://youtu.be/iw-5kFzIdgY?si=DEUodViGd4fs0vm7'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/big-data/data-warehousing/'],
                ['geeksforgeeks','https://share.google/3Y4MsGgQGanjFzUBO'],
                ['youtube','https://share.google/WYDOn3qp0W8kQLAu6'],
                ['ibm','https://share.google/BVnQbBrOcMPmRtjRH']

            ],

            'DataBase Administration' => [
                ['geeksforgeeks','https://www.geeksforgeeks.org/sql/sql-performance-tuning/'],
                ['linkedin','https://www.linkedin.com/pulse/failover-high-availability-ha-disaster-recovery-dr-prabhat-kumar-45ptc'],
                ['youtube','https://youtube.com/playlist?list=PLBrWqg4Ny6vXQZqsJ8qRLGRH9osEa45sw&si=m07-nSseSzBcH6J9'],
                ['youtube','https://youtu.be/0qotVMX-J5s?si=HPduxUCOpq953ZHd'],
                ['youtube','https://youtu.be/J0ErkLo2b1E?si=d583dZb45PJNPC_t'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/dbms/what-is-disaster-recovery-planning-in-dbms/'],
                ['youtube','https://youtu.be/Q9_4px_--yg?si=nTSVP0lF1iaZFmrF']

            ],

            'Cloud DataBase' => [
                ['youtube','https://youtu.be/b2nqgUiLgvw?si=3cuaWLBYSVbhWyMu'],
                ['youtube','https://youtu.be/xRjWZwh5Ip4?si=ohhLuqFQuJlLVh5E'],
                ['youtube','https://youtu.be/bUSU1e9j8wc?si=1vZ43agtnOnn_reA'],              
                ['youtube','https://youtube.com/playlist?list=PLlrxD0HtieHi5c9-i_Dnxw9vxBY-TqaeN&si=N1D5LzFYYwZsFf2w'],              
                ['geeksforgeeks','https://www.geeksforgeeks.org/devops/microsoft-azure-azure-sql-database/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/devops/amazon-rds-vs-dynamodb/'],
                ['geeksforgeeks','https://cloud.google.com/products/firestore']

            ],

            'Advanced Analytics' => [
                ['youtube','https://youtu.be/LxcH6z8TFpI?si=SxH58BynX7ST4jep'],
                ['youtube','https://youtu.be/ya4298V8Mqo?si=g9Z1kr7hVne6KYdU'],
                ['youtube','https://youtu.be/EnuxlGXqew4?si=EiYlzDDK3ql6Pm7p'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/data-engineering/what-is-real-time-processing-in-data-ingestion/'],
                ['geeksforgeeks','https://www.geeksforgeeks.org/data-engineering/what-is-data-lake/'],
                ['gigaspaces','https://www.gigaspaces.com/data-terms/real-time-data-processing']

            ],
        ],
    ],

];



//  فحص وجود البيانات يعني هل لهاد المجال و المستوى والدرس رايط في مصفوفة الروايط

if(!isset($resources[$field][$level][$step])){ // هان معناها اذا فش اله روابط في مصفوفة الروايط
    die(" No resources found for this topic."); // رح يوقف الكود و يطبع رسالة
}
// هاد متغير عشان لو في روابط رح يتم تخزين روايط الدرس يلي في المستوى يلي في المجال المختار فيه
// عشان لقدم رح يتم استخدام هاد المتغير عشان اعرض الروابط لكل درس
$links = $resources[$field][$level][$step];

?>

<!DOCTYPE html>
<html>
<head>
           <!-- 
هاد الميتا من خلالها رح اساعد انه الموقع رح يظهر في نتائج البحث
    -->
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Take a skill assessment test, visualize your learning journey with an interactive roadmap, and access curated guides for every step. Stop guessing, start learning." >
<meta name="keywords" content="Skill Assessment, Skill Mapping,Competency Test,Skill Level Test,Professional Development,Learning Roadmap,Learning Path,Step-by-Step Guide,Educational Resources,Tech Roadmap,Programming Path,Web Development Roadmap, Mobile App Development Path, Cybersecurity Guide, Networking Skills Test, Database Management Learning, Operating Systems Course, AI and Machine Learning Roadmap, Ethical Hacking Path, Data base Roadmap" >
<meta name="robots" content="nofollow" >
<meta http-equiv="author" content="Sara Hamad & Yara Hamad" >

<link href="resources.css" type="text/css" rel="stylesheet">

<title>Navigo-Resources</title>
</head>

<body>
<!-- عشان يتم عرض الروابط يلي تم تخزينها -->
<div class="box">

<h1><?php echo $step; ?></h1> <!-- عشان يتم طباعة اسم الدرس من مصفوفة  step--> 

<p>
<?php echo $field; ?> → <?php echo $level; ?> <!-- عشان يتم طباعة اسم المجال  و المستوى-->
</p>

<hr>
<!-- عشان يمر على الروايط يلي تخزنت عشان يصير يعرضها رابط رابط -->
 <!-- $link اسم المتغير داخل الحلقة -->
  <!-- $links المصفوفة يلي رح ينطبع منها الروايط -->
<?php foreach($links as $link): ?>

<div class="link">
    <!-- هاد طباعةالرابط-->
     <!-- target="_blank" عشان يفتح الموقع في نافذة جديدة -->
    <a href="<?php echo $link[1]; ?>" target="_blank">
        <?php echo $link[0]; ?> <!-- هاد طباعة اسم الموقع يلي نجاب منه الرابط-->
    </a>
</div>

<?php endforeach; ?> <!-- نهاية الحلقة يلي بتطبع الروابط من المصفوفة-->
<!--  هاد زر عشان لو بده يرجع لصفحة الرود ماب مرة تانية الخاصة بالمجال يلي كان فيه من الاول -->
<a class="back" href="roadmap.php?field=<?php echo $field; ?>">⬅ Back</a>

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