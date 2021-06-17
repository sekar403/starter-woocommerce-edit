<?php /* Template Name: front page */ ?>
<?php get_header(); ?>

<!-- Begin Section - 1 -->
<div class="category-section">
   <div class="sl">
      <?php dynamic_sidebar('sidebar-10'); ?>
   </div>
</div>
</div>
<div class="category-section">
<div class="container">
   <div class="d-flex justify-content-between flex-wrap">
      <?php dynamic_sidebar('sidebar-6'); ?>
   </div>
</div>
</div>




<div class="container">
   <!-- Begin post area -->
   <div>
      <div class="">
         <div class="">
            <?php dynamic_sidebar('sidebar-9'); ?>
         </div>
      </div>
   </div>
   <!-- Begin Homepage Full Width Section - 2 -->
   <div>
      <div class="">
         <div class="">
            <div class=""> 
               <?php dynamic_sidebar('sidebar-11'); ?>
            </div>
         </div>
      </div>
   </div>
   <!-- Begin Section - 2 -->	   
   <div>
      <div class="">
         <div class="">
            <div >
               <div class="">
                  <?php dynamic_sidebar('sidebar-12'); ?>
               </div>
            </div>
         </div>
         <div class="">
            <div>
               <?php dynamic_sidebar('sidebar-16'); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>