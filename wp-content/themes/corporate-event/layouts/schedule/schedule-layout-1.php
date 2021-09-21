
<?php
    $selected = get_option("timezone_setting") ? get_option("timezone_setting") : "Asia/Kathmandu";

    if( isset( $_POST['timezone_string'] ) )
        $selected = $_POST['timezone_string'];

    get_template_part( 'template-parts/timezone', 'form', array( 'selected' => $selected ) );
?>
<section class="schedule-layout">
    <?php

        if(!empty(get_option('session_date'))){
            $scheduleDate = get_option('session_date') ;   
        } else{
            $scheduleDate[] = '';
        }
        if(!empty(get_option('session_time_start'))){
            $scheduleStart = get_option('session_time_start');  
        } else{
            $scheduleStart[] = '';
        }
        if(!empty(get_option('session_time_end'))){
            $scheduleEnds = get_option('session_time_end') ;
        } else{
            $scheduleEnds[] = '';
        }
        if(!empty(get_option('selectSession'))){
            $scheduleSession = get_option('selectSession') ;
        } else{
            $scheduleSession[] = '';
        }
        if(!empty(get_option('selectRoom'))){
            $roomSession = get_option('selectRoom');
        } else{
            $roomSession[] = '';
        }

    $results = array_map(null,$scheduleDate,$scheduleStart,$scheduleEnds,$scheduleSession,$roomSession);
    $time_zone = $_SESSION['timezone_submit'] ? $_SESSION['timezone_submit'] :  $selected;  
    $timezone_setting = get_option("timezone_setting")?get_option("timezone_setting"):"Asia/Kathmandu"; 
    foreach($results as $result){
            $eventStartDate=date_create("$result[0] $result[1]",timezone_open($timezone_setting));
            date_timezone_set($eventStartDate,timezone_open("$time_zone"));
            $finalDates[] = date_format($eventStartDate,"Y-m-d");
            $finalStarts[] = date_format($eventStartDate,"H:i");
            $finalStartDate[] = date_format($eventStartDate,"Y-m-d H:i");
            
            $eventEndDate=date_create("$result[0] $result[2]",timezone_open($timezone_setting));
            date_timezone_set($eventEndDate,timezone_open("$time_zone"));
            $finalEnd[] = date_format($eventEndDate,"H:i");
            $finalEndDate[] = date_format($eventEndDate,"Y-m-d H:i");
        }
       
        for ($i = 0; $i < count($finalDates); $i++) {
            $dates[] = strtotime($finalDates[$i]);
        }
        for ($i = 0; $i < count($finalStartDate); $i++) {
            $time[] = strtotime($finalStarts[$i]);
        }
        for ($i = 0; $i < count($finalEndDate); $i++) {
            $end_time[] = strtotime($finalEnd[$i]);
        }
        $results = array_map(null,$dates,$time,$end_time,$scheduleSession,$roomSession,$finalEndDate);

        uasort( $results, function($a, $b) {
            $date1 = $a[0]; 
            $date2 = $b[0];

            $time1 = $a[1];
            $time2 = $b[1];

            $end_time_1 = $a[2]; 
            $end_time_2 = $b[2];

            $retval = $date1 <=> $date2;
            if ( $retval == 0 ) {
                $retval = $time1 <=> $time2;
                if ( $retval == 0 ) {                        
                    $retval = $end_time_1 <=> $end_time_2;                        
                }
            }
            return $retval;
        } );
   
    ?>
    <?php
    if (!empty($scheduleDate[0])) {
?>

    <div class="schedule-holder">
        <?php
        $i = 0;
            foreach ($results as $result){
//session
                $sessionSlug = $result[3];

                if( $sessionSlug ) {

                    $sessionposts = get_page_by_path($sessionSlug, '', 'session');
                    $sessionID = $sessionposts->ID;
                    $sessionTitle = $sessionposts->post_title;
                    $sessioContent = get_the_excerpt( $sessionID );
                }
//room
                $roomSlug = $result[4];
                $roomposts = get_page_by_path($roomSlug, '', 'room');

                if ($roomposts){
                    $roomTitle = $roomposts->post_title;
                    $roomID = $roomposts->ID;
                } else{
                    $roomTitle = '';
                    $roomID = '';    
                }
                ?>
        <div class="session-block">
            <div class="icon"><i class="icon-bookmark"></i></div>
            <div class="session-content-wrapper">
                <div class="time-room">
                    <?php
                        if( !empty($result[0]) ) {
                                $event_date_format = get_option('eventbanner_date_format');
                                $event_time_format = get_option('eventbanner_time_format');
                                $finalDateFormat = !empty($event_date_format) ? $event_date_format : 'F j, Y';
                                $finaTimeFormat  = !empty($event_time_format) ? $event_time_format : 'g:i a';

                                $event_startdate = date('Y-m-d', $result[0]);
                                $today = date("Y-m-d");
                                $event_start_time = strtotime( date( 'H:i:s', $result[1] ) );
                                $event_end_time = strtotime( date( 'H:i:s', strtotime( $result[2] ) ) );
                                $now = strtotime( date( ' H:i:s', current_time( 'timestamp', 0 ) ) );
                                ?>
                    <span class="date">
                        <i class="icon-calendar"></i>
                        <?php echo date($finalDateFormat, $result[0] ); ?>
                    </span>
                    <?php } ?>

                    <?php if( !empty($result[1]) ) { ?>
                    <span class="time">
                        <i class="icon-clock"></i>
                        <?php 
                                        echo esc_html(date(''.$finaTimeFormat.'', $result[1])); ?> - <?php echo date(''.$finaTimeFormat.'',$result[2]);
                                    ?>
                    </span>
                    <?php } ?>
                    <?php if (!empty($roomTitle)){?>
                    <span class="room">
                        <i class="icon-home"></i>
                        <a href="<?php the_permalink( $roomID ); ?>">
                        <?php echo esc_html($roomTitle); ?>
                        </a>
                    </span>
                    <?php } ?>
                </div>
                <h4 class="title-1"><a href="<?php the_permalink($sessionID); ?>"><?php echo esc_html($sessionTitle);?></a></h4>

                <div id="live_nw<?php echo $i; ?>" class="live-color"></div>
                <div id="totalCount" hidden><?php echo count($results); ?></div>

                <div id="event_startdate<?php echo $i; ?>" hidden><?php echo $event_startdate; ?></div>
                <div id="event_enddate<?php echo $i; ?>" hidden><?php echo $result[5]; ?></div>

                <div id="starting<?php echo $i; ?>" hidden><?php echo date('H:i', $event_start_time); ?></div>
                <div id="ending<?php echo $i; ?>" hidden><?php echo date('H:i', $event_end_time); ?></div>
                <div id="time_zone" hidden><?php echo $time_zone; ?></div>

                <p><?php echo ($sessioContent); ?></p>

                <div class="session-speakers">
                    <?php
                            $custom = get_post_custom($sessionID);
                           
                            $speakers_serializeD = $custom['speakers'][0];
                            if(is_serialized($speakers_serializeD)){
                                $speakers = unserialize($custom["speakers"][0]);
                            }else{
                                $speakers = $custom["speakers"];
                            }
            
                            if ( !empty($speakers[0]) ){
                             
                                foreach ($speakers as $speaker){
                                    $speakerPost = get_page_by_path($speaker, '', 'speaker');
                                    if ( $speakerPost ) {

                                        $speakerCustom = get_post_custom($speakerPost->ID);
                                        $speakerTitle = $speakerPost->post_title;
                                        $speakerPosition = $speakerCustom['position'][0];
                                        $speakerCompany = $speakerCustom['company'][0];
                                        $speakerImage = wp_get_attachment_image_src (get_post_thumbnail_id($speakerPost->ID), 'full' ); ?>

                    <div class="speakers">
                        <?php if( !empty($speakerImage ) ){ ?>
                        <div class="img-holder">
                            <a href="<?php echo esc_url( get_the_permalink( $speakerPost->ID ) ) ?>">
                                <img src="<?php echo esc_url($speakerImage[0]);?>"
                                    alt="<?php if(isset($speakerTitle)) echo esc_html($speakerTitle);?>">
                            </a>
                        </div>
                        <?php } ?>
                        <div class="text">
                            <span class="name">
                                <strong>
                                    <?php
                                                            if( $speakerTitle ) {
                                                                echo esc_html($speakerTitle);
                                                            }
                                                        ?>
                                </strong>
                            </span>
                            <span class="prof-comp">
                                <?php
                                                        if( $speakerPosition ) {
                                                            echo esc_html($speakerPosition);
                                                        }          
                                                        if( $speakerCompany ) {
                                                            if ( $speakerPosition ) {
                                                                echo esc_html(' / ');
                                                            }
                                                            echo esc_html( $speakerCompany );
                                                        }
                                                    ?>
                            </span>
                        </div>
                    </div>
                    <?php
                                    }
                                }
                            }
                            ?>
                </div>
            </div>


        </div>
        <?php
    $i++;
    }?>
    </div>

    <?php } else{
         esc_html_e('No Schedule Saved','corporate-event');
    } ?>

</section>
