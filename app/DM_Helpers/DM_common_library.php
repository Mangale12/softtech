<?php
/**
 * showing the status 
 */
if(!function_exists('dm_flag')){
    function dm_flag($value) {
        if($value){?>
    <button class="btn btn-round btn-success btn-xs">
        <i class="fa fa-check"></i>
    </button>
       <?php }
    else{ ?>
        <button class="btn btn-round btn-danger btn-xs">
            <i class="fa fa-minus-circle"></i>
        </button>                                
       <?php
        }
    }   
}
/** Showing User Role */
if(!function_exists('dm_userRole')){
    function dm_userRole($value) {
        if($value == "super-admin") {
            echo $role = "<i style='color:white;padding:5px;background:#78CD51'>Super Admin</i>";
        }elseif($value == "admin" ) {
           echo $role = "<i style='color:white;padding:5px;background:#e4ba00'>Admin</i>";
        }elseif($value == "editor") {
           echo $role = "<i style='color:white;padding:5px;background:#53bee6'>Editor</i>";
        }elseif($value == "affiliated") {
            echo $role = "<i style='color:white;padding:5px;background:#53bee6'>Affiliated User</i>";
        }else {
           echo $role = "<i style='color:white;padding:5px;background:#ec6459'>No Role Assign</i>";
        }
    }
}

//times ago EN
function timesAgoEn($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "Recently";
    }
    //Minutes
    else if ($minutes <= 60) {
        return ($minutes == 1) ? "1 minute ago" : getStandardNumber($minutes) . " Minute ago";
    }
    //Hours
    else if ($hours <= 24) {
        return ($hours == 1) ? "1 hours ago" : getStandardNumber($hours) . " Hours ago";
    }
    //Days
    else if ($days <= 7) {
        return ($days == 1) ? "1 day ahead" : getStandardNumber($days) . " Day ahead";
    }
    //Weeks
    else if ($weeks <= 4.3) {
        return ($weeks == 1) ? "1 weeks ago" : getStandardNumber($weeks) . " Weeks ago";
    }
    //Months
    else if ($months <= 12) {
        return ($months == 1) ? "1 months ago" : getStandardNumber($months) . " Months ago";
    }
    //Years
    else {
        return ($years == 1) ? "1 years ago" : getStandardNumber($years) . " Years ago";
    }
}
