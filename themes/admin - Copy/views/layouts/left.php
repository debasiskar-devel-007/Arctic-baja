<?php $themeUrl = Yii::app()->theme->baseUrl; ?>

<?php $base = Yii::app()->request->baseUrl; ?>
<!--top-contain-->
<div class="wrapper">
<div id="sidebar">
    <!-- <div class="Collapse">
        <a href="javascript:collapse_sidebar();" target="_self" title="Collapse Left Menu" id="Collapse" rel='tip'>
            <img src="icons/collapse-right.png" alt="" border="0"/>
        </a>
        </div>    -->                       
            <ul class="nav">
                <li><a class="headitem item1" href="#">Dashboard</a>
                    <ul>
                        <li><a href="index.php">Dashboard</a></li>
                    </ul>
                </li>

                <li><a class="headitem item4" href="#">User Manager</a>
                    <ul>
                        <li><a href="<?php echo $base ?>/user/admin/user/add">Add / Edit User</a></li>
                        <li><a href="<?php echo $base ?>/user/admin/user">User Listing</a></li>
                       <li><a href="<?php echo $base ?>/user/admin/role/add">Add / Edit User Role</a></li>
                        <li><a href="<?php echo $base ?>/user/admin/role">User Role Listing</a></li>
                    </ul>     
                </li>
                <li><a class="headitem item8" href="#">CMS Manager</a>
                    <ul>
                        <li><a href="<?php echo $base ?>/cms/admin/pagemanager/add"> Add / Edit page</a></li>
                        <li><a href="<?php echo $base ?>/cms/admin/pagemanager/listing">Page Listing</a></li>
                        <li><a href="<?php echo $base ?>/cms/admin/contentmanager/add">Add / Edit Content</a></li>
                        <li><a href="<?php echo $base ?>/cms/admin/contentmanager/listing">Content Listing</a></li>
                        
                    </ul>   
                </li>
          <li><a class="headitem item10" href="#">Admin Mail&nbsp;Manager</a>
       <ul>
          <li><a href="<?php echo $base;?>/user/admin/mail/index">admin Mail listing</a></li>
          <li><a href="<?php echo $base;?>/user/admin/mail/add">add admin Mail</a></li>

       </ul>
    </li>

            <!--    <li><a class="headitem item10" href="#">Blog Manager</a>
                    <ul>
                        <li><a href="<?php /*echo $base */?>/blog/admin/blog/add">Add / Edit Blog</a></li>
                        <li><a href="<?php /*echo $base */?>/blog/admin/blog/listing">Blog Listing</a></li>
                        
                    </ul>   
                </li>-->

                    <li><a class="headitem item2" href="#">Product Manager</a>
                     <ul>
                        <li><a href="<?php echo $base ?>/product/admin/category/add">Add / Edit Category</a></li>
                        <li><a href="<?php echo $base ?>/product/admin/category/listing">Category Listing</a></li>
                        <li><a href="<?php echo $base ?>/product/admin/stock/listing">Product Stock</a></li>
                        <li><a href="<?php echo $base ?>/product/admin/product/add">Add / Edit Product</a></li>
                        <li><a href="<?php echo $base ?>/product/admin/product/listing">Product Listing</a></li>
                        <li><a href="<?php echo $base ?>/product/admin/wishlist">Wishlist Report</a></li>
                    </ul>                         
                </li>
                
                         <li><a class="headitem item7" href="#">Order Manager</a>
                     <ul>
                        <li><a href="<?php echo $base ?>/product/admin/order">Order Listing</a></li>
                                            </ul>                         
                </li>
     
   </ul>

                
            </ul><!--end subnav-->
    
            
            <div class="clear"></div>
            <!--<div class="flexy_datepicker"></div> -->
                    </div>