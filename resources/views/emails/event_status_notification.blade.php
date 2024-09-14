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
                    Event Status Updated
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0;">Hello, </p>
            </td>
        </tr>
        <tr>
            <td>
                <div style="padding-top: 20px; line-height: 23px;">
                <p style="margin: 0;">
                We would like to inform you that the status of the event titled {{ $event->title }} has been updated.

                @if ($event->status == 3)
                The event is now running and will soon be underway. We appreciate your attention and look forward to your participation.

                @elseif ($event->status == 4)
                The event has concluded and is now marked as expired. Thank you for being a part of it.

                @endif

                Thank you for your continued engagement. If you have any questions or need further information, please feel free to reach out.
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
        </tr>
        </tbody>
    </table>
</center>
</body>
</html>
