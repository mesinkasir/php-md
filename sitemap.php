<?php

require_once 'activation.php';

header("Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
<urlset>";

$posts = getPostsList();
foreach ($posts as $post) {
    $title = $post["title"];
    $link = getExternalURL($post['slug']);
    $description = strip_tags(renderMarkdown(getFirstLines($post['markdown'], 4, 1)));

    echo "<url>
   <loc>$link</loc>
   <lastmod>" . date(DATE_RSS, $post["create_date"]) . "</lastmod>
   </url>";
}
echo "</urlset>";

?>