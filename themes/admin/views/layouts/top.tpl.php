<?php $themeUrl = Yii::app()->theme->baseUrl; ?>

<?php $base = Yii::app()->request->baseUrl; ?>
<!--top-contain-->
<div class="wrapper">
<div id="head">
   <div class="logo_login"><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/admin/dashboard"><img src="<?php echo  $themeUrl;?>/images/logo.png" alt="" border="0" /></a></div>
   <div class="head_memberinfo">
        
        
        
       
                    
         <span class='memberinfo_span1'><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/default/logout">LOGOUT</a></span>
         <span class='memberinfo_span1'><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/admin">ADMIN</a></span>
                       </div>
                        
                      
                      
                        
   <!-- Navigation Section Start -->
   <div class="nav_section">
   <ul  id="menu">
     <li><a id="dashbor" href="#">Dashboard</a> </li>
    
    <li><a href="<?php echo $base ?>/user/admin/user">User&nbsp;Manager</a> 
    
     <ul>
                        <li><a href="<?php echo $base ?>/user/admin/user/add">Add / Edit User</a></li>
                        <li><a href="<?php echo $base ?>/user/admin/user">User Listing</a></li>
                       <li><a href="<?php echo $base ?>/user/admin/role/add">Add / Edit User Role</a></li>
                        <li><a href="<?php echo $base ?>/user/admin/role">User Role Listing</a></li>
                    </ul>     
    
    
    </li>
    <li><a href="<?php echo $base ?>/cms/admin/pagemanager/list">CMS&nbsp;Manager</a>
       <ul>
           <li><a href="<?php echo $base ?>/cms/admin/pagemanager/add"> Add / Edit page</a></li>
           <li><a href="<?php echo $base ?>/cms/admin/pagemanager/listing">Page Listing</a></li>
           <li><a href="<?php echo $base ?>/cms/admin/contentmanager/add">Add / Edit Content</a></li>
           <li><a href="<?php echo $base ?>/cms/admin/contentmanager/listing">Content Listing</a></li>
           <li><a href="<?php echo $base ?>/cms/admin/additionalcontentmanager/listing">additional Content</a></li>

       </ul>
    </li>
    
        <li><a href="<?php echo $base ?>/user/admin/mail/index">Admin Mail&nbsp;Manager</a>
       <ul>
          <li><a href="<?php echo $base;?>/user/admin/mail/add">add admin Mail</a></li>

       </ul>
    </li>

       <!-- <li><a href="admin-listing.html">Admin Manager</a> </li>-->
    <!-- <li>
       <a href="#">More</a>
       <ul id="more">    
    
    <li><a href="admin-listing.php">Admin&nbsp;Manager</a> </li>
</ul>-->
                    <!-- <li><a class="headitem item2" href="#">Product Manager</a>
                     <ul>
                        <li><a href="<?php /*echo $base */?>/product/admin/category/add">Add / Edit Category</a></li>
                        <li><a href="<?php /*echo $base */?>/product/admin/category/listing">Category Listing</a></li>
                        <li><a href="<?php /*echo $base */?>/product/admin/stock/listing">Product Stock</a></li>
                        <li><a href="<?php /*echo $base */?>/product/admin/product/add">Add / Edit Product</a></li>
                        <li><a href="<?php /*echo $base */?>/product/admin/product/listing">Product Listing</a></li>
                    </ul>                         
                </li>
                
                         <li><a class="headitem item7" href="#">Order Manager</a>
                     <ul>
                        <li><a href="<?php /*echo $base */?>/product/admin/order">Order Listing</a></li>
                                            </ul>                         
                </li>
     -->
   </ul>
   
   

</div>
   <!-- Navigation Section End -->
  </div> 