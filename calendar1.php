 <?php
  include './mvc/view/header.php';
 ?>
 <?php 
 if(isset($_POST['datlich'])):
    echo $_POST['demo'] ;
 endif;

 // $busyDates = ['4_2020-07-3', '2_2020-07-3'];
 // foreach ($busyDates as $key => $busyDate) {
 //     $busyDate = explode('_', $busyDate);
 // }
    
// Set your timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
    // $date = '2020-06-1';
    if ($today == $date) {
        $week .= '<td class="today">'."<span class='font-weight-bolder'>". $day ."</span>";
    } else {
        $week .= '<td>' ."<span class='font-weight-bolder'>". $day ."</span>";
    }
    if($str % 7 == 0 || strtotime($date) < strtotime($today)):
        $caLamViec = "<br>
        <p class='text-danger font-weight-bolder'>CLOSED</p>  
    ";
    else:
        // ex:ngày bận là ngày 3-06-2020 vào lúc ca 4
        $ngay_ban = date('j', strtotime('2020-06-23'));
        $thang_ban = date('m', strtotime('2020-06-23'));
        $current_month = date('m', strtotime($date));
        $mui_gio_ban = 3;
        if($day == $ngay_ban && $thang_ban == $current_month ):
            $caLamViec = "<br>
            <label>
                <input type='radio' name='demo' value='1_$date' ";
                if($mui_gio_ban == 1): $caLamViec.='disabled';else:$caLamViec.='';endif;$caLamViec.=">07:00 - 09:00
            </label>
            <span class='text-danger'>";
              if($mui_gio_ban == 1):$caLamViec.= 'Busy'; else: $caLamViec.= '';endif;
             $caLamViec.="
            </span>
            <label>
                <input type='radio' name='demo' value='2_$date' ";
                if($mui_gio_ban == 2): $caLamViec.='disabled';else:$caLamViec.='';endif;$caLamViec.=">09:00 - 11:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == 2):$caLamViec.= 'Busy'; else: $caLamViec.= '';endif;
            $caLamViec.="</span>
            <label>
                <input type='radio' name='demo' value='3_$date' ";
                if($mui_gio_ban == 3): $caLamViec.='disabled';else:$caLamViec.='';endif;$caLamViec.=">15:00 - 17:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == 3):$caLamViec.= 'Busy'; else: $caLamViec.= '';endif;
            $caLamViec.="</span>
            <label>
                <input type='radio' name='demo' value='4_$date' ";
                if($mui_gio_ban == 4): $caLamViec.='disabled';else:$caLamViec.='';endif;$caLamViec.=">17:00 - 19:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == 4):$caLamViec.= 'Busy'; else: $caLamViec.= '';endif;
             $caLamViec.="
            </span>";
        else:
            $caLamViec = "<br>
            <label>
                <input type='radio' name='demo' value='1_$date'>07:00 - 09:00
            </label>
            <span class='text-danger'>"; 
            $caLamViec.="
            </span>
            <label>
                <input type='radio' name='demo' value='2_$date'>09:00 - 11:00
            </label>
            <span class='text-danger'>";  
            $caLamViec.="</span>
            <label>
                <input type='radio' name='demo' value='3_$date'>15:00 - 17:00
            </label>
            <span class='text-danger'>";   
            $caLamViec.="</span>
            <label>
                <input type='radio' name='demo' value='4_$date'>17:00 - 19:00
            </label>
            <span class='text-danger'>";
             $caLamViec.="
            </span>";
                
        endif;    
            
    endif;    
    
    $week .= $caLamViec.'</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> -->
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        #calendar td:hover{
            background-color: #e5e5e5;
        }
        h3 {
            margin-bottom: 20px;
        }
        th {
            height: 30px;
            text-align: center;
        }
        td {
            height: 70px;
        }
        .today {
            background: #f2f2f2;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            /*color: black;*/
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }


    </style>
</head>
<body>
    <div class="container mt-1">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <table class="table table-bordered" id = "calendar">
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thur</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <form action="calendar1.php" method="POST">
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" name="datlich" class="btn btn-primary">Đặt lịch</button>
                </div>
            </div>
            </form>
    </div>
</body>
</html>
<!-- <form action ='calendar1.php' method ='post'>
        <div class='btn-group-toggle' data-toggle='buttons'>
          <label class='btn btn-secondary active'>
            <input type='radio' name='options' id='option1'> 07:00 - 09:00
          </label>
          <label class='btn btn-secondary'>
            <input type='radio' name='options' id='option2'> 09:00 - 11:00
          </label>
          <label class='btn btn-secondary'>
            <input type='radio' name='options' id='option3'> 15:00 - 17:00
          </label>
          <label class='btn btn-secondary'>
            <input type='radio' name='options' id='option3'> 17:00 - 19:00
          </label>
        </div>
        <input type ='submit' name ='submit' value='test123'>
</form> -->
<!-- <form action ='calendar1.php' method ='post'>
        <button type='radio' name=''class='btn btn-outline-primary'>07:00 - 09:00</button>
        <button type='radio' name=''class='btn btn-outline-primary'>09:00 - 11:00</button>
        <button type='radio' name=''class='btn btn-outline-primary'>15:00 - 17:00</button>
        <button type='radio' name=''class='btn btn-outline-primary'>17:00 - 19:00</button>
        <input type ='submit' name ='submit' value='demo'>
</form>

<form action ='calendar1.php' method ='post' data-toggle="buttons">
        <label class="btn btn-outline-secondary">
            <input type='radio' name=''>07:00 - 09:00
        </label>
        <label class="btn btn-outline-secondary">
            <input type='radio' name=''>09:00 - 11:00
        </label>
        <label class="btn btn-outline-secondary">
            <input type='radio' name=''>15:00 - 17:00
        </label>
        <label class="btn btn-outline-secondary">
            <input type='radio' name=''>17:00 - 19:00
        </label>
        <input type ='submit' name ='submit' value='demo'>
</form> -->
<?php 
if(!array_filter($array_busy)):
            $caLamViec = "<br>
            <label>
                <input type='radio' name='ngayhen' value='1_$date'>07:00 - 09:00
            </label>
            <span class='text-danger'>"; 
            $caLamViec.="
            </span>
            <label>
                <input type='radio' name='ngayhen' value='2_$date'>09:00 - 11:00
            </label>
            <span class='text-danger'>";  
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='3_$date'>15:00 - 17:00
            </label>
            <span class='text-danger'>";   
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='4_$date'>17:00 - 19:00
            </label>
            <span class='text-danger'>";
             $caLamViec.="
            </span>";
        endif;
        //code dơ 
        // $array_busy = [['3','2020-06-20'],['4', '2020-06-20']] ; 
        foreach ($array_busy as list($val_0,$val_1)):
            // $val['0'] 
            // $val['1']
        // $ngay_ban = date('j', strtotime('2020-06-24'));
        // $thang_ban = date('m', strtotime('2020-06-24'));
        $ngay_ban = date('j', strtotime($val_1));
        $thang_ban = date('m', strtotime($val_1));  
        $current_month = date('m', strtotime($date));
        $mui_gio_ban = $val_0;
        if($day == $ngay_ban && $thang_ban == $current_month ):
            $caLamViec = "<br>
            <label>
                <input type='radio' name='ngayhen' value='1_$date' ";
                if($mui_gio_ban == '1'): $caLamViec.='disabled';else:$caLamViec.=' ';endif;$caLamViec.=">07:00 - 09:00
            </label>
            <span class='text-danger'>";
              if($mui_gio_ban == '1'):$caLamViec.= 'Busy'; else: $caLamViec.= ' ';endif;
             $caLamViec.="
            </span>
            <label>
                <input type='radio' name='ngayhen' value='2_$date' ";
                if($mui_gio_ban == '2'): $caLamViec.='disabled';else:$caLamViec.=' ';endif;$caLamViec.=">09:00 - 11:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == '2'):$caLamViec.= 'Busy'; else: $caLamViec.= ' ';endif;
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='3_$date' ";
                if($mui_gio_ban == '3'): $caLamViec.='disabled';else:$caLamViec.=' ';endif;$caLamViec.=">15:00 - 17:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == '3'):$caLamViec.= 'Busy'; else: $caLamViec.= ' ';endif;
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='4_$date' ";
                if($mui_gio_ban == '4'): $caLamViec.='disabled';else:$caLamViec.=' ';endif;$caLamViec.=">17:00 - 19:00
            </label>
            <span class='text-danger'>";
             if($mui_gio_ban == '4'):$caLamViec.= 'Busy'; else: $caLamViec.= ' ';endif;
             $caLamViec.="
            </span>";
            break;   
        else:
            $caLamViec = "<br>
            <label>
                <input type='radio' name='ngayhen' value='1_$date'>07:00 - 09:00
            </label>
            <span class='text-danger'>"; 
            $caLamViec.="
            </span>
            <label>
                <input type='radio' name='ngayhen' value='2_$date'>09:00 - 11:00
            </label>
            <span class='text-danger'>";  
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='3_$date'>15:00 - 17:00
            </label>
            <span class='text-danger'>";   
            $caLamViec.="</span>
            <label>
                <input type='radio' name='ngayhen' value='4_$date'>17:00 - 19:00
            </label>
            <span class='text-danger'>";
             $caLamViec.="
            </span>";
        endif;
        endforeach;           
?>      