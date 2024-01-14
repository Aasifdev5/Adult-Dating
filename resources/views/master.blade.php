<!DOCTYPE html>
<html lang="en-in">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta charset="utf-8">
    <meta name="content-language" content="en-in">
    <meta name="language" content="en-in">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>


    <link rel="preload" as="font" type="font/woff2" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2" crossorigin="">

    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js">
    <link rel="preload" href="{{asset('css/app.css')}}" as="style">

    <link rel="shortcut icon" type="image/x-icon" href="/static/img/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/chunck-private-area.be138ac0ae29dcf8a826.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendors~chunk-vue-tel-input.63e59fe1c7d5cab535b3.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" defer=""></script>




    <style type="text/css">
        button.btn[data-v-f3fb3dc8] {
            display: inline-block;
            font-weight: 300;
            line-height: 1.25;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            cursor: pointer;
            letter-spacing: 1px;
            transition: all 0.15s ease
        }

        button.btn.btn-sm[data-v-f3fb3dc8] {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 0.2rem
        }

        button.btn.btn-primary[data-v-f3fb3dc8] {
            color: #fff;
            background-color: #45c8f1;
            border-color: #45c8f1
        }

        button.btn.btn-outline-primary[data-v-f3fb3dc8] {
            color: #45c8f1;
            background-color: transparent;
            border-color: #45c8f1
        }

        button.btn.btn-danger[data-v-f3fb3dc8] {
            color: #fff;
            background-color: #ff4949;
            border-color: #ff4949
        }

        .text-muted[data-v-f3fb3dc8] {
            color: #8492a6
        }

        .text-center[data-v-f3fb3dc8] {
            text-align: center
        }

        .drop-down-enter[data-v-f3fb3dc8],
        .drop-down-leave-to[data-v-f3fb3dc8] {
            transform: translateX(0) translateY(-20px);
            transition-timing-function: cubic-bezier(0.74, 0.04, 0.26, 1.05);
            opacity: 0
        }

        .drop-down-enter-active[data-v-f3fb3dc8],
        .drop-down-leave-active[data-v-f3fb3dc8] {
            transition: all 0.15s
        }

        .move-left-enter[data-v-f3fb3dc8],
        .move-left-leave-to[data-v-f3fb3dc8] {
            transform: translateY(0) translateX(-80px);
            transition-timing-function: cubic-bezier(0.74, 0.04, 0.26, 1.05);
            opacity: 0
        }

        .move-left-enter-active[data-v-f3fb3dc8],
        .move-left-leave-active[data-v-f3fb3dc8] {
            transition: all 0.15s
        }

        .no-tr[data-v-f3fb3dc8] {
            transition: none !important
        }

        .no-tr *[data-v-f3fb3dc8] {
            transition: none !important
        }

        .overlay[data-v-f3fb3dc8] {
            position: fixed;
            background: rgba(220, 220, 220, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: all 0.2s ease;
            opacity: 0;
            visibility: hidden
        }

        .overlay .modal[data-v-f3fb3dc8] {
            transition: all 0.2s ease;
            opacity: 0;
            transform: scale(0.6);
            overflow: hidden
        }

        .overlay.show[data-v-f3fb3dc8] {
            opacity: 1;
            visibility: visible
        }

        .overlay.show .modal[data-v-f3fb3dc8] {
            opacity: 1;
            transform: scale(1)
        }

        .panel[data-v-f3fb3dc8] {
            padding: 6px 10px;
            display: flex;
            width: 100%;
            box-sizing: border-box;
            align-items: center;
            border-radius: 6px;
            position: relative;
            border: 1px solid #eaf7ff;
            background: #f7fcff;
            outline: none;
            transition: all 0.07s ease-in-out
        }

        .btn[data-v-f3fb3dc8] {
            cursor: pointer;
            box-sizing: border-box
        }

        .light-btn[data-v-f3fb3dc8] {
            padding: 10px 12px;
            display: flex;
            width: 100%;
            box-sizing: border-box;
            align-items: center;
            border-radius: 6px;
            position: relative;
            border: 1px solid #eaf7ff;
            background: #f7fcff;
            outline: none;
            cursor: pointer;
            transition: all 0.07s ease-in-out
        }

        .light-btn[data-v-f3fb3dc8]:hover {
            background: #e0f4ff;
            border-color: #8acfff
        }

        .primary-btn[data-v-f3fb3dc8] {
            background: #239bf5;
            color: white;
            border-radius: 6px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s ease;
            font-size: 14px;
            font-family: "Didact Gothic Regular", sans-serif
        }

        .primary-btn[data-v-f3fb3dc8]:hover {
            background: #40a8f6;
            color: white;
            text-decoration: none
        }

        .shake[data-v-f3fb3dc8] {
            animation: shake-f3fb3dc8 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            transform: translate3d(0, 0, 0)
        }

        @keyframes shake-f3fb3dc8 {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0)
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0)
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0)
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0)
            }
        }

        .pulse[data-v-f3fb3dc8] {
            animation: pulse-f3fb3dc8 2s ease infinite
        }

        @keyframes pulse-f3fb3dc8 {
            0% {
                opacity: 0.7
            }

            50% {
                opacity: 0.4
            }

            100% {
                opacity: 0.7
            }
        }

        .flash-once[data-v-f3fb3dc8] {
            animation: flash-once 3.5s ease 1
        }

        @keyframes fade-up-f3fb3dc8 {
            0% {
                transform: translate3d(0, 10px, 0);
                opacity: 0
            }

            100% {
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }

        .fade-in[data-v-f3fb3dc8] {
            animation: fade-in-f3fb3dc8 0.3s ease-in-out
        }

        @keyframes fade-in-f3fb3dc8 {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }

        .spin[data-v-f3fb3dc8] {
            animation-name: spin-f3fb3dc8;
            animation-duration: 2000ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear
        }

        @keyframes spin-f3fb3dc8 {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        .bounceIn[data-v-f3fb3dc8] {
            animation-name: bounceIn-f3fb3dc8;
            transform-origin: center bottom;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-iteration-count: 1
        }

        @keyframes bounceIn-f3fb3dc8 {

            0%,
            20%,
            40%,
            60%,
            80%,
            100% {
                -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1)
            }

            0% {
                opacity: 1;
                -webkit-transform: scale3d(0.8, 0.8, 0.8);
                transform: scale3d(0.8, 0.8, 0.8)
            }

            20% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1)
            }

            40% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9);
                transform: scale3d(0.9, 0.9, 0.9)
            }

            60% {
                opacity: 1;
                -webkit-transform: scale3d(1.03, 1.03, 1.03);
                transform: scale3d(1.03, 1.03, 1.03)
            }

            80% {
                -webkit-transform: scale3d(0.97, 0.97, 0.97);
                transform: scale3d(0.97, 0.97, 0.97)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1)
            }
        }

        @keyframes dots-f3fb3dc8 {

            0%,
            20% {
                color: rgba(0, 0, 0, 0);
                text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            40% {
                color: #8492a6;
                text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            60% {
                text-shadow: 0.25em 0 0 #8492a6, 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            80%,
            100% {
                text-shadow: 0.25em 0 0 #8492a6, 0.5em 0 0 #8492a6
            }
        }

        @keyframes recording-f3fb3dc8 {
            0% {
                box-shadow: 0px 0px 5px 0px rgba(173, 0, 0, 0.3)
            }

            65% {
                box-shadow: 0px 0px 5px 5px rgba(173, 0, 0, 0.3)
            }

            90% {
                box-shadow: 0px 0px 5px 5px rgba(173, 0, 0, 0)
            }
        }

        @font-face {
            font-family: 'Didact Gothic Regular';
            src: url(data:font/woff2;base64,d09GMgABAAAAAGZAABEAAAABOqQAAGXdgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGiQbgc0yHAwGYABECIFCCZdiEQgKgtxMgrpyATYCJAOKUAuFKgAEIAWGVAeVAwyBMVv1JXEDvX0rUXA7sOP5Oz/2bETsdjAn89cLUjGOTQXoDodQ0yhm9v//n51UZMw0QLJNPhzAL4qgh5htlgyTbJQUbwkmCho1Iln6qdMdqRQUwbHBvczDKaaL1nmbV/yGP1KbyfQILd4cHJ34wts+YyF+QjFFRZEtNBQkTExdcpdXnPp+9N1wHGSDWEVicmjRMnEP9+7PN3am4Z1VRESkmGzqZLEkrq5HTXkPmckmQjZzNrFtMYkcUSixhumKxseOH4xfxy/OzGys/TU+k3q9zjX+91cGdL2phrLE2LUhJGOKxdH6PPTZPd+t6pl5/liDkciMDElFm+35bRDN2exJVEnAE6S4JcGqSIJ/aMu3VMzhhVfqBl7S4BX4VGjTvOXzJg5PdJ++nXM3ufkD5RKrDdAoFfygluucfdfePyDjYgcogdDnX3NtDpIrjYXem5AzekKiX1+q+UJ3/wGYlIEhFCiHFEhu0tJBKycUagirWKNxCjBwvuzR8P+vrqTTh8DNU37ClruwQxpKeJeloDQLRb1F7a66ctiGtoI1h2T9zHmx6ot2Dp1WHLbXJhg0IxSIBkmEy3nKD0VF0ZQbQBTg7ssMiYLSSU2J4abc/G/m6vbmOtX+KtXui9sTs6i/BAkECQzswiqwWdAzuc+KGKHHwF3UkLuGeQx6BfoSvwBogH+pgIPzQp5wAQP83Hrr64gW5QCVyg0YY8G29xbvvcV7C5ZJ1aAn0jqwiTQQA5vz9IvMaI7LsJiRF+21Z/4HABy1lVU1cFI1RF2Bnh02YSXJJJlzgeQ3fKMqTfeJvvR5BfBvhm6Iei4tkF8m/rojE16dkSO3HeBHUR9UiVFnDPOiDsdixY7ED7FiW1RCI96QxPYWsWZvGhpM//eazURdfltFPimy+QFgK+A2Ff6rMQ3g27uJFRGW0VE7/p/dG18hUVdHRhaIgcDm0FcH/C+V5UHIh6aNnlpddFlc5hJhts3JK6olTU02Av7P1LSdjyUuKENOkfajH+XM56IJsfVz0fipqXb/LEDMzs7hdnFpMYROIC4tVxQFgKBuCQWQSlTKmcsFjgSUCCri6JRTFWOdiurcdupcumhcN/7/bdpXKsnu9hBQENruHliEINwg9Lv3vVcu7qqS5CNLstuWGdqNr16V5JLknjX0nw/kT2z30AeyewD55LtBAoBJvkEiDXsjomiDbCfJNk0/T183sHv2wTy5pYuaWYw0jIh2jdeC4kVVdG/8YLli9DD/6a6ARvTbyPx7GvZS2iKLiPg3IiKDERkGf++m7ESzk/O/78DtTtcR0h1EMMEYIYQQQrjjZ6zV78OOKXOybRvHmSxRUBEQUNBM59r9xxkBBLexv4qvHgST3eKPzPn/Pyi2r9r61+q9SBJFlrAzTiYEawMBxoB5UKtDPAxnR9i21QTwwIaCxCKH77N+JXgYoEpkDjtg7T6R5zIo0KWCKQKQiMVn6zVpy6Zcmptzbz6WQ+lJb/6Qv5WQEl0SS1mpKnPK4vJI6Sh9xVc+K980EU1qU9Nsbo4315vXmj+a/9qQNr9tbFvbntbb/tJp+ie7gG5pt7lz91Q9fa9h8lHvcO9i762+X39l/2R/pH9+8JPqwU3Fmrzjw24OwJ9tMG2wdNARWfXNYKjtyTvxpcP/nGLwxzBs+OxwxtAcaFZtXuEQzsrhZsidw+ZAXdAqWuMv/uzw8LBneHP4TuCIEWpGAaPToy/GnHWusnHQuGm8d9wzvjv2jP+b+E2yJ6snW+vlJ80Tt1Wf/yI/mnwx+QnRhsXFJyAkJiElI6egpqMXIIRBuCkyZMmRK59Jiammma5MuSrVatSq9xC7BrPNsVNSQDCC4sTrSzMsxwuiJCuqphumZTuu5wdRnGZ5UVZ103b9ME7zsm77cV7385yLC5xbbrvjrkn33Of2gMcLXvIyL5+3fOwTn/rcF770rd/96S9/+2f5eykmEiKbzuZnF3f3L28ffzGPNxjSbid3Jx/9nBehh9Cy7JUjUg+jEo184hNq+aq2g9r9fBylRhOelHfIp7wf8fxEkd8eS8VPDdMI+KH0jiPYbseNgw4+WOC6rQIERdxMN76TgIKdFqhltzbrdzxutJ/HM69xfCJyw0IUSTAZvQOH4IbgOGYK62qF9KsbAmaGnzBjKCrt6CnOy+CWW8L4W2kWLAfPYMWG1etW7Jx4+DVTMAoUCELWHCcJfTcdYUgU8vGTEy/Y+kAgLohocX4QQxgbxLDBDgg0uShsBJPQYvQJZaWNN2L2pJrxteE659+27UT6Yg5cPoHzeEtF0VSYLHbtYTxxIunu/mY4VZZq2Vrl8Mq1XB6eBA4MQoixa0YATEGClMMjOIAcDOGNzkelVywhTp3GyUqqSJJOUgE4gCGAMXA8p1wdYmBAIIAIEGCgpSGiNEEO/AMWXAYTbNiEQ+dp3Ksoh1S9YjlAuabKY0FvSwXSAAFADwb1KgnwC8RJUcA8hBBAEyQvlxmlgSLg1EInKlDh1QwUXpB+BVUwAAMElDmjOACVMCkQM9gTaKAB41lh3jaET2zKxFmFCZkgZ0cu9mqv1jfmMH5nbmBixLNRtD4+MBFxZW6PTA64C57DTmlDn/XCO/6ttVTtGWvrdyBxNOxcpqfQN+Co5ew3EDay/2ag8XipiUaubrfrTaJV92Ge8pqVorbUgbEz1rtYaCcCHDUhBBMwlEAHB3zognN/A4Q5IVktI0/l2hJ9bx6cXk7FBjDfkXKj3cbHJkZcA7czkzl3SjEoIW7AnR92sVV75aow4pwYNf7xXhNhLq8XCp+nu/JO1sddKjMxcQODSPuYH+CDSqNp08J7M+nSLbkF0k/6BsZrKbQJVt+tZ6Qv49goAhtMwIBc7Y9Y4WqQWijp/dWb3uC3Lvf27X6qdWba0bo7V05w9xSPTvPlOq/OYhYHnZvi6TTPZtpKbs39T20kFDx1ThZuyVA1IPE39NakmLMBLJ4Sq2XcWg8+zPwMeBh/sDHJEmMpDGt5sbYrdRXsoOTsHHBAwHWsvLbQJ7ifcCjYUZ8SY5uhFS3+EW7wxkRordveXMuxvF/nU9BPZbuGDDvuENrYFWxMmoqn5WLeuXCL+ymRBV1Qea9ZXQrYG9RyUNtG7bVLoIK/MrFDCDQ6LIHLt1RpkZvD0AnzCYWOeLHh1l7J+AT1auaN8fR/sDCd94ARXsGbyk8CZH581nZgCEILhTEzGWZ+dZNmk5UhYqPsduL9WIhLHBLGz8SpLzGZJoCopKicFMkEAh74kEAEiQIWCi42BSmOEsyPYYkEJCZkKjBzSTUWGiMMfjUpdR/xjCtFA3zVxFdJCZtM+AUelj6B8YvEJ1ZWmA0zFZG5wBqLrRRMMJoFNvR5LyjvrTuRD+xaCSnIQeeu1Pt7V16pH67ju66GjZ2vNvAng680tNyw9Y/82Oi/jHn32u9dB7sBuNl4/O2e+wPX+916pTsG7sI9uO+6f+cBwj1/98Jib22nYNJrKxx4dQEeoxylztRA1uubPpob32iilStxOzJZyT3kyUaWAHMoSeV4ZCJ3W5ok4WaZE3BQuCkEXb6cPHH1bS90OzBx1sj2x7UqnSPi10kMjsGLcmnkFm/6spAFG1QoCvsJnpzAOVIEff5eo4XxzSZ2ur3QZDXPYF8V4+gjW6g4zW6r3GStMfUhWu4kWlLq+k6pfZdmX9oBnvXikDO3GkCO5wVRCeN4xIHCOG/jOXqNlAxE5chkQexc61YyfZWcxVboDAhLjTPdvt/kbO4wz7B9LDLWLxaOUwKLjSgup3VkrbCjsZ6Jvojas84O0yD/QQhp6IMBEOrcBmwMiZh4St9UbHXeueDq5j47oca48BSe/h/1UtQfY+D/fL2uhvI0NDKSnfgoeCuUjlQQri+ukAISlu4BiVMbGyQ1xv9+lFx+N1oEQFl4QL0/H+SFwgF6gsqg0Yt/aGRHoCY0Joh3iTAKBGih23i0KdqDLvQjDX8/uyZIDPd5qFJ58GwCNYojgQusGaJ1it5yt6AO0sasCVuMH63P1dbDCoAShBmhuJk4HjxAMfVCieTV+nt7enz8/8Xv2mXr6iuj4Mj+YJMPkFlRtLxKQwq9mg1CiVDpwck4DoaWhDrRk9rRWYWQDXANiJt2iz2rGuIUyEKEEygwQLkXDopCxYRkkljxv4M9UmClJ4yUAFovbBhaEkv9aAq5Qigq1Jc+WrUXLWkWF+HKBHGU8S1gzDNgHlUiKIFcXZEvc66EMYdDKYdBL+geTTBSP5E+s0Xlr9KqJYtczePg2SBu004wXNlRMkhUIVEDksnHWpJRr7KLaQn/FgcrMc6JNcGdw+l8Tk4EuOKEe3BgSdYWBIP90HprTvD0U8Vd1pGuqQaV742sxqNwDkSM+4AZRbGAlshvhykEIlZcjdL4OaDoAbygggoSb8k9HSVKwiCYeoC95jW6FOxkwDMKBVKi+UGjh+LAI+1Mne2RlZwXjOEwXVW1YH73zprBnC2vlUEPpofnQ7n6a0nO7atKXsupG0Rgt8/mykyQt6fD3oG7qHZrp8emqeGwIGd7ewMEHKpLTYLwViMh/qk1ypz2jqrS5BLEANghBlQ6H40jyIBBWkdRO4huqO1cQ5slfUxU6+m0nLnfA1tZE8sLpFooIHEiqT9l+UgHU28pBkt/qUF671Qjq9CD2XR2TnPfphqb3LYN1HUkwc+L7tyoz9NS+1kQ0No+dYNmUL04xbyHeFqfeXTuKWGWnBU4zodvKgyC7F9cKO4lOQ1Kv1lVFqo237DN+W9rBIXkhdpZX+2lZZA4azyz7T7NQKkgGV4sBzb/AQUEokqKykqp9yMpMKFYR2LwTUEasrnFRiMtHpnChKjO52Fy78Q1EnVvVw5AT9Z3GoPZuk0eRiBAzeU07adSdPDkOlLzIayqwORxDdsbhyh/uqpYSd1mx2iliAxcwbz0PqAEKlgBNZ+3wfPYEmWJGVGo8jt0HSixYRKHnT0saqXUiy8VFLZGTSUHblgz5J5yyMyhTThp3/5gVQ5sTlmeFtVvOpBEp0syK/ZGmRqUiEYNWwzP0gW8WAlVVicXu6EgDV37mSqWkInRh45XFoJz9lS4Kxl1PyweYLoy1VA3FBhltyvXQBftWV2ari9TU1gGPKjQgPIww1JaNyE1kiPjo4iHvA5+hZTTUkBzMwhV2mjl39RqJAB5vcFlYIUiof7FpwQQHSP0f3pYTnpqll298hr3aWgqMsP0ozwug3TAINoz8iXZewWX0iY3XpJc9h4Wm6Y+OLTXDsXB6XHAXuiJ39DhW8LuGcxiYUD9zVFAM3gb3bw/jPN0M1RZAsf2o1FkUy09fADVDl6vFmP9sJ6eYi+Uppk2bNFCD4J1WJ7ZR7VfVenbCPkYY/Sg9WbndoIUxbadYDKq2pYZcOuMSVg1/6tEQyhDBQoqYVRqKEuyUnRdRfXLGNRIqPaQbHeyatOpjpfb7JMacHQ9Ahm5jOOSt24NCyEaY1m2zN32ugFJOSCEUIohGj19zyD0jJ2+r9i6azyjwqjuCgKbOixVA0C7xhDNT5wKc9jLQxS7xqTcspucoRTB/0EkRW4AA5XoViY7mKgWcAv/CNfVgarxAf01gYQrQAXPqkV2Ta0y8G0paaMcqhEDIng1kq4Ebks6vg1ZSlAlaeuzkCIp+RS4UTrZClNER6KiCLVrLJ0TAqo4XLiowReehgHQpGGzN7beChCT07VK6KimI39vgxM08VomL7oWcAa3Yx4NNJkclqvCTLuOEvTBmP9WaDr0hOowpR2s7f4c/NsLG3Rv904fgs+3+M+tygkXPHTDHZ9iexic2Z2DrG3Spksxurl/9G1fgEeK0ePaBs8wMiYWcpYERHScT+C2YlJq2oYub5TQDWzXGwys2JIksX2yImURmV0+TZSqt+X7fKle1hXCLiQfHZJSuRsPowH1qoiEGjbF7jQr4A1p91yLckFeAOPqubzPWWwmWZKroVLiFzWN1MrxpBrG9CIfarTqyfKjgAuxjmoFN4FASNBAhNtAYa4SdQdq9lcBikSdcEFfRuuIxpjNhBSrUPmV4mOGisGV9VRdylYnRKuWMe0IIvWoCkpOb1KcLko+H/KDYZBIR0HmEZ2AppRjYaEnZB9gIZ27YyZZSUTZ/yMwNrwP1aAYvCaJ2QV8AYVFLiMKjopMvn/f8mCOw1vjSg6BUZSEra6PCIpPYnLpnMA8k/i4wE0swqXzWstLQVhxKpFFlB4SlhH+AtlyRHPHPXPBQ49+ZeY9N9MWTLlYEGAnOJrlw4deGl7BU6xlnZ7CpIJAq9lLZhuXt1Xfjboi25hJh4GwUv4Ql+ajTGEtEVOGEwvJkS8EOGI72ZCXs01/2gQ/hK1dYviCENAO0qK2oGKg0LjMOY6zyOVEnamJe/R3DQfntiEFYSzeq2WPb2gSdbiSY40qYPhZNdN61ufToKZjeyuuhH+0kCi8HRoHy6SNIwSR4gwLgaUcVeNYptYJhi50xJaoP1GI28FLDQT1qtFimtc+ADetGCUawKxxzcBSxUg9BprsRWjxUBRRhMOwrEkIIbL7VXrDj1q97hx/iLvLjoICb+trQRTehrBLZBG8ZRfjhOI3tsz2wGOzwcyuIMsI9bX1ChbTDnSSgjziIOR30QtBV3yfenBlkmaPKhm/zst+OUypfV5abQhyJIqJuobQN/SQQL6RyI4LQ/15UvXZWxU4Z1fkTaJ8poYN5OWoN39gt94cuoDOgUABWgRZhC6qJPL4LV1mfq68kL1GuYEzdlgRa6rQFr0vtPOPxoGJ3GdBmbaC6uKJO+7pzVSFYarllrxYBiWjXcr8NpRFXgSuIqKayzQQwjDy2DUyWCE4ngJB/XodcTnz5GqxIRV9Umoo8gUY9P6+chwSXuqAoGGh+H1jNjaXw8RylTHo5f+iLAoMW6IIF9QwhpDXxXCRPPJYAzlJspOCAu46i4BC15IRzZ2xhKiDq6w0UfuSDq5RaO8MgNdDTYRAGrRuUWf8o9GyaPsdaXeFB6CLbo7Bq7VAZFF+XJpIWEnh6mno9jW+xkZg5Zcogldy4A5BqBS66Yro5WRd/N+HvuJhtS1HRu0aikqxvqvy+ZCDozaE/6lMqv8AnzwSZlIbmZAQQ0wabfaGurwjYA5a9T9Wv1znfbvfZAA+EwSkYP0st0LOkN/S5P9Zarer0a5Gnw7y+WrLPJB3lQfXe60ue61Oz2/ZUi1Lkxp1X2q3470Ouh3qqLesRuCbyKchFQV1FT2tMVhmV74O8zeFzxBcHjAnND60iuYhIPgeAhGCzKKlrv4YzAza3Ch3ttogWXO8rQ+EnvYwSsbeblKh1xi0PQk+AYq4J0NKiaXlgs/kZ8Kj+nzmiRmZSBSZLdpOjyvyBI8KL/Da7zXvOOLjUDodmvD3YgRFsFfDEBFejymR7+2wxAw/gmCjTAx2fSxcBiwnzqxJsEL+eh0JjrIaHDPEAsWYxePg4oErJMJbHTGJSXyvwL0oqahpaK2VKDeeUxg9fwEC6YQK0p3BQoRC2M+lOgZG4XQiRIoyRTQIWleSHMlSpCKWJr2dDPlgU2aZsmTLkStPPhPzgedfqDALygsUKlL8XQg44U4zXarhlrkhG7vKb0cYrFOv/lsSZD37oH9Xgmc3V+OM2+hh9YrbDzVhN02qzDNfZvsECbypPJ8DVZ5cW9UxbIYF8tUyqYvGgJymMT9spoVmWaRQg9vIUouRnGouQggyq1dmiXJLv01XwwzYwbKc1SDyWIMNhQHrqmFh/5aQQ1otp0SUwCO8KLCpOZiH8o0b6s4ZpfjcceUSaNBDXA3N3xNYEpCwlfvpob8Bc4qkOYrIKGskSuhr9MLEhLQCSIS7Kocr66Ezh0APD0wO6Jgs+KQ7p/DzwvQUwhgoRTj4QYpgb8du5orVHrLR4q5KYXV2MU7i2cWyO66e4HGn6KywJBlKZbLLuuLZAHXhNRKVsbGJlzgEuO3gJqhk87jNQ8dX8fLZlHvcBGAurQIreIhCVqs/yAQ2L2uT5whVSqRsx6tPkyNd8vXJk+Qm5SyJCHHSogBkpnxPZikHpJGFiiBl5/CYOAkSUOihXFqipyMvUYUUSMiBQ3gMX2H1XhRYXV6C57ihF2B4eCCQ0R+/YCGvTw+4KgqPPyQHD0icApT/DlXLxOEdusOBxU0wC/kO9Mo1BQ1NQsjALUB8m2NgATRI8NgsJ07AYyTCSLsxBc5s5jb/xwcLNGAufbkD/vj/558fBLBND8SEXJvFt1DfSJjxg9z1B/6OJ5oYk38M+es6o7/id0LtR/DyXp94nxXLOZDU0HSFgPJmaSR7D07mCib5disFBLEC1XGWpHf/ILG+g3P5HEmdEnXNxxqqI5SW//r4GIoObNk4B+pBoU1HEDAHDwEh/rGHgg7FxAZgnM9jVFpydjCD40UHrWnrS3TmmqFOVGzsi8ypEZnxbpnXpEqZK4dEoXjCEYkLm0QqMsEkia+1CMEx5isjBG8I4kg6SV+aU1pvIJaSgYp4lJKHhmaC0SJVIMuNCCsBjgQV/AniexjYrliHlQ2DsCit2XDHkx/Gnx1A713GKmqwsH/VamJ+b2ALmzFvNGUrRUsuCfN2xBtNs+K8a3lYwOW9EZSRGOd8cySYgCEUqPAYEkF82L2HC4k5SsiDf0wqVOl+zDllp/MUTcfDyK2mOAt3ndmPgY9uMAUMmhEzUAijWbPBEHQJNZUNf3MOETLFbKBh0GplWv1hERa1MJY4CvybNWZLRNiY3CisZFu6xcZcuus8YlQq49FUph4JiIokRHxbVHsekJAQJ8AG4lKPFEKmD1f/mFTE852GhFlDo5BIMI8M73ZiZeJpuo44sROPHO8247vtFKtxG0XZXYEKaeFuUrqaQ4KA1BIohNJQRT9A7EIGJhUyG7FqzoXRMHQt1unsnRVJvJpNHpKnKd2xpARbyM4WmHHaaf+03gwVQDaFEOSPJLSbPg6UWKmo4p2IVIJmCCUgEBg/KEOC37LWKjRwCENjVRTubLjXXEseFSqU9zxqVBIRTYQi2ghN/CIM0UVYoo9wiH+ESwIiPBIY4e8yBWZyB45v3CJTB3n2jpN6ojMWajp+Lx2zMKLjf4MOwgoTUw2CIQhCMGKhycjCkBmQGZGFI4tAFoksCvOxUK+DjZK4wozM18TO+aQd+4lPrJv+0MSDOCNu70mAtFAH9lt5ZKPh/s/VbHC1J7Fdg8iAhH1l0/1ZvIlh4w6WZJT9yMonQ/dlvRYpWCG8Gk4dYjUjbhk0v5vvh+d/bo9qctrf9aRCvRay/iiBwvLIk4buUu9JJ8tBeEDaJAOVSg1uqNMCGAbEhjdD68J0iuLk0GKCSBjT01H//F1PJoAGRr/T7ED4vHc0xIvUD2wmZGWl1a0HBCOBYkbRuBGFeTP+pFbrc7PuwllvUwgmeNRgoLyGNs8w7IO7ZUHsXhFAMR8aNMthVo5iaV6NPHaNS+8vJsE4Nu8+Zsxzcyh9ohyONWthGDDDshzlYLUcxyXQmKEyXAXQTubG6FjFpz95stVPKllYB0qsf+TJScvBk4BPzsGasKMgtFwcCs+MuRRVsVNvrrniG01ycH07HE2UvbmL01YKdF7WKUS+vCePu8V20fIkL20eb8eRfJg6g32w+VZUn7oan3b3PKa0FhsVzJTB+Tdtacm0CqcVtGTZUCtYCpE0AL0TGHbEm6fQubhhwbKGTb26HkKressuaisvp8EOvy8Wjgeiw9ji9Hb7ELs65ZJ8WrEmuOqJkpSzJVNBaW58qqHume6IIXi3nOtI3Xum4ZD909sKojpH2mtuRkvGE5nph2Zm6jQfJIiv7FmtLVrMXMEoKG1HMGAWqJERjePBdBQxYmCZKTJiccRsFHFi4DNXZMTjiPkoEsRAs1BkJOKIxSiSxMCxVGQk44jlKFLEAFgpMlJxxDAb1HrCZ/nFRrlZn/VWLGxw90tawCbh1MqlUaF43Yg3cJJ24aohRXFNxDuI+IVrRiiKx0Q8QSMy/hPCGcpGs65NhJh+3oL7aOMOJ9NJgAdBanUW2rHLaVHe2yC2g1nWA+YOoNx3JPOAduy37dcCeh4yNBZVJhClIkAmTcuvaDmBRhpwypAHm2ISJbGvbMjVY6ha7RqCHGJCysEieXASqKjH6SFJMbw0jcpryFkorC1acmRl0pKJZXmsoBUpKiJQDFqUUcMYmsvsN43fY9wUjiFZVaohZ+0zvj+pqcIhQk4nYa7ZqmkohCqkBR2dwAsgXQqZFcu4ZhC3OL/0iwKWqiXvkWUmYixee30JkGZiujJLxl4VBoYYcUUWb6JlNcINARHj9xMLt5F26TejTYFEpAb+WHHeoEc6tmqLXw4P9icKNSFGE2tyjNmkzFTNDLF7O+giCcZSFVhXC5OiWI/EA5y677OuU1WZftbLvgGeenGjOSrCbj7ehTKzFEJitMdqMVTgajSdfP29vm92h9PhvNqkrMnm85Me1ExyzBxTGo2m07J2G3Y73tHu2FrJmMlzpqErPJmAWSqnOp8TtVMmfefp39vQTpMcfqJzd09rjcN2aLGg47NCyR5vDWxNcjEy87HvxYjh15+me/B29+FNkPIAvKcHzNz6dDDuO+c+dIwkRkLxzBPQQx9uBtOhoctvxwef6P58nVp9yev0Zfyi/GfSrSmOXhKSzXBJUL4CLfVpgsI1rrk9to/raU6cM5Dnn5a+Wl1RoIyzFHbzoz0qzjpDWa823N5vEt0F02yVojkD/rDAGyH0QDDSl8Of/chgAPC4yfc0Cp3oUa1p1ChiXJZDTgnafb11WSVFPytLK8qXf1ht1lO5S443JORaCIrVMP+YqPxk3JzXQhUp78lPu+Kzn1yPmXs045yb1ElTEQ2Se3Ouk5WU8myxEGEQcyjn+rXI1Z5BlgsBbjQe+f9SzdfC3FBQnl/rx0SXVZylEboCcl4uDpIsyKvdwyR1NxW1ZP6cwVS4t0Fo5Av8p4bJx8nllhdvRdG3I2+MNUxRcXxV9bhQMO1YXlwyobZmojHU8jmnVUpeSbd+kJjrplOVdKta0ffFeTSyiC+qqHec6N+6wpQtV0/IB9yQEt8Pzqa0iIKcRxGyl2d2KNLeQ/XSI9HoLI2gQuO4LVptOPuzmNMFJVeDSmdpZhPZ5ihwFQYIF177ish6w+LrM3/WLRFbe/zaoDksXIttsnIishm40o4Z6N+G8lhmUY4Fj35R5CVLqeDBq227J2tRVMh2Krk7Dq/A9NNKO9Q+w6VQrsXLcpbFihBOs4x/LNp70ahA4YXVmrnBWL9I3BAXVV4FFR6X7bWpdQ3UAW3tHL10v3HW3SXWBHNPZsGoCF3AJmfwUDkS8ttysbBeZWNyKcaNCivW0TxPYYErQg4l5wVZBS4fdJhAwFLEgH3USJeTr5mi0J8VeHNsxSsFE30j0VUgC0LleiMl4LAwtp5Is2qvnNk68VOjO3LZ477lsQ3GghE/9vWdfYO+e5rBanJKeyUq34BunYYsQsbEsEmwIVYEcjSDTFiRiloelQhei9/te32DxeK1mNPbWGW7OHa1Jdn86WAeTPi4dG9kMzCxex9XpJp5HNd7i4kPz2teloIcBn0kpD6ZTZa0tIMTFeV9ue7coa/r+HEH6JiWXBvjEhLqsdomf9CdYNWmy4fniiH7qLhOkCXtgXYUe+Fz7nIz/4SxZglzlwH7kj2fAo9kyMtJFjhEFzbWMNeijBXoajjc05gMpltdcP9rTGdNp7becwXKQLOedt/kN8Iscs2429RS0M3OsOcFeGpSm/3XyUfNfbZPn7fkLSLXI3/SjLYbztl/bSFfSy5HF6n1qIQXndVXGzBgq3omUHawB191+qVP0Vly0bq7NJ5zfJn2bze3EQikOd5zJImAN23gPHiXRj44UD2o8t6pDvealCTO1cEyLHv/IK04+1OzKapTjvcGgbbySISz/y09/dfwUjnfC7xCZJPDMzR38ZHl7FoAtU6MRIbfLFYFYTYzAvUTZ741FQhdmMqIukFK3FwZFNThiarHVcu0YMrhT9w45Qq28ziHVpgwO544ZuVEUbzlWphkalF+joBnF+lWR46MneItnEEfawCy+Rkj29yRalyHVkXJdpJmoTp475w38CKsrXD17rtlGZDo4MIgQda5EUolDht5SCPIVrZXDmnVLe6tS85yOdwSyx8qU9+Dg4EfVapUnakc6Nzj7wOYexCrNNversYig7LUfG3XuZxxna+R8C3PdviomSE5S9pw0c9FReq+TRBaRf7l9qVaozKHrgYMsIC5B1JZ5tsmHZCQH0Zp1PVYBVmx20+pcWj/kWgnDjmtmTs+XStpLum9LirpWuimcAkfySouN54+rIE/xh6nmGgCwdLHySMyywVEJ8YM/ucYooAtisNj5qpAh+ON31whht91Oq98mm/t39fNV1/LHjBCEJdXG/H1nzyPuvrGagmAOrxL/pFu29uDeTdsMaf1FfdvtGm3w4gWUotGlICui/HejeMXfqxnIhY61KFDk0vq0ccCCzawKFgMkZtlc2C4iZyotW5J+IkQGd4Z7sQMAB/M+y5fvFRZcFQY1qwww7EgcMjMx6IOTue/AVUH5f6/wEJCBvMoIGQoQmNP6Pn3VA9yqWa/P6k/9+jDLYwkZK1IYieaf/WetqSIbcTGR6cDgnVQGZRxXxASeSQfJ7JsJC7rBFiMDEQufUc9BjLG5mth5SHyFvm1Y22snAcwB+vqryjmdUypKAhAatdHlcqvXiQ+KOT08mD8gqazud9mj0YCiSclWfmIruEwn30dPWBnrBCl8cXqsuQHzfPErsFc/3nSNFEwZ/vdggcgwLU6Eq/d7mXRvFwmuYUFT3BOPQ0ZzOKThk0oEihLlvyWIAcgW5Qy6KzyYGKtgWsiWZw5FPjjzfAZCHhk+NnIbgl1Rv4qE11n3tfsNuQclt5j1Tk9o0/DqU/gPJeU++yjEbya269Z+wiAezp10m+k2N81ZHg4fWX8Aa9wvSMoTm0EZDE8No1GYjghlHYW41cquM8lJScSZBd2KHwcKW+0LJGr249Idpxh4fcc5gC3yYVgH/pcQBzWd8W4cqEwfwDXqnZNJuXnv+8fUeRzlJycHK9YYcdIbWxPXOT0eUA/X++/wEc8oHxY/wfNusb2PnKuRw0MrHjSYSUFBciOMuQ8gAWWyCfHl+d0fqR9BJoYRVydw8lXlGGAEyoje5o1KhworylvpgXAuAoTN21Gn/T2cW3EIOd2Q/6UAkW988JDpj5rk7uLcfg1VyYlipoL2cGoZrzfhGrTbNVWyIbbkoOwxtTVl4nznHr/SkXID6Tx2GIPwvtTHvetcY0i4Zku0pnN8lUHKH6eaYU+arNpYJQyqnuejsSgUdolVTs8lAEZJG79ihNy4bVOTvDi73mL3s+IuJhBo5pmnUXMZdodkUc7UosIkgQQfF09j5C7DzGImJlNSwMftcvqyn61AgfqRyPpmMO43i2jLwXErqk9G1W95tz+/yKZmWXuJA+wMq1jGgnwTMvwEnxQ6Bj7EplGo1cLLZgpq+qKu1JjjDtfgstMB2ChCrgqC8RHhkFKnc2Anr2cIsoSSfIarDtLfEc+XyS0mwOPwmmmV7yTqikh8alWp3O/Lx3Mn3aqz8ii+KyPz+aZxe2rfI4sihUxZiymICv7QjYODMO/Nvnwbn7Ai04FwoH8j07hYNzt4xTu2AuvKW7FWmPwuzDAVp/TWtjofQT2OdI6+rjeR4yXQ7sh79Ot/GqZvT2bkt+yLL10YY1AvHQX1LqwNBYokUj+p0xR/GymyRau/P3WhYHilX9rIwC9WLj8i4MvI8PW0FTyMS5IiApO+rCuRnYz6fzhcYgCTfl5rmK8hvxfUZyYwYfSwQfVX84LxKTQyOCQa6HMgM3qFuNxiGeR1TYpY5KFn40OFBgpSg45R0inSiure2+OBMBoYJA9vnsBz15Hg6VEdg7UnKvkX0jSXOfJzONfZx49CcPyT7Pkn8MZg1vnrv6XMUekYcOpwjTh8GnXXodSUVT0x4L0uVsTlInvTgLOhB+ddHVs2sF75wcH3yjwZ68mUoIeUR6FpR6JX4SPM82+mjU9/4+JL7v9b/70Rtv0v7aTG49+Itj+9oVtc+jWOaMp14X6lxdOjyxFCd9C8IE0pHSrBYMoVBGpcWPmK9v2AAOZba226mBBqRkZ1VRMCgvbttJc1pFSW3YFKbzELIpPQq0APz0ZhNZxfRMgXjOblAkyGBiB3RxuyyQo6qzSNBDTl3EecR67UTeEQmfQMzmoEi9UENlVQmsxT6ywyIiQ9xhBZIVXndycWdvU1FDa2V29rWcJ+mHftnPbtxXmpx1ASkwCY9Qv7OsRzGtgFqoXcnbZCl2jbf29ocg1wK6BD343K/uiBqwOHtLxeIiWN6RBdmyaUbWYDqw3qUwiYhndad9SYzJvq7E7y+li4kchdIRcj+Q08nNyaQKKMbGMz4d3M4Jx9WdMj3J22Qtd1sJd1iKX1GVUsN1UyK7nrtmUgcuEVmmNeP0RtvDYCuJN/Ctf6uZyNj+EMhDzSWxlSmpPWDdx/0M5y6ksxQB1Q7WcEI40/lM7nQw//+ei8YUgnpv1g6yVLJE3lRbL6sTUoVAwNYoQtC5WLzjcO7vdfHKuw33w9ja6IPy8ci165ONXn4sZA5aiJmbuyVPP3k3y469hFybwD81EPGCTTNocE5tLMuLTSfrX1vKZVzM25Ho4fD3v3xlKllxdx/2eK3V/pHVaMCWa1cDRsm07iq39mog+SMd3aXnwznWeDiaHnZ7W7TId+D7DZG/dgS9TDnxd16rf/i5cq9Y4pn+qPqE1Q20sJhvhNiZbpdSeN6mu/ZY1JnEFNXhSz6Br67bBnh6p1L0JpHleAr+uyQN0Z+8FfZ4kGfgZuOQaaK8d+hy/78sWsRXG895NRmhUo+NkU7P9mBp/pSrcJjJI3RieiMfWpBgRE0/VE+O5w9z40Q5nmCNBJ+5zKQQuDxU9x54XOpv1QKkkHASom/CCEdtSUkCn4QnCFP57taszCAB3U9kv8p/kMje69CNK+tHiJSDZTLl01I3yqDS6U1fX+ubZemZdfeups90kuIQzt39QV8DXP+RK3R5rX/GcgUYNRDWH98Fa3rJPmzKfv1H/kKGcz39P0G6ussFWyqKejrECQ99HhaCiuSq9+NdkE2ktSPCxZMXBdYur+eiyR1Ir1tSY5Po6S2mnrmE7z2IQcanMsMehXY1V+wtiHmiJlXqXpZG7AUtmuR8ZQaJeRWXS+WQ4uBm4C8w7USdHED2SN1Is7ThZb7viEclIf8ee+obOPbn/LBqN2D5DPkfyXp3DwoUo8eysqD+hL0HcH98Xf0Ykb1VKkv2iXdkXsjNEecF+Rq7sWda7TEn6Zfbo6688Shta8J5Mk5nQDJxB9XjDasayUqXcB28m2d32pDdjosee2ZgSbiSeSsp35yedinnx9Pxfo3tP+tZqWh75Bf2LqETut/Wpd3csj3F9uHNEZ+KJAdgDMxHMqBOJ9tirN5Y6f9pVG7u6QRb0DEJ4YpOub6SwaMewziTIm6LnYyGmSmfr+kcYBGWZs1PJRJ6IY696GOKQpicLqn49CPws11P4o5hor3x20olanoWsZMHOcvnF9zJzw1RIkRLp9ZuJjH0U114BVEzAEwyA0Q6o1UBkjcxf3w+qHBXmPeAeDl8iSqu+weAzPAEi5IgEbVh53k9q7D37uEzfUFCSqu/9exLkeiBP57mzZX5NXfNeCa0EVGpgTSnrGTR38aJ9ZuZmgmL/bwWXiuFn0DP8V+yeDAgKGFXx98cDxa0EMmTpPT2C9CRhWVFzzZ0eKHVcfpKiQqZwy48kNFfT7G111tAN+kHHIMDUE7ubfIrHYZ+GTtHdalonVgLcUnlNbSUUYN2EquKXH0QVXCv63e9f60FnIFwl0XYRqhZIPhggB5/khR07l/C46+FpiaL1h5A4aL1Uzy2k5S88glIzWHmZ8T7WtK+fPYLKIvcCjL3w3hY4aQVtWiEP9sApR/U5i+tXF9Dxrl1d6LUF0fHxBUFjvXtAGuua6gTXKlFdMS+mPvrXtk/y8vcnZWfD+F8yx1lyebLnGvK7Dj0mkL53zYNmxe8FrICf2f80U+XUhzGBpcGxR2sJhQom/fe3ibKgyNMygi0kMmh1WQxdziz0rx2LDQ4sjeGdObCcA8Ep8GrFFALkQSh4kTQSAZMq02JKwKBIAQkPNm2JNRQE4wPxz6JcAtd/DsNxh64XX5c2zCxxgXTP78Bva0zA5hujzLG1jen+pb79n2wZHIdbZcXKdjQFTJFtq7BPI4m6VSu973AIY7hwTtVl5h1sXmRGa3ZDaCmLqts5VDTYF/4VJrJW3V9TwzOTlQaYp+LtlRSJOUiHcVvSZhWiYcQt3iRQ5IYp4SIVDPz+l9v+hsVOJkZtuv1G0+vFwl/u1TFgLuyJFQq2zLh8iCwTAvTkW2uE5fj7FOQW3NsR8U398huCWBKN/KglGB8cFTQsND3o5giJX6GevrHo9vR7EU8ubndTMzaBzJoqdWNEzI05iU56BSbCsBLf8V3vju/hEWKYqNhvdPf8yHjJ/Ha+X1EVwityDPkLfEtqd5Q4Rm2yz94JaMINzAIKHG7c/HX6oLegwdHdN1Gz0wUYsLKNxaxi1d7vZ1DnLty0FyyrHF1R5g/6ryivHJEZvN+Cu3tk8NaBAWbs47gYQ1TfJLH7A+f1gNzJ1OrTSTsiKihKFLUzq1wbpDVqInauvQLTzPejHMW8PEFPsma6cbgyOSb/sJGbQpyYu0bq3gWK71defbd+q9oUcqyfk14Bys7VOxP7MXkim8mh36UYUyqCwgNoCkq2PEOJILfIKPnWbjdDmS1XUGgB4UGJIDGBTTOez5f33xMYOJVny2SZ2QS7ZmeWya5JOAZB/718+Xmakfc9SDQ31RUQGkq6astURRmmkky4BTZIKKBVouYqMU52JsSjpCjDnIS4mjiS2mEyWa1EjMajom6UzsvFslVHvjtHUJLkchiIsatmTh5HzjNk2yfcqHMld37WvSZ7/ABQEGPjX7kr66/YUCHcxuxH5b9ohehn65TMhO0TuUUiFstW1j3m2Iftk6sbRqpASHS43U8J2KKpUe3cMSUQMEvq0UX5mVP1RBPRr8G9LtY8aN4J3ovqN+3R8ufeaFhj9V23X0Y/DrNS3NtGG9HHioXazLLKkRXlgWDgirLKUZkGrnXrt7fWHfg65cCXdb2WchWMKq9Np25UNswybklD5anrXq4qxuV5iNe0r6kYeovwXoaKURMWFUEtIgRH2/hqFPBaesNTf0A9RpteGQrOg6FiI9+2s9h6Vnf1aTpCgTfGvftCqOke+rRjSKPduGcTOkrqKOCgvPRFv1uVlR2qqgnV622srNzN8vRU6GgcigGNyUPr+PkapnqHCg+v5asvtrAEKjRJ0MfykICfJuqkVtaTnyEnX9yaOiH+HF0C/cP8xzIx30noC/IJwIORvr+1GePv8O7Ex7X99i9F4gN8glJ8MzRxygxjH1Hmf/triPGS4ZjlzX6S/pLL+OddfxnR2KfMWGJyvb5z6iFYtCKHL8EzhX/Gnu5xhZ14HIwoEJBcaUhWcStFvKTv/Wu4dzmcDxstEOK021keaMfi7UoPtPm/XrtXQuP42B2/+XZFvXZFS3Z4929ucPqHs523h0GpigkDgGPNBqF44IkTluCFrAU4VtWiEjhV2w9nLkhcTT1NFkabNRcyB3mgWyG3ylme3R5oImRCv8Ec9L2ArauU3DpbZWSOOWFnKKztGS4qHBjRkUV34bsiytuK+RQWuYa1SENLUBCdY68WS3SVbP7uMGY/LO9j0SY0UR1hXc9dTwF5G5glCgbiQT4PQrXF+YXtCx5WtnNuAj7uq/A8sx+S/8q5UPlDaH7/1eU6roCQYdq+e98G4Mak2t4oRbF6qX2i65UH9izxFAeGho4Ik4TH4AKMvfvjYlstwcL8yb0kpsWyHPkd/NUX1CtoIiIvMdWUnfW2gH2o1FWwVendycxPC5s2TIXFX9O7XqrbqTi0pFVud+FMplt7dPcvq7ebMgQE7m5Z5jCpXlm9T9F0whlbidVL7D3PQge2kwfmzXtSEFQJa84AM9Kh9OPg8bfVpVPXHsFBvWCaTuEL/gD+shyxWJhTzCF0d+XKSVU7DJs4/su+cVUbGT3teJLgOTitYO+t4FuqV8v4w5/Gqf2EaoQSRnFe997zHJND8hMd99MZoHrE++mM+O/wEXjfeDr9tPhfTxmXKxttLZ/P6B6WxqUzhzFlt07fQq54kk6P/6fETf4Tn0d/S3z+HWNr5SmHzJjO106112F1pdSGA/18EtU+2/scJzgApwAuQIFDu5vC+9a9zUEEbPXyKpYtNBkYTco0ZAL4nMmOpgxEVXW3msuJ34TlkTh/CcRddzR7BfALK8HEWZwXe4aYpgHZ6qPJsP5Slud5P/f9NPFYwCEK9867tuDxLZQtU9hUq/d/lPzD40BFcQml5DX0v9Ogm89/U7UFje0NPZbmWkBEltbIhBZOLmbEIe84mMbPHDW3YYWxrKBWVmQlUcl842glJdfCrxmQTd8SEnbXqTAB/DJZO6OSUIdrnAd9k9eBGY3Iy2T1DMqHbKt5ortKU0m1xvucMkW+LU1WSxeZRUz4gfGVsx3314HM7BqA+SLu0vMK0p7TzDWstfMN7O24vdbLTL09DE4zligk56Fu5n+5elZGg95Wa2aEPPDr/+E7XOKmnDShMAKOSpfDgUz7MbPERdzRE03GOH/9ZDrT1BS+2fNFD3UuhakGzcx/e7YH3x17fxbiWpj1xWiAD5VruedXSBX2SPoc5luyhPj6mYQmYSqMY9zXO+Q7HTz7GrwUtZ7WLFu4YYTj8thX/pSnvzwLH2jY5lqwW3JNOMjHiNgWpm9P0vXFWCO/cSLfysK/4RzWLMKyMPUXToQ4LWiuf5YPwFHtASgEHWBL6+SHZqes6s5xsLeGfilFYODlSKhvOJZ88Y980gAl0vTZVPRbdmrehn2fD1dXnVckRbLXyncZGmpPajNu6Rx3e0UTPFi9c/Rre11vXOSZO2kCy/+r8Y51kcndxlP6DVEf55O+zOFqOoeKxZo29pqpENDGlMorWVGHIVG7irsdBOD1JZsRvswP9r5LuNR6WYQsZnWKCalrhsA2k9b8QMS5/l/WxCxwDpi1XfAD5lKDm0/moJs3n6LE4p8o8xhfBKRHX9sF5kDLp+T/jP6st5Ip9msL6K6u8fdjt8xOKRyEBvMOr7YmXJP/yy/azyVb9TJ2TsM8RDfjXWWw36bP5kbx+zH5L05d373P7K+IZQneGu2zvGveQnmZpJlBFL1D2CRO7UmyKiYgUysP/f4xo/0OVC1UEYMKUJydYTd71Q6VlAwX8mr+rrxuYDR+l57PF8NLFUV/BTp0hdYuq8yXmQWtKNvz4GEh4ZffYx9iD5eXnNIO3sjBVV6KpayiIZYjCn0UVjs0YmaZsrNNq2vgWa/QRtNs0wXLLF5qUQUCF1Q6akTbZhT6/g9C4uKrKtgN8UJhUBjalo8YitpqKnz9+0PaOxn97upQR3GmlDnsdd7qpRbfev1uji4O2PZxT47aO8K97Wzwv8yojaDf4/oq3iDzae0zFbk5+YBY73WZUbF71o258V5575OoOXwjWHG4Qt5r9xdHalyo3Po+32EtMV8IcBhK7CRKAc//5q9cyuzdL85Ups7Qd/c/BvwKUHe0tWKeQJ8qda60fincI8xl1EuJBfaJE9sjA2qokU/KBYV6BhHDZrCruhfgsGCGdRx+J+QW9CmaZnciQ82P2hKCWfP5gPFw/WChM8kvmfJBlfbAJOYRlHAomqMZiVK34ikbdDp1MlBCuNhYPk9o3TLrRvX5tsJ5seJTBC1qpH76Vv/gga/qOkeubnnmFVq/flpXBLU1L9sSLK9w8Nv6OOlOO6523MJkELX2Ht+I/XyuwYc3SlduqBc8+kVVmGHS3qE+DBK5lM5xFdZz354v9t0LSIDLnzcFlNUg9oYik0Ukeu99PlvIh7IbtfXg+Y+LcF44nE0TP/dsYN1yBle6fuzw+vGjR8+siPNHnWNyt1DCidSCIIrvxTbp6g1aZgfqxTUZGr9rktBwfHsYfmPgMSgvk1epALaNOmyPNowDFN/bhk1dhLyUzE9uVK8i88VTUw+Ui6EvXV0Ea8ol733dwzWwlL7Dubabd/i8OvRg3cwl0/6xYwcZi0IpfAOXGX4CRIC2/VkfKp+zUSfQfQJR9oVYQ3kSscbeBx31F8sOr7tYBDq23P/sSJ1vy065J4KBxa1dqU6yeq3amxKRsneVrykJCV2LxSUHSnkk5qlwfmYOjJB4zHqZStTrzFO2de3piN3aHkgmi5VsAkWHImz/hiwHyrSXs2nrOH/wtYGwgRJZ2gDTOyw88UVYuc5RPvCs7JCOeGweX/wq4ihiThfFEQmcR11IwKH+xUjlPTT8LCU3npRwZQuqxhejIh294omgxCjJylaeAkqEkqFsU3KUIqpkd1JZJ2uT8MGA2046W6VE2a40KHZlBV8px/Ou249WduhXapRZyiqzNH/xiYQPv65ZPy8UfJCr0qlMKAuU5UquOdMYkZPNA9RbizOdWONbNtGnyBvE8V5DK/P5UlCaOpYZH1FH9ysPxFUHiTRsQ2JgVZO4zmM25b/iACgO4UxwEz56UBEqA4Mb81HPdCmitXX125mV1qj47jLRQ4qVD8qtLBGrsfygRCInYVcIorlKSbRLUQg3J57GN3pWSYlOKLG6e/E110ObM0k37RtuzmRcfViJiwkeyEPcBu7yRAfw7fix//j2TMz860RcP+H8rkYmbPaz38mOBnQbpAjBv+ZBvY+CgNyulLJCfFmOR7HS+jmZfydi6g/aRwxP43/ZHf3D7q68UhXXvRupK9M7Livqsc+SLARNJ6Hc0sHbOcaDiSCsK8dYIRcoJ6NaK5cTFBCvlwoZ43nmomjb+KzjS42WV0AiyeYDKrvGK+ElyrI4HCR0KiH+BX84ztVA/ApUlZXxQ3RVFohvciC5tqYqIA9eBnHfK/G+6prXKYW4fjxTURadt+TfguHaRWLBDSbsr7WakqQ02afzT57iD5NONSC+pigx3YyehgDy5xyjafxbfk4L5aBSQQ/5Dq3etaKCdyLZ25UD1YNUPRnAWtvj+66qomVhwOoAgsifcdbRUqebAMc+TO6mrL/x2S5fmysXtcxiHYqWHnK3K40LEMCDWKmAS+96oVZdrEPRUpr35BzS9wMkpMOFQnbfBgMg7pLF/Iv3otz4bfgwhyGgVlh6JkkVcb+bSHZsDUg/BwDcQl7ytaWh9DqQR0Bisy4A3zSld/7kkWUPHJ5qUUmTPOswiUEAPy8d4CsgsRbf+JA1Kfi6CXsHos0nVsK5+0k9Lg/4znxeAbE/lZXzTtWyxuthdwSHy85NXlektcv02mo0Z2KaQanOlox3RROky/JGGjqVagfa/qpcR5msodjkWa97JfNtAjzd+8SuDVbuUmol/yz1EghnidHPaPg9A19g49eutZKXiKol//JV4h53/ULEdmqEkpoowhkTwM8B9mUolr1aXASHDzTBEbmhGVuSoe8HHHWl4sDu6txIrY4h+iwr9MvKM5bWSdINcMH1BxmVE4m2Rf3DeKFY21ps6KxodS1L2mELeKmnRvp+dWaQVwW4B/FmVABvsT+qgLwEJLRFeiXd0pv7Cq60jPtgKKgdgUJ3dPXp1716NCPcqXq7yqQJV4JFurAwWCwTK38cgOH7oRuV7wQCqZdcEqR8OeAV5UDdFQ6QV3z1kx3CekL7WsRi4Cnkq7EDQRsQKg4PhG4nlq+TxM3MV0byY7XyoyhxRl3vwI61tHZxmMLPhUEkMSLlQJWvryFtz6t4Msfix7VX9cFDzgeefOpVgoleBwYL+3rEHRgVHMUqITUt7fvWJQGX0l/CHuDvWtUpFwm0FalBaYcZr2zYLKmW3GWhca19sx/UwSX4g+UWqaptpYhF+sk1YGjPTmXKCZLbiCMbQyFmzy8GGG/5TUVpACtaXRcYmTZJerYNPWadqL7itLxaalGayC3N1l6BrYOk2rwRBIg7Eusqqnp4tLmAHN0gtIMNWnsE9vNaooKkAx7Ve1LiMuoY9hrHQcC+JRLnGF6lo2aoMxzdYuKEAoWF01FubtA7kFGauK4AkGjFK+9vN90KEMGJtJpgmswEhzxuJDJdAvOXIsGmrTpB0RQqZIXiKa01roYz7Ukq1NDGNfQaTL99Y+4rd4UCCi2AOVFV562MT7eC7+JuiKpxD7bw1jmFo8HzoCFZsPBzBBQPQOoR0zUoQXrdJQkgkffl6FQvaLuQ6OpGjLBh06IjXSZzbEZz6CrmPVE+3Qx9M7bjwrk5D/StZI3yMe2sucZGCuOKUQsrywP38jUVNBoVphSHNIUET0BMpwamGFm/z6+77ZGPevLe+rh6Zv0EPKnxqy5D2A6gwCmdgILpt7XBuzLa15/wSMhvGU3+VbKGMbFODHD7i7CvwW1j75dHtTwQxk5olH9Uc+ihDAfbNO9IwBv319nyxouPnxTOzPRtbn7KgWc8Mn65JTSbGz3EP5FXK+6OhDT+RFFZd0I0+VF1wUPf7CE36zRG+gNexe/Hvuc5vOFf9XOeY4KOuuffImbmbLpale295UucUbPdTVo05D7vldrSfvb/5fO7N8vUd3UpeH7MZy3xHf5X9WgqmgUvOeEd9s8RY83HdBzeC3H7EYaMNQnewuAn7csjALTP6o31eKYX5ycpPE6Z03uexCF0emYD/GAgR7oCIocUknzDxNdN1V1mC3iyk22psrN5Sd5OcPwyr8fmbVG2iisIUuMiWxNY0UklA8ZdmnsVTGZt0Qag16XVIIxYBffbOVpIWvBUMmuDQbQEtztw/Kgy5CIcYf4ykax2x5453NkNkMghZF6O35FlGjGibDJbFQmcyKqPygI4wtH90D4zzCpltilCNKljfIkchyl6fNM1gBlm8klfCudHwP0dVG8wJhX76KEJZHORLnVBwOAdTe4qvMra/szNl9FatJtEhBmjEDNPs+I5M4cKiP0FwuXfehFcQ8ZAGA+u66uBwIjhmebARTp7kUH25aO+YvAuvdcFtoxKzH4mqLWmhzL9EjaJR0NvetucOcxGniRKs8oLfPcytZtxSCVdFh7SCIG/GH9XZQjvCzxQMLQsEHso4ug15whA7KHUFnixMoXf9bzq7Jwb836SseNGQ38j/tu4BnCM4weCvX4ZcqvaYDM+VDrwuMn6AqfaO68YlDmGiPHL8lWn2KEQyfhwjBgx6TU2B2j6HwFfN2B+v7jXEzPMPns8z6I1+45u7BzyXD1MLzDcEqwAOb4wlGeVBGoEYxpAYa/PSyUHN06xsli9FcTQmPs8TTXotPkFAYvVZoYnzeMRDSi67f6Lww04e9KeyoJTCy+H4TJ+rrfYRxnwWBHdgmKG4/CkkiHrLg3b8xftn3bchN3FZ1g7Jit7xbgAAhLQ3sw2NL7NkQHT8wJA9qQRzvOgzc3FLP1GH0jABbaEY6gxNeHQKDVWvduiMGQ2e91Cf+jNUmmdOog1fUECgJ6/ty+GisbuLQu9KBt6066o6+eIrjlGpRS0H/sH7yUIdsGd2hy000fDLrNkvVRK1lhCn3gEvVp2kTBAaqjVr7GBoAmPc9RgL5knRapLgpEnlKtDxN54MgUJC6pctpElUFgM3SDQb6HHGPyW3dM/fZiTffcUH1LM2GUqsokwB3mPN+R1BU1sAW5qOwhIjACuxC0GMpBTM/gJOjLj3n7k2EDI1PjhhXWS57adAbyInaD4LnEPyQn8KAAkOXshQzkdktlxixEOeHd2A2FkpSAfjjSAfh+qCSFaYMsbDp/pA5VNyQQpF/oBby67BnrKdrFG3tw66loUYvo0bVN5ZOy4jMJQadf2odo8xUreN2AsbmiEx3ZXEK1CpGlFTiniN8qSJtVV3g0xeNJzDO7TfTe+x0ovTM98bwWwMBmJgxuIPpPF0tiM4wYHFMX90plZPvRIXD/1UYOJzOGV4rWE75D351rZXsaWVXPDDfpHTFEnXVe8KqM7/b6UIDPi+rcCawdQiZoIN8hGwyyFwgkEIq7XO1g0kNsMzVjYLpAc3tsG7BsIzuE5YpgmGzJKbBJbovdRvwrnx/z//9UKgw+LXHrguo5aWsfsBQPRd7m1zyM8rE2jP1rroyPrPsDGbK6uBZ7/g+xsID1q+n0rQ0InLMWBoosoWruzgCEot7lBY+TwzGK7WshSI9cwh0lOfvGRGgjIlDACeAwB5Mj1BLEXokX5f5nr7TiSXSbP2SUEMr1oKfO6Dr8u1jZV3dQxUZerCjPDJIo214Eh7S6ll0SuYzchpJtsWp6s4ctfsLLm/ln6ugT3E/UEYHS2DRNep2jm4xtiZQgOW94Itg7Fgs2TMWIXPBsB3oVhn5PLDCq3OOKscUEFwPugeL85xRQHMpoNMqbPgRGeDhJ5UYzwFDL2sY947yaYK0xaRgMCSNM7YQFnGiIX/7WSLBE6JSG5ZV+39Ho35Vx6EQM0VkkGE8BFUevLGfE1kNZEDbmH5MU+Bb/AySkg2dwtvwGpPBKmrZLsm8yetAO8Y8GxFD0+ns/29dGNbaOORwcdHaDmYH+l2ffKCrKZdVbB3IV0iOA6dhl9Qa4BrjKskSkL6rYv50T5q/wuGh4wx6RBBzcxz43s1jLYrqIiA5eHXnFzj2bOjDWesCrqu/b3QTw/gEI90P1ilTY+p+cJBVz7ZWLVmPREY78m5jdgyHRCmGMD4EexVYxCW9UsdAvrJBeyHK5+D26EzAw/EteJ95s0OSdBg8z0Cd2RP3Mrx2PLa0UcKTC8BMq5NO58bNNPNiOOV4vvNAUV6l3ejsDCxkVfBnoKgLZG0JsRD7rsOJp1FcZDfqb1qISHD2/qqSrY4vA4iVtF8I3jFgl+DZB8+nXfyrZZtmV9AjMjOsfIzdiya+Oc1X/OZtJDMGT7BrPl1BMFck0Jk8ERhPBAgntqEr7dAeJaGYm2Rikk4+r37FiV/htCpWrSSQeb8UchTUHRs62SwxOGpGlxBfOil+wKF9aO2XvQKrx1pP/S/v8XSJYQTqja538c9b1ViqPLXwmTlFY6o0m/UDtTc8qlaWkN2wG4qYQdWzfhwe3u4UVX6tbQgiZ6pgLyr6xDm26SUJ5xHkSDEd58ah5D3uVK+P/19fO7t9w6MxlcWvoL61squj6uPmvt5qBRQtiRDSkAj9HKe+yx0jo2z7VYcFVIUY/osipFQcu/knj8MSG/pdeWQLstfrJN/rM0V07koTGrtC+D9pXhlMmCKw2bGwBfp1/b3qxcbE0h31XPl3FIH7WvBMfmABEaf7W+7sdEh2vm/SnhN8BMRmBJGp0fVSjYUgi4TjxVEqZQpDaemLqkr5Fy+6Um/ADEMQvJr8DGb/VZPxdza3AjTCP4HVgBh+9m3qlkL5Ss2MXA1DLJGY2/hgogp0S75qYysmIHspjlm91Q0cbqEAP03p46KAxAJD7w6yFVmslacMQi8ESkYzTb7eeKmPYCRWftnNJkCwRlQL6bgMxK8NcBF7zTOWMBtvHbkxrdvGab774ARWJrgGVw8kZIK0eqxYEAN+8aKz+crI9Q8/hgLnqa7XvpGpx3ysYcRTvtti2GlVPEMtpS2SiSvBIb0dZa+5L83akzBngwoxY8uE/3ObRD1KQRg1tKANRc23E7dXjhSz7lAiwncjk359YSYGrijFBJdzP7vxngAQeVVhMuXSkP4CE97C4HsJn6+Vn/GV6P9ul39v9/ru/MBIm/GlNuDzaHyFbijdRAHHD4EFlrfxQdwwAQyBS8DvWduFiNGcpFk7e7ACQ8BHu5fod/cKpsbCcuUrhhHz0+j39YPSYELlq8YUcP/JZto2R6KjKHiayl336kUW1MJQ9ZMP+bJYbruHB+EZa3U5xo3O7be44x98dkhyp1FLP9bnKWbGyFmpGm2RGjDS8YnKBpqW9SXW9Jc/CbadX+XQ8PUvHWOLpmpCdrYEXTczafFKuGGGCBJTZ4zh3bDlzbOTinnUmOW2XxipbPFGRH7YvEaIJD9zVrOEnymguYS3vMaF765AMEVTZxTw2Fts6KVo1UWamlP0p3yi/T4mGWaBluuiEEFWM90ipmvhtigzkN7bKJp/XYXZkI9kaVcirUvjXiLoPnPBQ8qVSD8VtDVOfJcmCUd/SIsUBfjDrRpQDj9dfuG2GgUqJYrlg2KVeJZ1fRNRDY462QkVgukYqtN79bQeu1qdN02UQxhk0ucFilQR+Nt0kxcb8O0BpzqCpR7xoyz/htZBrqbDyfrqMx4TSfIv2op/cegSXPNO//Ge01MZ+7Z5FIxhcENQgBNCRpGfwpF3Duqqiqwkqi6colgbfu93J8NO8e5k9qqJeZQhlrjdoJ52jzce95tAOPjEgU+CzWHgo8awXvCFfF9hgEINwykudIeFqTkN84LDCjP/nI2ZpYn/G2zv4ub0BLn2xlU6r0rH4i3rFOGrx5dhyLYcbI6CZsDd4o5uTY4liyQyaK6etbS2zP7l7KWfNV/VQybVeUSyQFgOHZOrH9XLh4L+KdYsFgNNJQpQJF67NDI6Xzci9aEFH7Y7dpi/QcXHQXwJS32C+G/tIPqAlthy+UK13+k41q0+0kJVWbK7S6/e2AcD6LIrhPE75pGOzJcs7OB2yOUiUjbxggB6CTAJtOH6eleZCVoyO0DUzuHRumeHcpJvtkfzcp7bIxLBwnwrF30CA4WsQt5IViZb/QbU1LuDVRyZquEE+pnCi4BYdTZiuJZqByU3AkwLNNqYPHZq7WBJHlqg1qx6L9JCxyRvqQDWGEW+0ypzXR+gk2yoqThnW8h5XkTQR4vBG1lsW99ILHOJpyFojofI+kxWnOVh7xpCtLaHg5dQ4+hd0SfJYJ6FZ7wd+BUppSlliIY6w+XK4JztAHyz7m6utW5S9wL/lgbq8crtitgjx/Qg9GUdmNolDwJn5kDOms2H4hRM0nHQ6wOLT/yC9iAC25UjzWU6O0m4kRuNiHHmU6eSBghHdLPfaFq6/pRaSh2I5AENNhoyxpcuff0DWAL9h7W567u7SwNmE/NvbCEMALzFUPsDbOCgVBRdh6dOk7mf+/m5YLfacHD+UwoxayJOQAw+hF8aplOB6U9N6ANstHekhnTMsO+KPZlIZBaftzyazLVFEZqiKt9FyGK4CkFGqKGKOLUFjo+/Xk2ZDdI6bsadIjMTgJ6PoGvD7rHtA+ayEqUxVxhY+8yfwYX2Pdhb4CGutP4SSBEWVocDf2AkeS6N2AQxgmW00aZUgwI5jAJ0V2PwV/4fqsBbGawk6fSPB3vF8Ab5N9AY6MbYh4AWiuYkTIMsmbq6IxnTbIhCcPfcmYYmi0c3//ikfHv+ZjPYuO0WD8zvCr7bKyeUvdLW0SEQoJTg4iG9+1QWCjTzqOGUVYtUH7JjFdqAf0q/9yGwxR64vQqwoGT8wirnQmUzAb+7W3jHwRZgqXQyifJKiuB+FeZmwUNyPTMfgpOZqVCopHGTYIoO57p7Qg+IJTlSLFwx4jAWZQp3vACZ+06TUUSKEU8RtlSfMyxzMQpJDiJvNIszmsN+sOTemJLc9Y6ZqfdwRN3s5Mc+3LR4IUB5yUEF0SgybWnwVKWpkZiZs0xSfQHG4RwNmifSs7rjiZbRR6RCG/etrQr711UV+xAqkiNqQCC75rSTCFbyZwtIhJBjDHDMK+bqM9ILa8EILAZGps6ZRcWMYvjbYBe42CBhn3ZznfFNfaMv/4dH06ON2yQRso18+VyEWTRNX+iqk2lukQm9N+rqaCuRzddvWWL4ul6nHBA29YNKTMHgjTKqllCo0UOp6azKIo+44QkKdOevARCi6ZE+geZ68PMsR5FQNsYuvZZqUYW1SWUT0Hb6eIkvxGLADSbMubXTAnY6KdeJBnT4FIbqGUySDRdIsyd/jtO8YsY7xODLmCMaZzvoWHLBcDix69B5+qc/LBlaN95wfElhfi5jKJjbJ0Fkwak99sJAysWL+2o+2ytV5Yrczcl4xWQrFhjqlyB+fhldgjMzrVGnBfcwr871Udz9mluw7C2dnQN93SklR/SUej9WJJfudzq8CB9ZvgJm28hZHg/tWFB3i48koWwQOJiNxS+gzLrb0fKxz7IHlw9lIMpm/jh4qCPpDdAQuwYSJXTtBfST4kp4EH5+DjadbIAm3DNmxBg2k2hp7605hCWA47Y1hPKWjlx1EC/KsQP6UHJHAr3aljBJxC4JR11NnwnsQfofNQTPYA9yemajHJBYjXBXulYZbb6UlTg5/XnhezA5oTJUypagG4LgbXb8aLiKSfBTpUt6N+BS6iW2vd19wjdWnPNn9+E/e/P5bOWYVxxtOj9sh2bTB4s1Xl7h1VrJffjtob0Zi9iLjdaVYrekOajIFKdoOTZ/ZFdG1/XDJAgTUBGrqUWNewe8/VYQHnsyoQsl/7pZOPhIOAkFprdnATOe8UynVOM8oPbDKfYqVf2VQw3RawsQZoedQw1FSfPfFKPooms8lW7VL+Mv7IMwCGVvB3FR7Lb7npSl3BAl3xJSS+BysJWEEy9SjHaB792ZKdRkaAT1zoeOzDbv9ya2osjHHFH/PNsN5Rp/hN5DigbBlqyXfOqw5hn1rK65Pzb55lq2zgszUMPGVLO0dwLikiWhG31wdIq5U+WzkY5m6DnoyGoKB0Q6s8jVWkHhamZuXQ409UROovxnaKg0KYzm+EJGqP8dIlXg8YBydV5tYsK3+iB/F8rk+Af9G0LCOA63sbco/hOgGBhYAMvTugcNMo22rZGEvcIkeRVoFBMlMPchLLKQKDgtfIMupsIGdTIkZaATbvnJEHCIEadW3EFl83hgLUIhLP6WwkG/siPAPvKss5WiKFbPnyfWcks0wteKQ2U0m8qzaHFBOr15jvTgM7LCy3pOUJwO/1DZVTU0+/qnS5IG3Jy0PjZy5ocd6KzPvtxTwueMXrn9KvtQQSNcy89hIj/E3Wy8oDIUimb+mAB5JjAp5IlZijKBVlTh3CD4V/kRe9ZY9K9Kw3+3/Mn+E9qvOXU51Klll0EOt+yL6EmVVaJSxDWqxEuCsiCZD17XqFQK93lfZRnmnuREr99q+RlQr4P4jM/PsIGkB8IqilCr4jfX6F6pZjGPXc8Ef/CcLC37DCf2FR2WriOuBtPw+fRhY3k3+EXDHEjf15VX4prwS1y7+gN4j+E6+b71WLH7o266bz1kUgY7rCaPcL/OJSg9/TAsgj6xx90Q7feA/Vdd6K/UlxTal08kKHhq7tQm9gFf2Lu5QtXdjLdTXpVdQg5V+uvFbk2sXgPCv4is5j/ieu/Km0D70pCHTEhM5jfrdsCblpOqgdTiEAfE/1btAC6OfO7twtZhsfr1lze46OATuHzGnBx1fpN0ErMg5UTA8neclB/IxOONMqQPFpJ89tfyHOaYwW+VEPXqXYflSyyh6M168z86UpR0J/qfzUCmcqtzusYEP5TvAxNwSF8hhAh4hantpf2j7wWMnVr4H0+thUioVaEJ5fAcIwQWMxwAWIaFaneCx8CKLKm9hrLHQOwxQ3faEpl52rvh21PTclC4fQmG2kQsnqhQLieeEeFBzYlmpCSW1owRdXY1g7RTbxj9YnajcYSZqCUij9MpgWLnYq6uUad7UVT8jskSa3dlZEVHzrcR0MbphgTj/rAIXwOASAzwp1wBQNdrvQL1PkLevuPafwnLxZ2WonZIo1cqUL9+DCc2Uz8cIgW+R0WJsnFaSV/y/yMiVpLB/TSAO9KbosM5AQJdb1xXBk4WqKZ7QyxWmkqGpGC9OSAygtH8MqvKjZ2trdkCE2IPpRmsaOqUiYDOVkFEQ6wkGh1ssmnCKdJRWutP9tgchfDbBKR6TLI2IgYT6izAqq4tOVrRHwMRFGsx1GON6SApp5qYDYX2zhcMaO1suYglDZ1XC87jUK8mocRH8wuF4PvhFI4OMYFbbSdQrg2ZZupZohwymc2oMXJKXB90zpRnNKm1/mZxwEEFr90MxYXs0yXyvR8ns26ykym60ljMgWFZkWGx1zlGLDKNGpLfFiUDsNgXjyrbSpKQAttJx2e/k9hCO9AyiixhtkPktsvvZzPeEgGpBS1MGivDur3PJB4mUoU2C8MxV70i/HnFB6lrTnF1EyvU36ue8F5ye6Go/vGCnntLxib9JcYeC/xO46vjT2/VCxJf3Zvbh2Zdy3BbZ2oTyTrWRemlx5nBjozLpCM4aC+dJL+FhWrULz7CwFy2/JqMeccx8NWVRHqRAvTQj0KAHfdN1cDsM9ANheMZEDwL9TWiAj31L5NPb5JkMcPzi6MwtEBnKXaq6zN0Lmu1EzRBYsbHXej+keENjWSF89Z0GClBZbqvczqvTXNcJ8NqefkrrqRh5OuMeFL/hTH8ycfAQovavdL4UaFZJozgRL79Z+KlrIMHqblJa7VED85eGHmsD8UQwklADEGMYgW2nYlM8M7En8/S8lIvJ67BRkaVaequlOzpyFHmxiLx08bBn6gtYhLRLmyy/STZIA6dQJSXuNAl5Gj+iWqy+FY9jdvE4qf7uK2lSZPCDVEErdPTUi1ba9lapn/kqyENydLkUmkV5kqmYxXiRbCO1uRkJ8gVaCX5U5DbC9IPKXocSDbVNKcp/YBAuqdaxbiGDF5Mq7vXy6p2ll1RRbQYh6Swj6XHwaQGG/HVShq+gnfvR4ZWNbtLMIZrEaiyIqLPnSdgi5vK9uOZXBITDd571VMEwmV8NBi+XzOH87juSg3efKTV7G8TkonJBsMxRCqrLlLgNrwSjo5Vy6Pm3B7eT2zzmr9x7EuPfnVREzC33C7kKUaC9SXGOw/YViNm+EeN4Zy8pe+rTRBVa/xKBPFAoqdCiOcWLggCK02QKsa9OdEsSa2sZupmD7E1LnTt4lJ1nmxHUrFtkmcBRA1o3qdgk6RTdRZwdYSwiUTgGG0pW6onuwGKI59uptCvQrOIpAD1leLS9oxXRDB7W1ZuEE4ochkFWILKcsnUVj3pqBd056cw6lL6TWNbXFuzRBY2dQVINGmlzrffy2buC6VbZ1i1LdLgWdnKiFE+Gnd1shpwxDD16fHv75hLbGVTi9/2rlQl9J4PFgofdq500DEl+BKNi9Q6BVeryUthWJSVMtXiWnNruktiIjD6RPPRWE1Z/DgIEgdkoIKiYcVRLaX0reI+o6WuhXl7rqY7alcskwok+D2T3bwy5OrwhFHFmvojZLugDkR+tnJdkSZng8IO9zRpCmA89K/h1NAnFgKhA+4eCx/1LPLxK9d6GoGqHBDQZ0H/xQ7cE7MAw6s89SRnL3g+t5XSV5LF9FpDGTp3Mgp8YV2QGtqC6pHRkBAJzU14gsS/5REVG4jvRTBHZhtE8N7jyotQwRtXBJtFyZ+8jcIZ+PKMh6FE5NCMi+oa90q79UnmkEG5mfFNyBmo5XwcS6PI23JYEOzYyzlL1gQxYl/ExD5ovyDJEHso/s6CwGwuvsi4IOzRL7dMMmSmSsTemDi4Hpgsc3smBijqy3mtN8qiR0uJDPjl8P1ldyuHEQFiyIIXNpo5q9pAlyhWVriqIC9rqOPoCFXqacfputFepgQPLGoInb9aX2DcfXmMpIsCcRuynh9aZlRFSR1OORvwrZW2nZvPDsMPtl0+bYXIQnESIV44t9cDkhxiz5Au4yQGNPNOMlc4P3klsID6lTM7BpZyUY1dWNrNkRnPLytf631yBgYqIU8dj/0jT5+n7Zj+zgeucQT04PkelFnk1xcqwND++g41BYO/9hNnvxk2nYAtaS6oA1dfDyn0V0tizYM1cvtaCFd9MkFfejFdGvgs/1B+TU1CdWB+qVNGH3UDtP3INPP7u2+rfPitdEH8M73FUcV1nJ79fygn5VqTMtXZ4sXlPgFlXhX2Frbv6h8mwIuHVFq6VyJmdlzlFT6TISIoMqW3AY7lDl5QMSpHvHRORkLRE8yRsQbhoaUSSjikSR+NpMQsMx+JQBd+KsBAfJ6y9xvNCWmLFbDdX11fgceVXTdWQx4AAVTwxAW1hbplZJle+h5xqq1d11diYv9Wa/p+4O6W0+0tW5Bw8o52lF17Ir5VUFkIEoTiugjv9Z53Su1p4RSWpX9uIuvpCGcHULW9HAU9WxvOyamqoXcwmdEHrkwgHVz2jQOCQwWIa8KT0jugrbOMtCVt6RGWRdoXrWdBIVGH09jSso71bCeLw+I4ojMpLGksXC2akii1cWPvrzNngM0R0qjHWzXDMhJRNtw0IqfX1shSXJTpkLUGKNLq8ilO9CK4igbkvXzK5w/SzB0+fnDW1LGotEvBOpwp3pER4llj94m0bA+OQjd5/uqwaIJHc/EK7To462tgJyilIVHhzzEMSsANlk+kBsDYQ3Eg/1dwtuXmERfGI9skgDCJwNnl/uf/Xdqdz/ENwgnPmNM5prAD7Ya2L/9/J/QapDNgHmTfUImN7UaWgkCeIcEmZNLYldEljZva12BT+Bf1jCKjejRMWnjBksKo2C3ZTrB8SaVqKjSULcEellSVEly0vW3cuQ+XlOvgsAE6RBhkiIiUI4UT7M14wvvuEfRxWqVtPiDUGFYEqWIjmLNWeIy9WHJI0VX4GtCMlKEoXp8StRhvrkTQpKLGs2m8E+MZltwfa2SBOSFJTZambOqP8XSxt/08QnkAWRwUdxuywMwar4Unz4IK6QC+xBWuILtYMh9fnQC/RBBhZ3xbpbvXVVil9SUlQssWUZUoI5i+JGPt4WjGYGOeFF8gOy6CD1gdEnwr8I4FBkRxuTRVrcltP3qKKp3+Qs8T1TSPr/X/vRKAvKJgHxVa6pb0lrwbhXE+k0PWCJp+WaJ8EMOSRCxMA08i4rb7l8in/eEjFtPn2UceRZpgnhVauF3BaUx6Fcq5xXKOOU353EfYrch/JAsZzFWpp5Eo+qomynTTEEUqDBEvk0yBNdiVZk15MUlHTYkiaLlcPoWSu0PMZaOob24ZfQXCegPGulib8Md6WWFu+xxEaWLMDwMdXn9OGgzCAWY8XrulQCNteJ36M8qOLSIg+acUgp9JosDTKNJT4VkC6WfFP11OLnPpZ4yf2EMj9SKksiue9PA3ltLW4YpI6PBbtnSr1Fiy2R4PIWsBXpRdDZy5p1lQvp4nsBOaMnzxLvsFLhmGR2E3KHdVso7bRFTZ8ywrhKmbMhGVhSSOvPJIvX67/qjLsKbO5QJH1RabDyBUv6FhdDsU587mEcLTpCYQyUMY6KT2AkUcvPMK8iGhdNi4Uy+1HZJDT+FCAL5YbNBTOg+FO6PEXCeVmeIfWd/BgmMzCCP78LL0uQXAHsG46DPU6zuNSVDoj3PMtIoaxxi68GOO4UiJHNwtJfkO2to40bldwNFhhHORDNOmFLHWIymWH0JoYgM0OApDh+tPfxdKK9RfFePjaxjKHYJw3sLEyiib9ITWuq6KXIZlcQiF1UYy061KcYpdoEzh59NEv26pm89ybY2PdUv7GIA33pShyruopoG7oaIme6WpG6J3axidMolOn1aKThA17iVV2EPg53UUTR30WriutdDL+UdbHKMmoiR02UqYh8Lk0CP91zYOsSONOkEIpgm6XK+Aw9ClMDK3USVebkdM1EGMnASwwFeDpq9XhthEup3n7no1PYdyQwU0mw4YIk0lzPBosEc02OizMynNuUOr/GYAkYQWq50cJdyVAL74ke1U9K7ylEVrlvjVEyk0aeqcSc1LG0/p59L0ZppK7Rafcc2LoEzjQphCLwTB0bM1uHHoWpgZU6idaRuSt+ijqEe4fMwl6KGRQGeLortBjedBvhUkbd89EpYvuOCfiMFltzNnzECGp3rudFYpGQcyXAND+rC5xqS9HKYCt0MgKvu9lfBHqKcZWhbglWxuSPWfh9TzJyvSrmHJRgmeZNn4WpxHyJ3Anuze+8F6PUZNX9QOdapXnp9jTu9WYhH/MMy1RNQc6tmc71yccTM48Le9rxqiXrB7OYc/QskonFD62YU/yQtmYTrzw6Pjk9e85mnMsrjLNUPXszOIv42xHf+x/m5/vfNp/q4+Pb15Fn3pLK+DMORXkFRfML8cpzKcPqx70DiDB5XmX+lyWk0oZp2Y7r+UEYxUma5UVZ1U3b9cM4zcu67cd53QRJ0QzL8YIoyYqq6YZp2Y7r+UEYxUma5UVZ1U3b9cM4zcu67Yfj6Xy53u6P5+v9+f7+CIrhBEm93p/vj2ZYjhdESVZUTTdMy3Zczw/CKE7SLC/Kqm5a0PXDOM3Luu3Hed3/x559Bw4dSUnLyMrJKygqKauoqqlraGpp6zjW1SORKVR9Gj0ffxZeYLdlw7YnbMAHKrTt77IJUkTL+9GOHGDb4uAlD106HkqY79x0CphYMn9VBom67R+fTT4J5nEhV9UJh2uvub1O2SjLoWWISIVBWK4qDiFDSimtKpjHhQw9Y4wxxhhj9QcuZLIbBEKZx4UMqWwyCGUeFzL0SimllHoqxnIe/YJo1xmma43bapiGaZiG6WUKyFO171H4KY1XpfktaGPfvQL+eNmpW6Ip87hYJcoHbey8fgImlHlcSOWDNja1AQAAAAAAAAC01lprrbXWWmutjTHGGGPuDOeXFvUPtDY21bsEHFhrre0mVC6ttdb2CDhwzjnnnHPOuXELuUsgwzDtfI17O9U5CHl6z37yf1FPcrQD3I0ebpiWGjKMaF93A0F5P6cf2Vf3GN4LL1HfFXdJXVCbE270tOrDUJ8AezYG/4JI4w9uwTTDR6PofiN5bMf/9Dn9WF0QiXDGeLs/AsuZL55fdUe6aZNfYskJrP28/0R3rtoeI4p+jPx/wX3MU/dTKHqQbepQtAkAAA==) format("woff");
            font-weight: normal;
            font-style: normal
        }

        body[data-v-f3fb3dc8] {
            margin: 0;
            font-size: 100%;
            color: #3c4858
        }

        a[data-v-f3fb3dc8] {
            text-decoration: none;
            color: #45c8f1
        }

        h1[data-v-f3fb3dc8],
        h2[data-v-f3fb3dc8],
        h3[data-v-f3fb3dc8],
        h4[data-v-f3fb3dc8] {
            margin-top: 0
        }

        svg[data-v-f3fb3dc8] {
            outline: none
        }

        .container_selected_area[data-v-f3fb3dc8] {
            display: none;
            visibility: hidden;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2147483647
        }

        .container_selected_area.active[data-v-f3fb3dc8] {
            visibility: visible;
            display: block
        }

        .container_selected_area .label[data-v-f3fb3dc8] {
            font-family: "Didact Gothic Regular", sans-serif;
            font-size: 22px;
            text-align: center;
            padding-top: 15px
        }

        .area[data-v-f3fb3dc8] {
            display: none;
            position: absolute;
            z-index: 2147483647;
            pointer-events: none;
            border: 1px solid #1e83ff;
            background: rgba(30, 131, 255, 0.1);
            box-sizing: border-box
        }

        .area.active[data-v-f3fb3dc8] {
            display: block;
            top: 0;
            left: 0
        }

        .hide[data-v-f3fb3dc8] {
            display: none
        }
    </style>
</head>

<body class="Adult Dating" data-new-gr-c-s-check-loaded="14.1148.0" data-gr-ext-installed="" cz-shortcut-listen="true">

    <div id="app">
        <header>
            <header class="container">
                <div class="cusotm-nav-container d-flex justify-content-between align-items-center

            noscrolling-navbar-navheight


       ">
                    <a href="/" class="navbar-brand logo-header logo">
                        <img src="{{asset('css/images/DatingLogo.jpg')}}" alt="Adult Dating" height="90">

                    </a>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="nav-icons-container d-flex">

                            <div id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade menu">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <?php
        // dd($_SERVER['REQUEST_URI']);

        ?>
        @if(!empty($user_session))
        <div class="nav-icons">
            <div class="dropdown sign">
                <a href="#" data-toggle="modal" data-target="#loggedin" class="signup">
                    <i class="fas fa-user-tag skokka-text"></i>
                    <div class="name-login">

                        {{$user_session->email}}

                    </div>
                </a>
            </div>
        </div>
        @if($_SERVER['REQUEST_URI']!="/post_ad")
        <a href="{{url('post_ad')}}" class="d-none d-lg-block btn btn-secondary new-ad btn-block">
                            <i class="fas fa-plus-circle mr-2"></i> Post your ad </a>
                            @endif

        <div class="modal fade" id="loggedin" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="icon icon-skokka signup pr-2"></i>Your Private Area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body menuadmin">
                        <hr class="my-1">
                        <h5 class="text-center"><strong>Hi!</strong>

                        {{$user_session->email}}

                        </h5>
                        <div class="row text-center">
                            <div class="col"><a role="button" data-href="{{url('dashboard')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-home fa-2x"></span> <br>
                                        DASHBOARD
                                    </button></a></div>
                            <div class="col"><a role="button" data-href="{{url('ads')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-pencil-square-o fa-2x"></span> <br>
                                        YOUR ADS
                                    </button></a></div>
                            <div class="col"><a role="button" data-href="{{url('credits')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-database fa-2x"></span> <br>
                                        CREDITS
                                    </button></a></div>
                            <div class="col"><a role="button" data-href="{{url('products')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-line-chart fa-2x"></span> <br>
                                        PRODUCTS
                                    </button></a></div>
                            <div class="col"><a role="button" data-href="{{url('edit_profile')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-user-circle-o fa-2x"></span> <br>
                                        EDIT PROFILE
                                    </button></a></div>
                            <div class="col"><a role="button" data-href="{{url('logout')}}"><button type="button" class="btn btn-primary actionar btn-block"><span class="fa fa-sign-out fa-2x"></span> <br>
                                        Logout
                                    </button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@else
<div class="nav-icons">
                                <a href="#" data-toggle="modal" data-target="#staticBackdrop" class="searchmodal">
                                    <i id="search-modal-icon" class="fas fa-search text-clipped"></i>
                                </a>
                            </div>
<div class="nav-icons">
                                <div class="dropdown sign">
                                    <a href="#" data-toggle="modal" data-target="#signup" class="signup">
                                        <i class="text-clipped fas fa-user"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{url('Userlogin')}}" class="d-none d-lg-block btn btn-secondary new-ad btn-block">
                            <i class="fas fa-plus-circle mr-2"></i> Post your ad </a>
@endif

                            <div id="signup" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade menu">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="staticBackdropLabel" class="modal-title">
                                                <i class="icon icon-Adult Dating signup pr-2"></i> Get into Adult Dating!
                                            </h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body promomodal">
                                            <hr class="my-1">
                                            <ul class="list-group list-group-flush text-center">
                                                <li class="list-group-item border-0">
                                                    <strong>Publish and Manage </strong>your ads
                                                </li>
                                            </ul>
                                            <div class="action">
                                                <p class="small"> Have an account yet? </p>
                                                <a data-href="{{url('Userlogin')}}">
                                                    <button type="button" class="btn btn-primary w-75 mb-4">
                                                        <i class="fas fa-sign-in-alt mr-2"></i> Login </button>
                                                </a>
                                                <p class="small"> Don't have an account yet? </p>
                                                <a data-href="{{url('signup')}}">
                                                    <button type="button" class="btn btn-outline-primary w-75">
                                                        <i class="fas fa-edit mr-2"></i> Sign up </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="sideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" class="modal right fade">
                                <div role="document" class="modal-dialog modal-dialog-slideout">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                                <i class="fas fa-times text-clipped menu-close-icon close-menu-icon"></i>
                                            </button>
                                            <nav class="main-nav menu navbar navbar-light navbar-expand-lg text-center">
                                                <h4 class="px-0 item-mobile">Publish ad</h4>
                                                <a data-href="/u/post-insert/" class="btn btn-secondary new-ad btn-block">
                                                    <i class="fas fa-plus-circle mr-2"></i> Post your ad </a>
                                                <hr class="my-2">
                                                <h4 class="px-0 item-mobile">Services for you!</h4>
                                                <ul class="list-group list-group-flush item-mobile">
                                                    <li class="list-group-item">
                                                        <a data-href="/promote-your-ads/">
                                                            <i class="far fa-kiss-wink-heart"></i> Promote your ads </a>
                                                    </li>

                                                </ul>
                                                <h4 class="px-0 item-mobile">Follow us</h4>
                                                <ul class="list-group list-group-flush item-mobile">
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.youtube.com/">
                                                            <i class="fa fa-youtube-play"></i> Youtube </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.instagram.com/">
                                                            <i class="fa fa-instagram"></i> Instagram </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="">
                                                            <i class="icon-twitter-x-empty"></i> Twitter </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.tiktok.com/">
                                                            <i class="fab fa-tiktok"></i> Tiktok </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.facebook.com/">
                                                            <i class="fab fa-facebook-f"></i> Facebook </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
        </header>

        <div id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" class="modal modal-vm18 fade" style="display: none; padding-left: 0px;">
            <div role="document" class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4 text-center">
                    <svg width="90px" height="82px" viewBox="0 0 90 82" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="m-auto">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Group-2" transform="translate(1.000000, 1.000000)">
                                <g id="Group-Copy">
                                    <path d="M40,80 C62.09139,80 80,62.09139 80,40 C80,29.442469 75.9098379,19.8402466 69.2276681,12.6914872 C61.9275517,4.8816324 51.533859,0 40,0 C17.90861,0 0,17.90861 0,40 C0,62.09139 17.90861,80 40,80 Z" id="Combined-Shape" stroke="#ECECEC" stroke-width="2" fill="#FFFFFF"></path>
                                    <g id="Group-9-Copy" transform="translate(16.000000, 25.000000)">
                                        <path d="M37.5396067,9.52112676 C33.4542563,9.52112676 28.2517062,14.0492182 24.5790503,19.6417324 C24.0851168,20.3931271 23.2577781,25.6338028 37.5396067,25.6338028 C48.1487794,25.6338028 51.9013746,22.6924839 49.1100001,18.742731 C46.2874298,14.7484415 42.7376074,9.52112676 37.5396067,9.52112676" id="Fill-1" fill="#448BC6"></path>
                                        <path d="M40.4788732,3.66197183 C40.4788732,1.63940992 38.8382778,3.10862447e-15 36.8172351,3.10862447e-15 C34.7935226,3.10862447e-15 33.1549296,1.63940992 33.1549296,3.66197183 C33.1549296,5.68453374 34.7935226,7.32394366 36.8172351,7.32394366 C38.8382778,7.32394366 40.4788732,5.68453374 40.4788732,3.66197183" id="Fill-3" fill="#448BC6"></path>
                                        <path d="M9.39438725,6.4875509 C10.0022322,7.00220279 10.7697652,7.32394366 11.6164984,7.32394366 C12.4078559,7.32394366 13.1309596,7.04425606 13.7201313,6.58834524 C15.3543585,6.8713704 17.2590252,6.51358387 16.7657951,6.38608905 C16.2468089,6.2519191 15.6795298,4.84613844 15.1251289,3.41298979 C15.0684654,2.56524932 14.7413624,1.79961284 14.2223761,1.20752954 C13.5758969,0.471263601 12.6525392,3.10862447e-15 11.6164984,3.10862447e-15 C10.7021554,3.10862447e-15 9.87602711,0.369801749 9.24950895,0.96055003 L9.24628944,0.958547493 C9.24435773,0.96055003 9.24242602,0.963887591 9.24242602,0.965890127 C8.62556641,1.54996329 8.21926327,2.35364795 8.12332164,3.26146452 C7.31007145,4.76002937 6.35645029,6.2519191 5.91859588,6.38608905 C5.46078045,6.5262666 7.74599416,6.94079167 9.39438725,6.4875509" id="Fill-5" fill="#BE206B"></path>
                                        <path d="M21.6259713,18.4436516 C18.8693535,14.4493353 16.248536,11.8522025 15.8500194,11.4526436 C15.5796881,11.1816053 13.6448521,9.43003584 11.3521127,9.52483564 C9.05937326,9.43003584 7.12453725,11.1816053 6.85357137,11.4526436 C6.45568939,11.8522025 3.83487184,14.4493353 1.07825406,18.4436516 C-1.64663469,22.3927949 0.503958689,25.6338028 10.8628511,25.6338028 C10.9415391,25.6338028 11.2746939,25.6338028 11.3521127,25.6338028 C11.4295315,25.6338028 11.7626863,25.6338028 11.8413743,25.6338028 C22.2002667,25.6338028 24.35086,22.3927949 21.6259713,18.4436516" id="Fill-7" fill="#BE206B"></path>
                                    </g>
                                    <circle id="Oval" fill="#BE206B" cx="74.5" cy="15.5" r="14.5"></circle>
                                    <text id="18" font-family="ProductSans-Black, Product Sans Black" font-size="15" font-weight="800" letter-spacing="-0.338498824" fill="#FFFFFF">
                                        <tspan x="63.5684988" y="20">18</tspan>
                                    </text>
                                </g>
                                <text id="+" font-family="ProductSans-Black, Product Sans Black" font-size="14" font-weight="800" letter-spacing="0.095832625" fill="#FFFFFF">
                                    <tspan x="78.9060837" y="19">+</tspan>
                                </text>
                            </g>
                        </g>
                    </svg>
                    <h5 class="mt-4">
                        <b>Please read the following warning before continuing</b>
                    </h5>
                    <p class="r3 px-md-5 px-sm-1">
                        <b>I am over 18 years old</b> and I accept the viewing of explicit texts and images intended for an <b>adult audience</b>. <br>
                    </p>
                    <hr class="my-1">
                    <span>I have read and accept the <br>
                        <a data-href="/terms-and-conditions/">Terms and Conditions</a>
                    </span>
                    <p></p>
                    <div class="text-center mb-3">
                        <button class="btn btn-primary w-50 rounded-pill b1">Accept</button>
                    </div>
                    <a data-href="/" data-dismiss="modal" class="text-center">Decline</a>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="container">
            <footer class="page-footer font-small white pt-4">
                <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col">
                            <p class="pt-md-1 pl-md-1"></p>
                            <hr>
                            <p class="pt-md-2 pl-md-1"></p>
                            <a data-href="/terms-and-conditions/">
                                <span>Terms and conditions</span>
                            </a>
                            <a data-href="/privacy-policy/">
                                <span>Privacy policy</span>
                            </a>
                            <a data-href="/contact-us/">
                                <span>Contact us</span>
                            </a>
                            <a style="display: none;">
                                <span>Manage your ads</span>
                            </a>
                            <a data-href="/promote-your-ads/">
                                <span>Promote your ads</span>
                            </a>


                        </div>
                    </div>
                    <p class="pt-md-1 pl-md-1"></p>
                    <div class="row">
                        <div class="col-sm">
                            <p class="social">Follow us:</p>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.youtube.com/" class="btn-floating btn-sm btn-yt mx-1">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.instagram.com/" class="btn-floating btn-sm btn-ins mx-1">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="" class="btn-floating btn-sm bg-dark mx-1">
                                        <i class="icon-twitter-x"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.tiktok.com/" class="btn-floating btn-sm bg-dark mx-1">
                                        <i class="fab fa-tiktok text-light"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.facebook.com/" class="btn-floating btn-sm btn-fb mx-1">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="rta"></div>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
        <div id="lightbox-block" tabindex="-1" data-backdrop="static" class="modal" style="display: none;">
            <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">WARNING</h5>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div class="d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">This ad was prevented from insertion due to violations of <a data-href="/terms-and-conditions/">Terms and conditions</a>. <br>For more information send an email to: <a href="mailto:support@Adult Dating.in">support@Adult Dating.in</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            $(".open-menu-icon").on("click", function() {
                $(".main-nav-outer").addClass("open-menu");
                $(".main-nav-aside").addClass("open");
            });
            $(".main-nav-aside").on("click", function() {
                $(".main-nav-outer").removeClass("open-menu");
                $(".main-nav-aside").removeClass("open");
            });
            $(".close-menu-icon").on("click", function() {
                $(".main-nav-outer").removeClass("open-menu");
            });
        })
    </script>
    <script src="{{asset('js/bundle.js')}}" defer=""></script>
    <script src="{{asset('js/vendors~chunk-pica.48c160a010746ad5f05b.js')}}" defer=""></script>
    <script src="{{asset('js/chunck-signup-form.96dda844e6d6b7cae628.js')}}" defer=""></script>
</body>

</html>
