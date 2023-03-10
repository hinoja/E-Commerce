<!DOCTYPE html>
{{-- <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"> --}}

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet"> --}}

    <!-- CSS Reset : BEGIN -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],
        /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img+div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>
        .primary {
            background: #f85e9f;
        }

        .bg_white {
            background: #ffffff;
        }

        .bg_light {
            background: #fafafa;
        }

        .bg_black {
            background: #000000;
        }

        .bg_dark {
            background: rgba(0, 0, 0, .8);
        }

        .email-section {
            padding: 2.5em;
        }

        /*BUTTON*/
        .btn {
            padding: 5px 15px;
            display: inline-block;
        }

        .btn.btn-primary {
            border-radius: 5px;
            background: #f85e9f;
            color: #ffffff;
        }

        .btn.btn-white {
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }

        .btn.btn-white-outline {
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        .btn.btn-black-outline {
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Lato', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }

        body {
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0, 0, 0, .4);
        }

        a {
            color: #f85e9f;
        }

        table {}

        /*LOGO*/

        .logo h1 {
            margin: 0;
        }

        .logo h1 a {
            color: #000000;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
            border: 2px solid #000;
            padding: .2em 1em;
        }

        .navigation {
            padding: 0;
            padding: 1em 0;
            /*background: rgba(0,0,0,1);*/
            border-top: 1px solid rgba(0, 0, 0, .05);
            border-bottom: 1px solid rgba(0, 0, 0, .05);
        }

        .navigation li {
            list-style: none;
            display: inline-block;
            ;
            margin-left: 5px;
            margin-right: 5px;
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .navigation li a {
            color: rgba(0, 0, 0, 1);
        }

        /*HERO*/
        .hero {
            position: relative;
            z-index: 0;
        }

        .hero .text {
            color: rgba(0, 0, 0, .3);
        }

        .hero .text h2 {
            color: #000;
            font-size: 30px;
            margin-bottom: 0;
            font-weight: 300;
        }

        .hero .text h2 span {
            font-weight: 600;
            color: #f85e9f;
        }


        /*HEADING SECTION*/
        .heading-section {}

        .heading-section h2 {
            color: #000000;
            font-size: 28px;
            margin-top: 0;
            line-height: 1.4;
            font-weight: 400;
        }

        .heading-section .subheading {
            margin-bottom: 20px !important;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(0, 0, 0, .4);
            position: relative;
        }

        .heading-section .subheading::after {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -10px;
            content: '';
            width: 100%;
            height: 2px;
            background: #f85e9f;
            margin: 0 auto;
        }

        .heading-section-white {
            color: rgba(255, 255, 255, .8);
        }

        .heading-section-white h2 {
            font-family:
                line-height: 1;
            padding-bottom: 0;
        }

        .heading-section-white h2 {
            color: #ffffff;
        }

        .heading-section-white .subheading {
            margin-bottom: 0;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, .4);
        }


        ul.social {
            padding: 0;
        }

        ul.social li {
            display: inline-block;
            margin-right: 10px;
        }

        /*FOOTER*/

        .footer {
            border-top: 1px solid rgba(0, 0, 0, .05);
            color: rgba(0, 0, 0, .5);
        }

        .footer .heading {
            color: #000;
            font-size: 20px;
        }

        .footer ul {
            margin: 0;
            padding: 0;
        }

        .footer ul li {
            list-style: none;
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: rgba(0, 0, 0, 1);
        }


        @media screen and (max-width: 500px) {}
    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
    <center style="width: 100%; background-color: #f1f1f1;">

        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <!-- BEGIN BODY -->
            <h1 style="color: green;text-transform:uppercase"> List Appliers </h1><br>
            <h2><strong>{{ $job->title }}</strong></h2>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin: auto;">

                {{-- @foreach ($job->freelances as $freelance)
                    <tr>
                        <td class="bg_white">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="bg_light email-section" style="padding: 0; width: 100%;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td valign="middle" width="50%">
                                                    <table role="presentation" cellspacing="0" cellpadding="0"
                                                        border="0" width="100%">
                                                        <tr>
                                                            <td class="text-services"
                                                                style="text-align: left; padding: 20px 30px;">
                                                                <div class="heading-section">
                                                                    <h2 style="font-size: 22px;">
                                                                        {{ $freelance->user->name }}</h2>
                                                                    <p>{{ $freelance->email }}</p>
                                                                    <p><a href="mailto:{{ $freelance->email }}" class="btn btn-primary">{{ $freelance->email }}</a></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="middle" width="50%">
                                                    <table role="presentation" cellspacing="0" cellpadding="0"
                                                        border="0" width="100%">
                                                        <tr>
                                                            <td>
                                                                <img src="{{ public_path('Assets/images/laravel.png') }}"
                                                                    alt=""
                                                                    style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end: tr -->
                                <tr>
                                    <td class="bg_light email-section" style="padding: 0; width: 100%;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>

                                                <td valign="middle" width="50%">
                                                    <table role="presentation" cellspacing="0" cellpadding="0"
                                                        border="0" width="100%">
                                                        <tr>
                                                            <td class="text-services"
                                                                style="text-align: left; padding: 20px 30px;">
                                                                <div class="heading-section">
                                                                    <h2 style="font-size: 22px;">Description</h2>
                                                                    <p>
                                                                        @if ($freelance->description)
                                                                            {!! $freelance->description !!}
                                                                        @else
                                                                            NO-Description
                                                                        @endif
                                                                    </p>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end: tr -->

                            </table>
                        </td>
                    </tr><!-- end:tr -->
                @endforeach --}}
                @foreach ($cart as $item)
                    <tr>
                        <th scope="row" class="border-0" class="text-center">
                            <div class="p-2">
                                <img src="{{ asset('storage/product/img' . $item->id . '.jpg') }}" alt="test"
                                    width="70" class="img-fluid rounded shadow-sm">
                                {{-- <img src="{{ asset('storage/product/img' . $item->id . '.jpg') }}" alt="test" width="200"
                                    height="250">
                                    <br> --}}
                                <div class="ml-3 d-inline-block align-middle">
                                    <h5 class="mb-0"> <a href="#"
                                            class="text-dark d-inline-block align-middle">Nom
                                            Produit : </a></h5><span
                                        class="text-muted font-weight-normal font-italic d-block">{{ $item->name }}</span>
                                </div>
                            </div>
                        </th>
                        <td class="border-0 align-middle" class="text-center"><strong>
                                {{ $item->subtotal() }} Fcfa </strong></td>
                        <td class="border-0 align-middle" class="text-center">
                            <strong>
                                <select class="quantity" data-id="{{ $item->rowId }}"
                                    data-productQuantity="{{ $item->qty }}">
                                    @for ($i = 1; $i < 5 + 1; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>

                            </strong>
                        </td>

                        <td class="border-0 align-middle" class="text-center">
                            <form action="{{ route('cart.delete', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-outline-danger" type="submit" value="Delete">
                            </form>

                        </td>
                    </tr>
                    <br>
                @endforeach



                <!-- 1 Column Text + Button : END -->
            </table>


        </div>
    </center>
</body>

</html>
