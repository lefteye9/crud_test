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

$_SESSION['test'] = 'セッションに入れてみた';

$_GET['test'] = 'ゲットパラメータ付与';

// $_GET['item'] = 2;


$input_a = $_POST['input_a'];

debug('POST情報input_a：'.print_r($_POST['input_a'],true));

$input_b = $_POST['input_b'];

add(1111111111111);

$rst = '';

$category_name = getCategory();

debug('$category_name:getCategoryの値は:'.print_r($category_name, true));
debug('$category_name:getCategory[]の値は:'.print_r($category_name['category'], true));


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
<div>
<nav>
    <ul class="menu">
        <li>TOP</li>      
        <li>MENU
            <ul class="sub">
                <li><a href="#">MENU-1</a></li>
                <li><a href="#">MENU-2</a></li>
            </ul>            
        </li>
        <li>CONTENT
            <ul class="sub">
                <li><a href="#">CONTENT-1</a></li>
                <li><a href="#">CONTENT-2</a></li>
                <li><a href="#">CONTENT-3</a></li>          
            </ul>         
        </li>
        <li>ACCESS
            <ul class="sub">
                <li><a href="#"></a>ACCESS-1</li>
                <li><a href="#"></a>ACCESS-2</li>
            </ul>
       
        </li>
    </ul>
</nav>
</div>

<br>
<br>
<br>

<div>
<form action="" method="post">
<select name="選んでね" id="">
     <?php
     foreach($category_name as $key => $value){
     ?>
    <option value=""><?php echo $value['category']; ?></option>
     <?php
     }
     ?>
    <option value="tako">タコ</option>
</select>


<input type="text" class="input_a" name="input_a" id="">
<input type="text" name="input_b" id="">

<input type="submit" name="create" value="作成">
<input type="submit" name="reform" value="更新">
<input type="submit" name="delete" value="削除">

</form>
</div>

<div>
    <form action="" method="get">
        ゲットフォーム
        <input type="text" class="get_input_a" name="get_input_a">
        <input type="text" class="get_input_b" name="get_input_b">
        <input type="submit" value="送信">
    </form>
</div>

<p class="p_text"><?php echo $_GET['get_input_a']; ?></p>
<p class="p_text"><?php echo $_GET['get_input_b']; ?></p>


<button class="modal">モーダル</button>

<div class="modal_window">
    <!-- モーダルウィンドウ -->

<i class="fas fa-angle-left slider__nav slide__prev js-slide-prev"></i>
<i class="fas fa-angle-right slider__nav slide__next js-slide-next"></i>

<div class="slider__container">
<div class="slider__item modal_slider_item1">ITEM1</div>
<div class="slider__item modal_slider_item2">ITEM2</div>
<div class="slider__item modal_slider_item3">ITEM3</div>
<div class="slider__item modal_slider_item4">ITEM4</div>
<div class="slider__item modal_slider_item5">ITEM5</div>
</div>

<!-- <input type="text" name="" id="">

<input type="text" name="" id="">

<input type="text" name="" id="">

<input type="submit" value="送信"> -->



<button class="modal_window_hide">閉じる</button>

</div>

<div class="modal_cover">モーダルカバー</div>

<form action="" method="post">
    <input type="text" name="js_ajax_check" class="js_ajax_check" value="" id="">
</form>

<a href="<?php ?>">
<div class="test_get_item">ゲットカテゴリー遷移テスト</div>
</a>

<a href="crud_test_get.php">セッションを理解する為に次のページに行く。</a>

<a href="crud_test.php <?php echo (!empty(appendGetParam())) ? appendGetParam().'&p_id=2' : '?p_id=3' ?>" class="panel">ゲットを理解するためのページ</a>

<br>

<a href="crud_test.php <?php echo appendGetParam().'&p_id=2' ?>" class="panel">ゲットを理解するためのページ3</a>

<br>
<!-- <?php foreach($GET as $key => $val){ ?>
<a href="crud_test.php? <?php echo $key. '='  .$val ?>">ゲットを理解するためのページ2</a>
<?php } ?> -->
<a href="crud_test.php? <?php echo $key. '='  .$val ?>">ゲットを理解するためのページ2</a>



<?php echo $input_a; ?>
<?php echo $input_b; ?>
<?php echo $rst; ?>

<?php echo $res; ?>
<?php echo add(111111); ?>
<?php echo domCreate(DOMMMMMMMMMMMM); ?>
<?php echo readData()['input_a']; ?>

<?php echo $_SESSION['test']; ?>

<?php echo $_GET['test']; ?>

<?php echo $_GET['item']; ?>

<?php echo $_GET['input_a']; ?>
<?php echo $_GET['input_b']; ?>





    
</body>

<footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.6.3/js/all.js" data-auto-replace-svg="nest"></script>
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

    // var $slider__prev = $('.slider__prev');
    // var $slider__next = $('.slider__next');
    
    //現在のスライド数（初期は１）
    var currentItemNum = 1;
    var $sliderContainer = $('.slider__container');
    var slideItemNum = $('.slider__item').length;
    var slideItemWidth = $('.slider__item').innerWidth();
    console.log(slideItemWidth);
    var slideContainerWidth = slideItemNum * slideItemWidth;
    console.log(slideContainerWidth);
    var DURATION = 500;
    $jsSlidePrev = $('.js-slide-prev');
    console.log($jsSlidePrev);

    $sliderContainer.attr('style', 'width:' + slideContainerWidth + 'px');

    $jsSlidePrev.on('click',function(){
        console.log('prevClick');
    })

    $('.js-slide-next').on('click', function(){
        console.log('slide');
        if(currentItemNum < slideItemNum){
            $sliderContainer.animate({left: '-=' + slideItemWidth + 'px'}, DURATION);
            currentItemNum++;
        }
    })

    $('.js-slide-prev').on('click',function(){
        console.log('slide');
        if(currentItemNum > 1){
            $sliderContainer.animate({left: '+=' + slideItemWidth + 'px'},DURATION);
            currentItemNum--;
            console.log(slideItemWidth);
        }
    });

    $("ul.menu li").hover(function(){
        console.log(this);
        //:not(:〜〜) 〜〜の状態でない場合
        //第二引数でセレクタを範囲指定。自分自身（クリックされた親要素）に絞り込む
        $("ul.sub:not(:animated)", this).slideDown();
        //第二引数にhoverが外れた時の処理
    }, function(){
        $("ul.sub", this).slideUp();
    });

    console.log('end');

    $('.js_ajax_check').on('keyup',function(e){
        console.log(this);
        var $this = $(this);
        console.log('ajax_click');

        //AJAX実行
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            dataType: 'json',
            data:{
                ajax_item: $(this).val()
            }
            })
        }).then(
            function(){
            console.log(data);
        },
        function(){
            alert('読み込み失敗');
        }
        );
    // })



</script>
</footer>
</html>