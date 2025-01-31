<!-- <?php
	$doDrawHeaderLine = false;
	include("./layout/header.php");
	include("./layout/banner.php");
?>
<script src="/scripts/news.js"></script>
<h1 class="title h1 container">Новости</h1>
<div class="content container">
</div>
<div class="pagination container">
	</a>
</div>
<?php
	include("./layout/footer.php");
?> -->

<?php

include __DIR__ . "/autoload.php";

use DBConnect\DB as DB;
use Models\NewsModel as NewsModel;