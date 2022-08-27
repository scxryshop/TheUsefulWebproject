<?php 
    function getEmail($link, $description, $category){
        return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
        
        <head>
            <meta charset='UTF-8'>
            <meta content='width=device-width, initial-scale=1' name='viewport'>
            <meta name='x-apple-disable-message-reformatting'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta content='telephone=no' name='format-detection'>
            <title></title>
            <!--[if (mso 16)]>
            <style type='text/css'>
            a {text-decoration: none;}
            </style>
            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        </head>
        
        <body>
            <div class='es-wrapper-color'>
                <!--[if gte mso 9]>
                    <v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
                        <v:fill type='tile' color='#f6f6f6'></v:fill>
                    </v:background>
                <![endif]-->
                <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0'>
                    <tbody>
                        <tr>
                            <td class='esd-email-paddings' valign='top'>
                                <table class='es-content esd-footer-popover' cellspacing='0' cellpadding='0' align='center'>
                                    <tbody>
                                        <tr>
                                            <td class='esd-stripe' align='center'>
                                                <table class='es-content-body' width='600' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'>
                                                    <tbody>
                                                        <tr>
                                                            <td class='es-p20t es-p20r es-p20l esd-structure' align='left'>
                                                                <table width='100%' cellspacing='0' cellpadding='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class='esd-container-frame' width='560' valign='top' align='center'>
                                                                                <table width='100%' cellspacing='0' cellpadding='0'>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align='center' class='esd-block-text'>
                                                                                                <p style='font-size: 22px;'><strong>Empfehlung:</strong></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align='left' class='esd-block-text'>
                                                                                                <p style='color: #080908;'>E-mail von WebsiteHakcs.org:&nbsp;<br><br>Kategorie: ".$category."<br>Link: ".$link."<br>Beschreibung: ".$description."<br><br>Datum: ".date("Y-m-d H:i:s")."<br><br></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>";
    }
?>