<?php

if (!function_exists('highlightKeywords')) {
    function highlightKeywords($content, $query)
    {
        $highlightedQuery = '<span style="background-color: yellow;">' . $query . '</span>';
        $highlightedContent = str_ireplace($query, $highlightedQuery, $content);
        return $highlightedContent;
    }
}
