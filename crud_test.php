<?php

require('function.php');

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$input_a = $_POST['input_a'];

debug('POST情報input_a：'.print_r($_POST['input_a'],true));

$input_b = $_POST['input_b'];

// switch ( $_POST['$i'] ):
//     case create:
//         $input_a = "create";
//         var_dump($input_a);
//         break;
    
//     case reform:
//         $input_a = "reform";
//         break;
//     case delete:
//         $input_a = "delete";
//         break;

//     endswitch;

// if($_POST['$i']){
    
// };



if($_POST['create']){
    debug('POST情報：'.print_r($_POST,true));
    return createData();   
}

if($_POST['reform']){
    debug('POST情報：'.print_r($_POST,true));
    return readData();    
}

// if($_POST['delete']){
//     $input_a ="delete";
// }
?>

<form action="" method="post">
<input type="text" name="input_a" id="">
<input type="text" name="input_b" id="">

<input type="submit" name="create" value="作成">
<input type="submit" name="reform" value="更新">
<input type="submit" name="delete" value="削除">
</form>

<?php echo $input_a; ?>
<?php echo $input_b; ?>

    
</body>
</html>