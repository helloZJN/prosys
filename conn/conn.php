<?php
// Create connection to Oracle
//echo phpinfo();
$conn = oci_connect("c##scott", "tiger", "//localhost/orcl") or die("数据库链接错误".oci_error());
// header("content-type:text/html;charset=utf-8");
// $query='select * from admin';

// $stid = oci_parse($conn, $query);
// if (!$stid) {
//   $e = oci_error($conn);
//   print htmlentities($e['message']);
//   exit;
// }
// oci_execute($stid);
// oci_fetch_all($stid, $res);
// var_dump($res);
// echo "<table border='1'>\n";
// while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
//     echo "<tr>\n";
//     foreach ($row as $item) {
//         echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
//     }
//     echo "</tr>\n";
// }
// echo "</table>\n";
$stid = oci_parse($conn, 'SELECT * FROM admin');
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    foreach ($row as $item) {
        echo $item;
    }
}

oci_close($conn);
?>
