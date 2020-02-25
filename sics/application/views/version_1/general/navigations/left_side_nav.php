    <style>

    .navbar{
        background-color: #24904f!important;
    }
    .sidebar .user-info {
    
        background: url("<?php echo $general_class->ben_resources('sms/images/').'/user-img-background2.jpg'?>") no-repeat no-repeat;
        background-size: 100% 100%;
    }
    .bars::before{
        width: 200px;
    }
    .list{
        padding-bottom: 50px;
    }
    #leftsidebar{
        width: 250px;
    }
    section.content{
        margin: 100px 15px 0 275px;
    }
    div#navbar-collapse{
        height: 58px;
    }
    </style>
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand"><?php echo $school_status['shortcut'] ?> CMS</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
<li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Profile</li>
                            <li class="body">
                                <ul class="menu">
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle">
                                            <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                        </div>
                                        <?php echo $general_class->session->userdata('first_name') ?> <?php echo $general_class->session->userdata('last_name') ?>
                                    </a>
                                    <li>
                                        
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Edit Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- #Top Bar -->



    <section>
        <!-- <pre> -->
        <?php //print_r($general_class->section_model->all("subject")); ?>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <!-- <div class="user-info">
                <div class="image">
                    <img src="<?php echo $general_class->ben_resources('sms/images/').'/user-img-background2.jpg'?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $general_class->session->userdata('first_name'); ?> <?php echo $general_class->session->userdata('last_name'); ?></div>
                    <div class="email"><?php echo $general_class->session->userdata('email_address'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">security</i>Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo $general_class->ben_link('general/login/logout')?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><?php echo $school_status['shortcut'] ?> - Learning Management System</li>

     
                    <li>
                        <a href="<?php echo $general_class->ben_link('general/dashboard/sms_index')?>">
                            <i class="material-icons" style="color: red!important;">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if(in_array('blackboard', $general_class->toggled)): echo 'active'; endif; ?>">
                        <a href="<?php echo $general_class->ben_link('lms/blackboard/index')?>">
                            <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/lesson.png')?>">
                            <span>Lesson (Beta)</span>
                        </a>
                    </li>
                    <li class="<?php if(in_array('blackboard', $general_class->toggled)): echo 'active'; endif; ?>">
                        <?php if($general_class->session->userdata('account_type_id')==3): ?>
                            <a href="<?php echo $general_class->ben_link('general/survey/index')?>">
                                <i class="material-icons" style="color: red!important;">list</i>
                                <span>Survey</span>
                            </a>

                        <?php else: ?>
                            <a href="<?php echo $general_class->ben_link('general/survey/assigned')?>">
                                <i class="material-icons" style="color: red!important;">list</i>
                                <span>Survey</span>
                            </a>
                        <?php endif; ?>
                    </li>

                    <li>
                        <a href="<?php echo $general_class->ben_link('general/dashboard/circulation')?>">
                            <i class="material-icons" style="color: pink!important;">book</i>
                            <span>Circulation</span>
                        </a>
                    </li>


                    <?php if(strtolower($general_class->session->userdata('account_type_name'))=="student"):?>
                            <li class="<?php if(in_array('assigned_lesson', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('lms/lesson/assigned_lesson')?>" class="">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/lesson.png')?>">
                                    <span>Lessons</span>
                                </a>
                            </li>

                            <li class="<?php if(in_array('student_assigned_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes')?>" class="">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                    <span>Quizzes</span>
                                </a>
                            </li>

                            <li class="<?php if(in_array('student_quiz_history', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('lms/quiz/student_quiz_history')?>" class="">
                                    <i class="material-icons">assignment</i>
                                    <span>Quiz History</span>
                                </a>
                            </li>
                        <?php elseif($general_class->session->userdata('account_type_id')==3): ?>
                            <li class="<?php if(in_array('lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/lesson.png')?>">
                                    <span>Lesson</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('lesson_packages', $general_class->toggled)): echo 'active'; endif; ?>">

                                        <a href="<?php echo $general_class->ben_link('lms/lesson/packages')?>" class="<?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">

                                            <span>Lesson Packages</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('lesson_bank', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/lesson/lesson_bank')?>" class=" <?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">
                                            <span>Shared Lessons</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('my_lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/lesson/index')?>" class="<?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">
                                            <span>My Lessons</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="<?php if(in_array('assessment', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                    <span>Assessment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/packages')?>" class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Quiz Packages</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/quiz_bank')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Shared Quizzes</span>
                                        </a>
                                        
                                    </li>
                                    <li class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/index')?>" class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>My Quizzes</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('assessment', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="margin-left:-215px">calendar_today</i>
                                    <span>Schedules</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/admin_lesson')?>" class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Lesson</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/admin_assessment')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Assessment</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('attendance', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="color: violet">person</i>
                                    <span>Attendance</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('sms/attendance/log')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Logs</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('sms/attendance/summary')?>" class="<?php if(in_array('attendance_summary', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Summary</span>
                                        </a>
                                        
                                    </li>

                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('sms/attendance/summary')?>" class="<?php if(in_array('attendance_summary', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>School Calendar</span>
                                        </a>
                                        
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('sms/attendance/summary')?>" class="<?php if(in_array('attendance_summary', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Schedule Settings</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('attendance', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="color: green">email</i>
                                    <span>Notifications</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/notification/text_blast')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Text Blast</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/announcement/index')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Announcement</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="<?php if(in_array('attendance', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);"  class="menu-toggle">
                                    <i class="material-icons" style="color: orange">book</i>
                                    <span>eLibrary</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/notification/text_blast')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Ebook</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/announcement/index')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Multimedia Contents</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/announcement/index')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Reports</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('general/account/index') ?>">
                                    <i class="material-icons">book</i>
                                    <span>Accounts</span>
                                </a>
                                
                            </li>
                            <li class="<?php if(in_array('lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('general/reports/usage') ?>">
                                    <i class="material-icons" style="color: royalblue!important;">pie_chart</i>
                                    <span>Usage Reports</span>
                                </a>

                            </li>
                        <?php else: ?>
                            <li class="<?php if(in_array('lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/lesson.png')?>">
                                    <span>Lesson</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('lesson_packages', $general_class->toggled)): echo 'active'; endif; ?>">

                                        <a href="<?php echo $general_class->ben_link('lms/lesson/packages')?>" class="<?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">

                                            <span>Lesson Packages</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('lesson_bank', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/lesson/lesson_bank')?>" class=" <?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">
                                            <span>Shared Lessons</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('my_lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/lesson/index')?>" class="<?php if(in_array('toggled', $general_class->toggled)): echo 'active'; endif; ?>">
                                            <span>My Lessons</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>


                            <li class="<?php if(in_array('assessment', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">

                                    <span>Assessment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/packages')?>" class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Quiz Packages</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/quiz_bank')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Shared Quizzes</span>
                                        </a>
                                        
                                    </li>
                                    <li class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/index')?>" class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>My Quizzes</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>

                            <li class="<?php if(in_array('schedule', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="color: blue!important;margin-left:-215px;">calendar_today</i>
                                    <span>Schedules</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/index')?>" class="<?php if(in_array('schedule_lesson', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Lesson</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/assessment')?>" class="<?php if(in_array('schedule_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Assessment</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>

                    <?php endif; ?>
                    
                    <li>
                        <a href="<?php echo $general_class->ben_link('general/login/logout')?>">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- #Menu -->
            
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
<script type="text/javascript">

    $(document).ready(function(){
        // $('.leftsidebar').slimScroll({
        //     height:'1000px',
        //     size: '20px',
        // });
        $('.list').slimScroll({
            height:'auto',
            size: '20px',
            railVisible: true,
            alwaysVisible: true,
        });
    });
    
</script>
<?php if($general_class->session->userdata('account_type_id')==3||$general_class->session->userdata('account_type_id')==4): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d9ed53bfbec0f2fe3b90207/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php endif; ?>