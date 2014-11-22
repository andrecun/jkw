<?php
# PHP Calendar (version 2.3), written by Keith Devens
# http://keithdevens.com/software/php_calendar
#  see example at http://keithdevens.com/weblog
# License: http://keithdevens.com/software/license

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){
	$first_of_month = gmmktime(0,0,0,$month,1,$year);
	#remember that mktime will automatically correct if invalid dates are entered
	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
	# this provides a built in "rounding" feature to generate_calendar()

	$day_names = array(); #generate all the day names according to the current locale
	for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400){ #January 4, 1970 was a Sunday
		$day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name
		
	if ($day_names[$n] == "Sunday") $day_names[$n] = "M";
    else if ($day_names[$n] == "Monday") $day_names[$n] = "S";
    else if ($day_names[$n] == "Tuesday") $day_names[$n] = "S";
    else if ($day_names[$n] == "Wednesday") $day_names[$n] = "R";
    else if ($day_names[$n] == "Thursday") $day_names[$n] = "K";
    else if ($day_names[$n] == "Friday") $day_names[$n] = "J";
    else if ($day_names[$n] == "Saturday") $day_names[$n] = "S";
}

	list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
	
	switch($month_name) {
	case "January" : $month_name = "Januari";
    break;
	case "February" : $month_name = "Pebruari";
    break;
	case "March" : $month_name = "Maret";
    break;
	case "April" : $month_name= "April";
    break;
	case "May" : $month_name = "Mei";
    break;
	case "June" : $month_name = "Juni";
    break;
	case "July" : $month_name = "Juli";
    break;
	case "August" : $month_name = "Agustus";
    break;
	case "September" : $month_name = "September";
    break;
	case "October" : $month_name = "Oktober";
    break;
	case "November" : $month_name = "Nopember";
    break;
	case "December" : $month_name = "Desember";
    break;
	}
	$title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

	#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
	@list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
	if($p) $p = '<span class="calendar-prev pull-left">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
	if($n) $n = '&nbsp;<span class="calendar-next pull-right">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
	$calendar = '<table class="presidenRI-calendar">'."\n".
		'<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>";

	if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
		#if day_name_length is >3, the full name of the day will be printed
		foreach($day_names as $d){
			$calendar .= '<th abbr="'.$d.'">'.$d.'</th>';}
		$calendar .= "</tr>\n<tr>";
	}

	if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'" class="disable">&nbsp;</td>'; #initial 'empty' days
	for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		if($weekday == 7){
			$weekday   = 0; #start a new week
			$calendar .= "</tr>\n<tr>";
		}
		if(isset($days[$day]) and is_array($days[$day])){
			@list($link, $classes, $content) = $days[$day];
			if(is_null($content))  $content  = $day;
			$calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
				($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
		}
		else $calendar .= "<td>$day</td>";
	}
	if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'" class="disable">&nbsp;</td>'; #remaining "empty" days

	return $calendar."</tr>\n</table>\n";
}
?>