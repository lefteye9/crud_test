<?php

require('function.php');

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php

$input_a = $_POST['input_a'];

debug('POST情報input_a：'.print_r($_POST['input_a'],true));

$input_b = $_POST['input_b'];

add(1111111111111);

$rst = '';

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
    createData();   
}

if($_POST['reform']){
    debug('POST情報：'.print_r($_POST,true));
    readData();
}

// if($_POST['delete']){
//     $input_a ="delete";
// }
?>

<form action="" method="post">
<input type="text" class="input_a" name="input_a" id="">
<input type="text" name="input_b" id="">

<input type="submit" name="create" value="作成">
<input type="submit" name="reform" value="更新">
<input type="submit" name="delete" value="削除">
</form>

<p class="p_text">あああ</p>

<button class="modal">モーダル</button>

<div class="modal_window">モーダルウィンドウ

<input type="text" name="" id="">

<input type="text" name="" id="">

<input type="text" name="" id="">

<input type="submit" value="送信">



<button class="modal_window_hide">閉じる</button>

</div>

<div class="modal_cover">モーダルカバー</div>

<a href="crud_test_get.php">ここは２ページ目だよ。</a>


<?php echo $input_a; ?>
<?php echo $input_b; ?>
<?php echo $rst; ?>

<?php echo $res; ?>
<?php echo add(111111); ?>
<?php echo domCreate(DOMMMMMMMMMMMM); ?>
<?php echo readData()['input_a']; ?>

<?php echo $_SESSION['test']; ?>

<?php echo $_GET['test']; ?>


    
</body>

<footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $(function()
    {
        console.log('run');
        alert('alert');
        var a = 1;
        var b = 3;
        var c = a + b;
        console.log(c);
        var $input_a = $('.input_a');
        

    const $p_text = $('.p_text');
    const $text = $p_text.text();
    console.log($p_text);
    $p_text.on('click',function(){alert('clicked')});
    
    })

    var $modal = $('.modal');
    var $modal_window = $('.modal_window');
    var $modal_window_hide = $('.modal_window_hide');
    var $modal_cover = $('.modal_cover');
    var modalWidth = $modal_window.width();
    var WindowWidth = $(window).width();
    console.log($modal_window);
    console.log($modal_window.style);

    $modal.on('click',function(){
        // $modal_window.style.display = "block";
        // $modal_window.css = ({"display":"block"});
        $modal_window.attr('style','margin-left:'+ (WindowWidth/2 - modalWidth/2) + 'px' );
        $modal_window.fadeIn();
        $modal_cover.fadeIn();
        console.log(WindowWidth);
        console.log(modalWidth);
        // $modal_window.attr('style','margin-left:'+ (WindowWidth/2 - modalWidth/2) + 'px' );

    })

    $modal_window_hide.on('click',function(){
        // $modal_window.style.display = "block";
        // $modal_window.css = ({"display":"block"});
        $modal_window.fadeOut();
        $modal_cover.fadeOut();
    }) 
</script>
</footer>
</html>