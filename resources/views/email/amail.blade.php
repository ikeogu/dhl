<!doctype html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

    <title>CS App</title>
    <style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    .time-logo{
        margin: auto;
      width: 50%;

      padding: 10px;

    }
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
    <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <div class="time-logo">
                <img src="{{asset('assets/img/logo.jpg')}}" height="99" width="auto">
        </div>
    <table border="0" cellpadding="0" cellspacing="0" class="" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">

      <tr>

        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">New Signin </span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h3 style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi! {{$data['name']}},</h3>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your account has been created successfully as an admin on our portal.</p>
                        <p>Congratulations!</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                            <p> Welcome on board</p>

                        </table>


                                <p>Please don't hesitate to contact us, if you encounter any difficulty using our portal. below are your login details.</p>


                                <p>Email : <strong>{{$data['email']}}</strong></p>
                                 <p>Password : <strong>{{$data['password']}}</strong></p>

                                <em>please follow the link to login. <a  href="{{$data['url']}}"> {{$data['url']}}</a></em>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    {{-- <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Unit 53, Uniport Shopping Complex, Choba Campus, University of Port Harcourt, Choba, Rivers State, Nigeria</span> --}}
                    <br>
                    {{-- <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">iiarp@gmail.com , info@iiarpub.org</span><br> --}}

                    {{-- <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"> +234) 803-709-2075, (+234) 703-982-0156, (+234) 803-672-9346</span><br> --}}
                    {{-- <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"> <a href="https://timsmek.com.ng/terms_of_service">Terms of service</a></span>
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"> <a href="https://timsmek.com.ng/privacy">Privacy policy</a></span> --}}
                  </td>
                </tr>
                <tr>
                  {{-- <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <h4 class="sub center">Social Media Handles</h4>
                      <span class="apple-link" style="color: blue; font-size: 12px; text-align: center;">  <a href="https://facebook.com/timsmek">Facebook</a>|</span>
                      <span class="apple-link" style="color: blue; font-size: 12px; text-align: center;">  <a href="https://twitter.com/timsmek">Twitter</a>|</span>
                      <span class="apple-link" style="color: blue; font-size: 12px; text-align: center;">  <a href="https://instagram.com/timsmek">Instagram</span>
                  </td> --}}
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp; {{date('Y')}}</td>
      </tr>
    </table>
  </body>
</html>
