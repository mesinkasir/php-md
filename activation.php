<?php
    require_once __DIR__ .'/vendor/Parsedown.php';
    require_once __DIR__ .'/vendor/ParsedownExtra.php';
    require_once __DIR__ .'/config.php';

    $Parsedown = new ParsedownExtra();

    function renderMarkdown($markdown) {
        global $Parsedown;
        return $Parsedown->text($markdown);
    }

    function getPostSlug($fileName) {
        return substr($fileName, 0, -3);
    }

    function getPostTitle($postContent) {
        $titlePattern = '/^# (.*)/';
        preg_match($titlePattern, $postContent, $matches);
        return $matches[1];
    }

    function addTitleHref($postContent, $slug) {
        $firstLinePattern = '/^# (.*)(\r\n|\r|\n)$/m';
        $replacement  = '# [${1}]('. $slug . ')${2}'; // # [title](slug)NEW_LINE
        return preg_replace($firstLinePattern, $replacement, $postContent);
    }

    function getFirstLines($string, $count, $skip = 0) {
        $lines = array_slice(explode(PHP_EOL, $string), $skip, $count);
        return implode(PHP_EOL, $lines);
    }

    function getExternalURL($slug) {
        return  'https://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . $slug;
    }

    function getPostsList() {
        $files = array_slice(scandir(BLOG_POSTS_PATH), 2);
        $posts_list = array();

        foreach ($files as $file) {
            $filePath = BLOG_POSTS_PATH . '/' . $file;
            $md = file_get_contents($filePath);
            $slug = getPostSlug($file);
    
            $posts_list[] = array(
                'title' => getPostTitle($md),
                'slug' => $slug,
                'markdown' => $md,
                'file' => $file,
                'create_date' => filectime($filePath)
            );
        }

        return $posts_list;
    }
?>
