<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif; font-size: 14px; width: 100%">
<center>
    <table style="min-width: 320px; max-width: 600px; padding: 10px;" align="center" cellpadding="0" cellspacing="0">
        <tbody>
        <td>
                
                <div
                    style="padding-top: 20px; padding-bottom: 40px; text-align: center; font-size: 20px; font-weight: bold; line-height: 30px;">
                    New BookMark
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0;">Hello, {{ $user->first_name }}. An attendee has bookmarked your {{$bookmarkable}}:</p>
            </td>
        </tr>
        <tr>
            <td>
                <div style="padding-top: 20px; line-height: 23px;">
                <p style="margin: 0;">
                 We appreciate your involvement and look forward to more engagements.
                </p>
                </div>
            </td>
        </tr>
       
        <td align="center" style="padding: 0;">
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <div
                                style="padding-top: 80px; font-size: 6px; line-height: 8px;">
                                <p style="margin: 0">{{ __('Powered By:') }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://eventium365-filestorage-dev.s3.us-east-2.amazonaws.com/eventium_365_logo_black.png" alt="Eventium logo"
                                 style="max-width: 100px; max-height: 23px; height: auto; width: auto;" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tbody>
    </table>
</center>
</body>
</html>
