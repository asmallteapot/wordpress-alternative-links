<?php
/*
Plugin Name: Alternative Links
Plugin URI:  https://github.com/asmallteapot/wordpress-alternative-links
Description: Additional links and alternative ways of accessing content
Version:     1.0
Author:      Ellen Teapot
Author URI:  https://asmallteapot.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages

Alternative Links is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Alternative Links is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Alternative Links. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined('ABSPATH') or die('This script is not intended to be run directly.');

class AlternativeLink {
    public $mimeType;
    public $title;
    public $href;

    function __construct($mimeType, $title, $href) {
        $this->mimeType = $mimeType;
        $this->title = $title;
        $this->href = $href;
    }

    function to_html() {
        return <<<END
<link rel="alternate" type="$this->mimeType" title="$this->title" href="$this->href"></link>
END;
    }
}

function alternative_links_handle_wp_head() {
    $altLink = AlternativeLink("application/rss+xml", "Kitchen Table Cult » Feed", "https://kitchentablecult.com/feed/");
    echo($altLink->to_html());
}

add_action('wp_head', 'alternative_links_handle_wp_head');

?>
