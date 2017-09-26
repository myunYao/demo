<?php 
    require './head1.php';
     $pagenum= 10;
    //需要得到当前是第几页：默认是第一页。如果地址栏里面传递了页数，则接收
    $page= $_GET['page'] ? $_GET['page']:1;
    //获取全部的一级内容:左连接查询
    $sql = 'SELECT *           
            FROM comment  
            ORDER BY comment_id ASC              
            LIMIT '.($page-1)*$pagenum.', ' . $pagenum;
            ;

    $commentlist = $db->dblink->query($sql);
?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     用户列表
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">用户管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           用户列表
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> 用户列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i>ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i>评论者的ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i>被评论信息的ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i>评论的内容</th>
                                        <th><i class="icon-bookmark"></i>评论时间</th>
                                     
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($commentlist as $key =>$value){        
                                    ?>
                                        <tr>
                                             <td><a href="#"><?=$value['comment_id'];?></a></td>
                                             <td class="hidden-phone"><?=$value['comment_person_id'];?></td>
                                             <td class="hidden-phone"><?=$value['news_id'];?></td>
                                             <td class="hidden-phone"><?=$value['comment_content'];?></td>
                                           
                                            <td><?=$value['comment_time'];?></td>
                                         
                                            <td>                                                
                                                <button type="button" comment_id="<?=$value['comment_id'];?>" class="btn btn-danger delcatecomment"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                 <ul id='ull'>
                                      <?php
                                          echo '<li><a href="./commentlist.php?page=1">首页</a></li>';
                                          //大于1的时候才会有上一页
                                          if($page > 1){
                                              echo '<li><a href="./commentlist.php?page='.($page-1).'">上一页</a></li>';
                                          }
                                          //下一页
                                              echo '<li><a href="./commentlist.php?page='.($page+1).'">下一页</a></li>';    
                                      ?>
                                  </ul>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    <?php 
        require './foot.php';
    ?>