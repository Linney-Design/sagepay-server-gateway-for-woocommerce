<?php
    //prevents XSS injecting malicious html or js into redirect
    $safeDecodedUrl = preg_replace('/([\"\>\<])/', '', urldecode($_GET["page"]));
    // prevents form action hijacking
    if (strpos($_GET["page"], urlencode($_SERVER['HTTP_HOST'])) !== false) {

            $res = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' .
                '<html><head>' .
                '<script type="text/javascript"> function OnLoadEvent() { document.form.submit(); }</script>' .
                '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />' .
                '<title>3D-Secure Redirect</title></head>' .
                '<body OnLoad="OnLoadEvent();">' .
                '<form name="form" action="' . $safeDecodedUrl . '" method="POST"  target="_top" >' .
                '<noscript>' .
                '<center><p>Please click button below to Authenticate your card</p><input type="submit" value="Go"/></p></center>' .
                '</noscript>' .
                '</form></body></html>';

            echo $res;
    }
?>
