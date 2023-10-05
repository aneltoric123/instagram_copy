<?php 

include_once 'session.php';
include_once 'database.php';

function parseLastHashtag($caption) {
    $parsedCaption = preg_replace('/#(\w+)(?![\s\S]*#)/', '<a href="hashtag.php?hashtag=$1">#$1</a>', $caption);
    return $parsedCaption;
}