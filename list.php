<?php
require_once 'activation.php';
$posts = getPostsList();
foreach ($posts as $post) {
$titleAndSummary = getFirstLines($post['markdown'], 3);
$titleAndSummary = addTitleHref($titleAndSummary, $post['slug']);
?>
<?php echo renderMarkdown($titleAndSummary); ?>
<!-- <a href="<?php echo $post['slug'] ?>"><?php echo $post['title'] ?> →</a> -->
<?php }?>
