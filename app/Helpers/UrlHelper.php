<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;

class UrlHelper
{
    /**
     * @param String $url
     *
     * @return Array
     */
    public static function get_metadata($url)
    {
        $description = "";
        $title = "";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $html = curl_exec($ch);
        curl_close($ch);

        //parsing begins here:
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);

        //get and display what you need:
        $nodes = $doc->getElementsByTagName('title');
        $title = $nodes->item(0)->nodeValue;

        $metas = $doc->getElementsByTagName('meta');

        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            if ($meta->getAttribute('name') == 'description') {
                $description = $meta->getAttribute('content');
            }
        }

        return compact('title', 'description');
    }
}
