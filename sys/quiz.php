<?php 
	require_once('inc/session.php');
	include_once('inc/head.php');
	include_once('inc/header1.php');
?>
<h1>Quiz</h1>
<div class="quiz-container">
  <div id="quiz"></div>
</div>
<div class="range">
    <button id="previous">question précédente</button>
    <button id="next">suivant</button>
    <button id="submit">résultats</button>
    <button id="passer"><a href="index.php">quitter le quiz</a></button>
</div>
<div id="results"></div>
<?php include_once('inc/footer.php');