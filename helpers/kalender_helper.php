<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<style>
@charset "utf-8";
/* CSS Document */
html,body,form{ margin:0px; padding:0px; font-family:Ebrima, Arial, Helvetica, sans-serif; font-size:12px; color:#666; empty-cells:hide;}
table.calendar{border-style: solid; border-width: 1px; border-width:1px; border-color:#666; -moz-box-shadow:0px 0px 4px #CCCCCC; -webkit-box-shadow:0px 0px 4px #CCCCCC; box-shadow:0px 0px 4px #CCCCCC; }
tr.calendar-row  {  }
td.calendar-day  { min-height:80px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover  { background:#FFF; -moz-box-shadow:0px 0px 20px #eeeeee inset; -webkit-box-shadow:0px 0px 20px #eeeeee inset; box-shadow:0px 0px 20px #eeeeee inset; cursor:pointer;}
td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head {font-weight:bold; text-shadow:0px 1px 0px #FFF;color:#666; text-align:center; width:64px; padding:12px 6px; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC; background: #ffffff;
background: -moz-linear-gradient(top,  #ffffff 0%, #ededed 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#ededed));
background: -webkit-linear-gradient(top,  #ffffff 0%,#ededed 100%);
background: -o-linear-gradient(top,  #ffffff 0%,#ededed 100%);
background: -ms-linear-gradient(top,  #ffffff 0%,#ededed 100%);
background: linear-gradient(to bottom,  #ffffff 0%,#ededed 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
}
div.day-number{padding:6px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np {padding:5px; border-bottom:1px solid #DBDBDB; border-right:1px solid #DBDBDB; font-size:14px;background: #ffffff;
background: -moz-linear-gradient(top,  #ffffff 0%, #f2f2f2 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#f2f2f2));
background: -webkit-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
background: -o-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
background: -ms-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
background: linear-gradient(to bottom,  #ffffff 0%,#f2f2f2 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 );
}
.overday{ color:#000; text-shadow:0px 1px 0px #FFF;}
.currentday{background: #ff8800 !important;
background: -moz-linear-gradient(top,  #ff8800 0%, #ff5500 100%) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff8800), color-stop(100%,#ff5500)) !important;
background: -webkit-linear-gradient(top,  #ff8800 0%,#ff5500 100%) !important;
background: -o-linear-gradient(top,  #ff8800 0%,#ff5500 100%) !important;
background: -ms-linear-gradient(top,  #ff8800 0%,#ff5500 100%) !important;
background: linear-gradient(to bottom,  #ff8800 0%,#ff5500 100%) !important;
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8800', endColorstr='#ff5500',GradientType=0 ) !important; color:#FFF  !important; font-weight:bold; -moz-box-shadow:0px 0px 18px #1F68BA inset; -webkit-box-shadow:0px 0px 18px #1F68BA inset; box-shadow:0px 0px 18px #1F68BA inset;
}
.currentday:hover{-moz-box-shadow:0px 0px 24px #074080 inset !important; -webkit-box-shadow:0px 0px 24px #074080 inset !important; box-shadow:0px 0px 24px #074080 inset !important;}
</style>
<?php


function draw_calendar($month=null, $year=null){
    
    if ($month == null && $year==null) {
        $year = date('Y');
        $month =  date('m');
    }
    // Draw table for Calendar
    $calendar = '
	<table cellpadding="0" cellspacing="0" class="calendar">';



    // Draw Calendar table headings
    $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $calendar.= '
	<tr class="calendar-row">
	<td class="calendar-day-head">'.implode('</td>
	<td class="calendar-day-head">',$headings).'</td>
	</tr>
	';

    //days and weeks variable for now ...
    $running_day = date('w',mktime(0,0,0,$month,1,$year));
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();



    // row for week one
    $calendar.= '<tr class="calendar-row">';
    // Display "blank" days until the first of the current week
    for($x = 0; $x < $running_day; $x++):
        $calendar.= '<td class="calendar-day-np"> </td>';
        $days_in_this_week++;
    endfor;



    // Show days....
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):

        if($list_day==date('d') && $month==date('n')){
            $currentday='currentday';
        }else{
            $currentday='';
        }

        $calendar.= '<td class="calendar-day '.$currentday.'">';
        
            // Add in the day number
            if($list_day<date('d') && $month==date('n'))
            {
                $showtoday='<strong class="overday">'.$list_day.'</strong>';
            }else
            {
                $showtoday=$list_day;
            }


            $calendar.= '<div class="day-number" data-id="'.$month.'">'.$showtoday.'</div>';



    // Draw table end
    $calendar.= '</td>';
        if($running_day == 6):
            $calendar.= '</tr>';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '<tr class="calendar-row">';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;



    // Finish the rest of the days in the week
    if($days_in_this_week < 8):
        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= '<td class="calendar-day-np"> </td>';
        endfor;
    endif;



    // Draw table final row
    $calendar.= '</tr>';



    // Draw table end the table
    $calendar.= '</table>';
    
    // Finally all done, return result
    return $calendar;
}

?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $('.day-number').click(function(){
  		console.log($(this).text()+"-"+$(this).data('id'));
  });
  </script>