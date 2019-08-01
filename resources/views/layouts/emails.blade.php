<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Routage KB</title>
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }

        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        .image_fix {
            display: block;
        }

        p {
            margin: 1em 0;
        }

        h1, h2, h3, h4, h5, h6 {
            color: black !important;
        }

        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
            color: blue !important;
        }

        h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active {
            color: blue !important;
        }

        h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
            color: blue !important;
        }

        table td {
            border-collapse: collapse;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        a {
            color: blue;
        }

        @media only screen and (max-width: 640px), only screen and (max-device-width: 640px) {
            .full-width {
                width: 100% !important;
            }

            .hide {
                display: none !important;
            }

            .center {
                text-align: center !important;
            }

            .center img {
                display: inline !important;
            }

            .selection {
                width: 47% !important;
            }

            .separator {
                width: 4% !important;
            }

            .side {
                width: 1% !important;
            }

            .bigside {
                width: 20px !important;
            }

            .border {
                border-top: 1px solid white;
            }

            img {
                max-width: 100%;
            }

            .big-sub {
                font-size: 18px !important;
            }

            .margintop {
                height: 20px !important;
            }

            .margin-logo {
                height: 20px !important;
            }

            .logo {
                width: 20%;
            }

            .logo-wrap {
                height: 100px !important;
                vertical-align: middle;
            }

            .height-footer {
                height: 20px !important;
                line-height: 20px !important;
            }

            .side-logo {
                width: 15px !important;
            }

            .alignleft {
                text-align: left !important;
            }

            .wauto {
                width: auto !important;
            }
        }
    </style>
</head>
<body bgcolor="#e3e4e5">
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e3e4e5">
    <tr>
        <td bgcolor="#e3e4e5">
            <table cellpadding="0" cellspacing="0" border="0" width="600" align="center" class="full-width">
                <tr>
                    <td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <table cellpadding="0" cellspacing="0" border="0" align="left" class="full-width center"
                               width="299">
                            <tr>
                                <td width="20" class="hide"></td>
                                <td style="font-family: 'Avenir Next', Arial; font-size: 24px; color: #00405d;">
                                    <img src="{{ $message->embed(asset('img/emails/logo.gif')) }}" alt="Kaufman Broad"
                                         style="display: block; border: none;">
                                    @yield('title')
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <img src="{{ $message->embed(asset('img/emails/shadow.gif')) }}" alt=""
                             style="display: block; border: none;">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <table cellpadding="0" cellspacing="0" border="0" class="full-width" width="600">
                            <tr>
                                <td width="20" class="side"></td>
                                <td style="font-family: 'Avenir Next', Arial; font-size: 16px; color: #00405d;">
                                    @yield('content')
                                </td>
                                <td width="20" class="side"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="text-align: center;">
                        <div><!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                         xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ url('/') }}"
                                         style="height:43px;v-text-anchor:middle;width:220px;" arcsize="24%" stroke="f"
                                         fillcolor="#199edd">
                                <w:anchorlock/>
                                <center>
                            <![endif]-->
                            <a href="{{ url('/') }}"
                               style="background-color:#199edd;border-radius:10px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:43px;text-align:center;text-decoration:none;width:220px;-webkit-text-size-adjust:none;">Lien
                                vers la plateforme</a>
                            <!--[if mso]>
                            </center>
                            </v:roundrect>
                            <![endif]--></div>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
                <tr>
                    <td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>