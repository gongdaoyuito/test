<?php
$name = "";
$message = "";

if(isset($_POST['send']) === true){
   $name = $_POST["name"];
   $message = $_POST["message"]
   $fp = fopen("board.txt", "a");
   fwrite($fp,$name . ":" . $message . "\n");
   fclose($fp);
}
$fp = fopen("board.txt", "r");
 $board_array = [];
while ($line = fgets($fp)) {
    $temp = explode(":", $line);
    $temp_array = [ 
       "name" => $temp[0],
        "message" => $temp[1],
    ];
    $board_array[] = $temp_array;}
?>
<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="UTF-8">
   <title>MessageBoard</title>
 </head>
 <body>
   <h2>ローカル掲示板</h2>
     <form action="board.php" method="post">
      <div>
       <label>投稿者<input type="text" name="name"></label><br>
      </div>
       <div>
       <label>コメント<input type="text" name="message"></label><br>
      </div>
       <button type="submit" name='send'>投稿</button>
     </form>
    <h2>コメント欄</h2>
   <ul>
      <?php foreach ($board_array as $data): ?>
        <?= "<li>" ?>
        <?= $data["name"] . ":" . $data["message"]; ?> 
       <?= "</li>" ?>
     <?php endforeach; ?>
   </ul>
 </body>
 </html>