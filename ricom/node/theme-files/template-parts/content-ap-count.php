<?php
              $allaps = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                )                 
                ));  

                $floor1 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('1'),    
                    )
                )                 
                ));  

                $floor2 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('2'),    
                    )
                )                 
                )); 

                $floor3 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('3'),    
                    )
                )                 
                )); 

                $floor4 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('4'),    
                    )
                )                 
                )); 

                $floor5 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('5'),    
                    )
                )                 
                )); 

                $floor6 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('6'),    
                    )
                )                 
                ));  
                $all = $allaps->found_posts; 
                $fl1 = $floor1->found_posts;                 
                $fl2 = $floor2->found_posts;
                $fl3 = $floor3->found_posts;
                $fl4 = $floor4->found_posts;
                $fl5 = $floor5->found_posts; 
                $fl6 = $floor5->found_posts; 
?>