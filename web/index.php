<?php
$your_hand = '';
$your_hand_number = '';
$your_result = '';
if (isset($_POST['your_hand']) === TRUE) {
  $your_hand = htmlspecialchars($_POST['your_hand'], ENT_QUOTES, 'UTF-8');
}
$my_hand_number = mt_rand(0, 2);

/*
グー (rock): 0
チョキ (scissors): 1
パー (paper): 2
*/

if ($your_hand === 'rock') {
    $your_hand_number = 0;
} else if ($your_hand === 'scissors') {
    $your_hand_number = 1;
} else /* if ($your_hand === 'paper') */ {
    $your_hand_number = 2;
}

if ($your_hand_number === $my_hand_number) {
    $your_result = 'Draw!';
} else if ((($your_hand_number + 1) % 3) === $my_hand_number) {
    $your_result = 'Win!!';
} else {
    $your_result = 'Lose...';
}

$Japanese_hand_name = ['グー', 'チョキ', 'パー'];

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>7-9｜課題（中級）</title>
  </head>
  <body>
    <h1>じゃんけん勝負</h1>
  <?php if (empty($your_hand) === FALSE) { ?>
    <p>自分(あなた): <?php print $Japanese_hand_name[$your_hand_number]; ?></p>
    <p>相手(コンピュータ): <?php print $Japanese_hand_name[$my_hand_number]; ?></p>
    <p>(あなたの)結果: <?php print $your_result; ?></p>
  <?php } ?>  
    <form method="post">
      <p>
        <input type="radio" name="your_hand" value="rock" <?php if ($your_hand === 'rock') { print 'checked'; } ?>><?php print $Japanese_hand_name[0]; ?>
        <input type="radio" name="your_hand" value="scissors" <?php if ($your_hand === 'scissors') { print 'checked'; } ?>><?php print $Japanese_hand_name[1]; ?>
        <input type="radio" name="your_hand" value="paper" <?php if ($your_hand === 'paper') { print 'checked'; } ?>><?php print $Japanese_hand_name[2]; ?>
      </p>
      <input type="submit" value="勝負!!">
    </form>
  </body>
</html>