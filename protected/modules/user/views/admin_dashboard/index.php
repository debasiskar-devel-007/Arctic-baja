<div id="main">
    <div id="content">

        <h2>Dashboard</h2>

        <a class="dashboard_button button1" href="index.php">
            <span class="dashboard_button_heading">Dashboard</span>
        <span>Edit various basic settings and Options</span>            </a><!--end dashboard_button-->

       
        <a class="dashboard_button button10" href="<?php echo yii::app()->getBaseUrl(true) ?>/user/admin/user/listing">
            <span class="dashboard_button_heading two_lines">User Manager</span>
        <span>Add and edit user settings also User List</span>            </a><!--end dashboard_button-->

         </a><!--end dashboard_button-->

                <a class="dashboard_button button5" href="<?php echo yii::app()->getBaseUrl(true) ?>/cms/admin/pagemanager/listing">
            <span class="dashboard_button_heading two_lines">CMS Manager</span>
        <span>Add and edit user settings also User List</span> 
       
                   

           </a><!--end dashboard_button-->

    <!--    <a class="dashboard_button button6" href="<?php /*echo yii::app()->getBaseUrl(true)  */?>/blog/admin/blog/listing">
            <span class="dashboard_button_heading two_lines">Blog Manager</span>
        <span>Blog add/edit, approval and listing.</span>    -->        </a><!--end dashboard_button-->

           
    </div>
     </div>
