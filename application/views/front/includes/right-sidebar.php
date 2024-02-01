<div class="col-md-3 right-sidebar">
                    <h5 class="heading-5">User Online</h5>
                    <ul>
                      <?php 
                            if ($feed_user) {
                              foreach ($feed_user as $chat) { 
                                if($chat['is_login'] == '1'){?>
                               <li><a href="#"><?php echo $chat['firstname']; ?></a></li>
                           <?php 
                             }else{ 
                               echo "nobody on online now.";
                              }
                            }
                         }?>
                    </ul>              
                </div>