<?php

$query_date = '2010-08-08';

// First day of the month.
echo date('Y-m-01', strtotime($query_date))."<br>";
echo date('Y-m-d',strtotime("+1 week", strtotime(date('Y-m-01', strtotime($query_date)))));
// Last day of the month.
echo date('Y-m-t', strtotime($query_date));

?>              