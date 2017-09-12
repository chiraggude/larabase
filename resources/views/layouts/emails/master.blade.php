<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>LaraBase</title>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0;padding: 0;background-color: #FAFAFA;height: 100% !important;width: 100% !important;">
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;margin: 0;padding: 0;background-color: #FFFFFF;border-collapse: collapse !important;height: 100% !important;width: 100% !important;">
        <tr>
            <td align="center" valign="top" id="bodyCell" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;margin: 0;padding: 20px;border-top: 4px solid #DDDDDD;height: 100% !important;width: 100% !important;">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 600px;border: 1px solid #DDDDDD;border-collapse: collapse !important;">
                    <!-- BEGIN PRE-HEADER AND HEADER // -->
                    @include("layouts/emails/header")
                    <!-- END PRE-HEADER AND HEADER // -->
                    <tr>
                        <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #FAFAFA;border-top: 1px solid #FFFFFF;border-collapse: collapse !important;">
                                <tr>
                                    <td valign="top" class="bodyContent" mc:edit="body_content" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px;text-align: left;">
                                        <!-- BEGIN EMAIL CONTENT // -->
                                        @yield('content')
                                        <!-- // END EMAIL CONTENT -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <!-- BEGIN FOOTER // -->
                    @include("layouts/emails/footer")
                    <!-- // END FOOTER -->
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>