<?php declare(strict_type=1);

//$now = date('d.m.y H:i:s');
//
//$html = <<<EOF
//<html>
//<head>
//  <meta http-equiv="refresh" content="1">
//</head>
//<body>
//  <time>${now}</time>
//</body>
//</html>
//EOF;
//
//echo $html;
header("Content-Type: text/html;charset=cp1251;");
$Hour = date("H");
$Minute = date("i");
$Second = date("s")
?>
<html>
<head>
</head>
<body>
<form name="d">
    <input type="text" size="8" name="d2">
</form>
<script>
    var second=<?php echo $Second ?>;
    var minute=<?php echo $Minute ?>;
    var hour=<?php echo $Hour ?>;
    document.d.d2.value='0'
    function display(){
        second++;
        if (second>=60){
            second=0
            minute++
        }
        if (minute>=60){
            minute=0
            hour++
        }
        if (hour>23){
            hour=0
            minute=0
            second=0
        }
        var cHour = hour;
        var cMinute = minute;
        var cSecond = second
        if (second < 10) cSecond = "0" + second;
        if (minute < 10) cMinute = "0" + minute;
        if (hour < 10) cHour = "0" + hour;
        document.d.d2.value=cHour+":"+cMinute+":"+cSecond
        setTimeout("display()",1000)
    }
    display()
</script>
</body>
</head>
</html>