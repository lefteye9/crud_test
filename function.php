<?php

function add($x){
$y = $x + 1;
echo $y;
}

//================================
// ログ
//================================
//ログを取るか
ini_set('log_errors','on');
//ログの出力ファイルを指定
ini_set('error_log','php.log');

//================================
// デバッグ
//================================
//デバッグフラグ
$debug_flg = true;
//デバッグログ関数
function debug($str){
  global $debug_flg;
  if(!empty($debug_flg)){
    error_log('デバッグ：'.$str);
  }
}

// //================================
// セッション準備・セッション有効期限を延ばす
//================================
//セッションファイルの置き場を変更する（/var/tmp/以下に置くと30日は削除されない）
session_save_path("/var/tmp/");
//ガーベージコレクションが削除するセッションの有効期限を設定（30日以上経っているものに対してだけ１００分の１の確率で削除）
ini_set('session.gc_maxlifetime', 60*60*24*30);
//ブラウザを閉じても削除されないようにクッキー自体の有効期限を延ばす
ini_set('session.cookie_lifetime ', 60*60*24*30);
//セッションを使う
session_start();
//現在のセッションIDを新しく生成したものと置き換える（なりすましのセキュリティ対策）
session_regenerate_id();

//================================
// 画面表示処理開始ログ吐き出し関数
//================================
function debugLogStart(){
    debug('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 画面表示処理開始');
    debug('セッションID：'.session_id());
    debug('セッション変数の中身：'.print_r($_SESSION,true));
    debug('現在日時タイムスタンプ：'.time());
    if(!empty($_SESSION['login_date']) && !empty($_SESSION['login_limit'])){
      debug( 'ログイン期限日時タイムスタンプ：'.( $_SESSION['login_date'] + $_SESSION['login_limit'] ) );
    }
  }


//================================
// グローバル変数
//================================
//エラーメッセージ格納用の配列
$err_msg = array();
  

function dbConnect(){
  //DBへの接続準備
  $dsn = 'mysql:dbname=crud_test;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $options = array(
    // SQL実行失敗時にはエラーコードのみ設定
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    // デフォルトフェッチモードを連想配列形式に設定
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
    // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  );
  // PDOオブジェクト生成（DBへ接続）
  $dbh = new PDO($dsn, $user, $password, $options);
  return $dbh;
}

function queryPost($dbh, $sql, $data){
    //クエリー作成
    $stmt = $dbh->prepare($sql);
    //プレースホルダに値をセットし、SQL文を実行
    if(!$stmt->execute($data)){
      debug('クエリに失敗しました。');
      debug('失敗したSQL：'.print_r($stmt,true));
      $err_msg['common'] = MSG07;
      return 0;
    }
    debug('クエリ成功。');
    return $stmt;
  }

//ここからcrud_test

function domCreate($dom){
  // $domCreate = "<h1>".$dom."</h1>"
   $res = "<h1>".$dom."</h1>";
};

function createData(){
  try{

    $input_a = $_POST['input_a'];

debug('POST情報input_a：'.print_r($_POST['input_a'],true));

$input_b = $_POST['input_b'];
    $dbh = dbConnect();
    $sql = 'INSERT INTO crud_item (input_a,input_b,create_date) VALUES (:input_a, :input_b, :create_date)';
    $data = array(':input_a' => $input_a,  'input_b' => $input_b, 'create_date' => Date("Y:m:d H:i:s"));

    $stmt = queryPost($dbh, $sql, $data);

    debug('$stmt:'.print_r($stmt, true));

    // if($stmt){
    //   return $stmt->fetchAll();
    // }else{
    //   return false;
    // }
  }catch(Exception $e){
    error_log('エラー発生：'.$e->getMessage());
  }
}


function readData(){
  try{

  $dbh = dbConnect();
  $sql = 'SELECT * FROM crud_item WHERE id = :id';
  $data = array(':id' => 3);

  $stmt = queryPost($dbh, $sql, $data);

  debug('$stmt:'.print_r($stmt, true));

    if($stmt){
     return $rst = $stmt->fetch(PDO::FETCH_ASSOC);
     debug('$rst:'.print_r($rst, true));
    }else{
     return false;
    }
   }catch(Exception $e){
     error_log('エラー発生：'.$e->getMessage());
   }
}

function getCategory(){
  try{
    $dbh = dbConnect();
    // $sql = 'SELECT category FROM crud_category WHERE id = :id';
    // $data = array(':id' => $id);
    $sql = 'SELECT * FROM crud_category';
    $data = array();
    $stmt = queryPost($dbh, $sql, $data);
    debug('$stmt(getCategory)の値は：'.print_r($stmt, true));

    if($stmt){
      debug('あああ');
       debug('PDO_ASSOCは'.print_r(PDO::FETCH_ASSOC, true));
      // return $stmt->fetch(PDO::FETCH_ASSOC);
      // return $stmt->fetch(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

      debug('いいい');
      debug('$rst:getCategoryの値は:'.print_r($rst, true));
      debug('$rst:getCategory[]の値は:'.print_r($rst['category'], true));

    }else{
      return false;
    }

  }catch(Exeption $e){
    error_log('エラー発生：'.$e->getMessage());
  }
};







  function updateIMG($path){
    debug('画像パスをデータベースに登録します。。');
    debug('ユーザーID：'.$path);
    //例外処理
    try {
      // DBへ接続
      $dbh = dbConnect();
      // SQL文作成
      $sql = 'INSERT INTO pic (picture1) VALUES (:path)';
      $data = array(':path' => $path);
      // クエリ実行
      $stmt = queryPost($dbh, $sql, $data);
  
      if($stmt){
        // クエリ結果の全データを返却
        return $stmt->fetchAll();
        // return $stmt->fetch(PDO::FETCH_ASSOC);
      }else{
        return false;
      }
  
    } catch (Exception $e) {
      error_log('エラー発生:' . $e->getMessage());
    }
  }

  function getPlaceData($key){
    debug('画像パスをデータベースから読み込みます。');
    debug('キー：'.$key);
    //例外処理
    try {
      // DBへ接続
      $dbh = dbConnect();
      // SQL文作成
      // $sql = 'SELECT pic1 FROM place WHERE id = :picid';
      $sql = 'SELECT * FROM place WHERE id = :key';
      $data = array(':key' => $key);
      // $data = array();
      // クエリ実行
      $stmt = queryPost($dbh, $sql, $data);

      // debug('$stmt:'.print_r($stmt));
  
      if($stmt){
        // クエリ結果の全データを返却
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

        debug('$result:'.print_r($result, true));

        // // return $result;
      }else{
        return false;
      }
  
    } catch (Exception $e) {
      error_log('エラー発生:' . $e->getMessage());
    }
  }

  // function getMainCompany(){
  //   $dbh = dbConnect();
  //   $sql = 'SELECT main_company FROM place';
  //   $data = 
  // }

  function getPlaceList($currentMinNum =1 , $company, $sub_company, $sort){
    $dbh = dbConnect();
    $sql = 'SELECT id FROM place';
    if(!empty($company and $sub_company)){
      $sql .= 'WHERE company .= $company and sub_companyu .= $sub_company';
      if(!empty($sort)){
        switch($sort){
          case 1: $sql .= 'ORDER BY update_date ASC';
        break;
          case 2: $sql .= 'ORDER BY update_date DESC';
        }
      }

    }


  }

  // 画像処理
function uploadImg($file, $key){
  debug('画像アップロード処理開始');
  debug('FILE情報：'.print_r($file,true));
  
  if (isset($file['error']) && is_int($file['error'])) {
    try {
      // バリデーション
      // $file['error'] の値を確認。配列内には「UPLOAD_ERR_OK」などの定数が入っている。
      //「UPLOAD_ERR_OK」などの定数はphpでファイルアップロード時に自動的に定義される。定数には値として0や1などの数値が入っている。
      switch ($file['error']) {
          case UPLOAD_ERR_OK: // OK
              break;
          case UPLOAD_ERR_NO_FILE:   // ファイル未選択の場合
              throw new RuntimeException('ファイルが選択されていません');
          case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズが超過した場合
          case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過した場合
              throw new RuntimeException('ファイルサイズが大きすぎます');
          default: // その他の場合
              throw new RuntimeException('その他のエラーが発生しました');
      }
      
      // $file['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
      // exif_imagetype関数は「IMAGETYPE_GIF」「IMAGETYPE_JPEG」などの定数を返す
      $type = @exif_imagetype($file['tmp_name']);
      if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) { // 第三引数にはtrueを設定すると厳密にチェックしてくれるので必ずつける
          throw new RuntimeException('画像形式が未対応です');
      }

      // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
      // ハッシュ化しておかないとアップロードされたファイル名そのままで保存してしまうと同じファイル名がアップロードされる可能性があり、
      // DBにパスを保存した場合、どっちの画像のパスなのか判断つかなくなってしまう
      // image_type_to_extension関数はファイルの拡張子を取得するもの
      // $path = 'uploads/'.sha1_file($file['tmp_name']).image_type_to_extension($type);
      $path = 'uploads/'.$file['name'].image_type_to_extension($type);

      if (!move_uploaded_file($file['tmp_name'], $path)) { //ファイルを移動する
          throw new RuntimeException('ファイル保存時にエラーが発生しました');
      }
      // 保存したファイルパスのパーミッション（権限）を変更する
      chmod($path, 0644);

      // $img_path = $path;
      
      debug('ファイルは正常にアップロードされました');
      debug('ファイルパス：'.$path);
      return $path;

    } catch (RuntimeException $e) {

      debug($e->getMessage());
      global $err_msg;
      $err_msg[$key] = $e->getMessage();

    }
  }
}

//画像表示用関数
function showImg($path){
  if(empty($path)){
    return 'img/no-img.png';
  }else{
    return $path;
  }
}


function tashizan($hikisuu){
  $kekka = $hikisuu + 5;
}

function tashizan2($hikisuu){
  $kekka = $hikisuu + 5;
  // $result = $kekka;
  return $kekka;
  $result = $kekka;

}

function tashizan3($hikisuu2){
  $kekka = $hikisuu2 + 10;
}

function tashizan4($hikisuu2){
  $kekka2 = $hikisuu2 + 10;
  return $kekka2;
}

//GETパラメータ付与
// $del_key : 付与から取り除きたいGETパラメータのキー

function appendGetParam($arr_del_key = array()){
  if(!empty($_GET)){
    $str = '?';
    foreach($_GET as $key => $val){
      if(!in_array($key,$arr_del_key,true)){ //取り除きたいパラメータじゃない場合にurlにくっつけるパラメータを生成
        $str .= $key.'='.$val.'&';
      }
    }
    $str = mb_substr($str, 0, -1, "UTF-8");
    return $str;
  }
}

?>