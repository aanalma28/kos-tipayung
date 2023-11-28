{{-- html yang akan dikirimkan ke email  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>

<body>

    <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                <h2 style="margin-top: 20px; color: #333;">Halo, {{ $ArrayData['name'] }}</h2>
                                <h2 style="margin-top: 20px; color: #333;">Pengajuan telah diterima</h2>
                                <p style="color: #555;">Tunggu untuk info selanjutnya</p>
                                <a href="http://127.0.0.1:8000/" style="display: inline-block; padding: 10px 20px; margin-top: 10px; border-radius: 5px; text-decoration: none; color: #fff; background-color: #1db954;">Situs Kami</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>



    
</body>

</html>