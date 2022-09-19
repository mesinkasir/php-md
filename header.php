<?php
require_once 'activation.php';
$postSlug = $_GET['page'];
$page = 'posts/' . $postSlug;
if (file_exists($page)) {
    $markdown = file_get_contents($page);
    $pageTitle = getPostTitle($markdown);
} else {
    $markdown = "# 404 <br/> Wrong Way '$postSlug' not found ";
    $pageTitle = 'Wrong Way !!';
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="google-site-verification" content="<?php echo $google ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $pageTitle ?> <?php echo $sitename ?></title>
<meta content='<?php echo $pageTitle ?> <?php echo $sitename ?>' property='og:title'/>
<meta content='https://axcora.com' property='og:author'/>
<meta content='<?php echo $pageTitle ?> <?php echo $sitename ?>' name='facebook:title'/>
<meta content='<?php echo $pageTitle ?> <?php echo $sitename ?>' name='twitter:title'/>
<link rel="icon" type="image/x-icon" href="<?php echo $logo ?>" />
<meta content='<?php echo $logo ?>' name='facebook:image'/>
<meta content='<?php echo $logo ?>' name='twitter:image'/>
<meta content='website' property='og:type'/>
<meta content='index, follow' name='robots'/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="ui.css">
</head>
<body class="bg-light text-scondary lead">