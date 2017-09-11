<?php
    header( 'Access-Control-Allow-Origin: '.get_site_url() );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'Access-Control-Allow-Credentials: false' );

    $safeDecodedUrl = esc_url_raw( $_GET["page"] );

    $res =  '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' .
            '<html><head>' .
            '<script type="text/javascript"> function OnLoadEvent() { document.form.submit(); }</script>' .
            '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />' .
            '<title>3D-Secure Redirect</title></head>' . 
            '<body OnLoad="OnLoadEvent();">' .
            '<form name="form" action="'. $safeDecodedUrl . '" method="POST"  target="_top" >' .
            '<noscript>' .
            '<center><p>Please click button below to Authenticate your card</p><input type="submit" value="Go"/></p></center>' .
            '</noscript>' .
            '</form></body></html>';
            
    echo $res;
?>
