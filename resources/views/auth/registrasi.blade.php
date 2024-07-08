<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html class="h-auto" lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <link rel="shortcut icon" href="logo.png" />
    <title>{{ config('app.name') }} | Registrasi</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Si Peka (Sistem Informasi Pengetesan Kemiskinan) Adalah Wadah Perencanaan, Monitoring Pelakasanaan dan Evaluasi Kinerja Program Pengetesan Kemiskinan Terintegrasi Dengan Konsep Kolaborasi Program dan Anggaran." />
    <meta name="keywords" content="Kemiskinan, perencanaan,monitoring, evaluasi" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body"
    class="app-blank app-blank bgi-size-cover bgi-position-bottom bgi-no-repeat">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('/bg.jpg');
            }

            [data-theme="dark"] body {
                background-image: url('/bg.jpg');
            }
        </style>
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Body-->
            <div class="py-20 shadow-lg my-20 w-75 mx-20"
                style="background: rgb(110 101 101 / 80%); padding: 50px; border-radius: 10px;">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ route('registrasi.registrasi-proses') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="fw-bolder mb-3 text-white">REGISTER</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Masukkan nama anda" name="name" autocomplete="off"
                            class="form-control" />
                        @error('name')
                            <small class="error text-danger">{{ $message }}</small>
                        @enderror
                        <!--end::Email-->
                    </div>

                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Masukkan username" name="username" autocomplete="off"
                            class="form-control" />
                        @error('username')
                            <small class="error text-danger">{{ $message }}</small>
                        @enderror
                        <!--end::Email-->
                    </div>

                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="email" placeholder="Masukkan email" name="email" autocomplete="off"
                            class="form-control" />
                        @error('email')
                            <small class="error text-danger">{{ $message }}</small>
                        @enderror
                        <!--end::Email-->
                    </div>

                    <div class="fv-row mb-3">
                        <div class="bg-white p-3 mt-5 rounded-2 mb-3">
                            Silahkan lakukan pembayaran di rekening <strong>BRI</strong> di bawah <strong>A.N Harfina
                                Perbrianti Hafid</strong>, dan
                            lampirkan buktinya pada inputan file di bawah. <br> <strong>Setelah melakukan registrasi
                                tunggu dalam 1x24 jam dan admin akan mengirimkan password untuk login di email yang anda
                                inputkan di
                                atas.</strong>
                        </div>
                        <!--begin::Input group-->
                        <div class="input-group">
                            <!--begin::Input-->
                            <input id="kt_clipboard_1" type="text" class="form-control" placeholder="022501027586530"
                                readonly value="022501027586530" />
                            <!--end::Input-->

                            <!--begin::Button-->
                            <button class="btn btn-light-primary" data-clipboard-target="#kt_clipboard_1">
                                Copy
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--begin::Input group-->
                    </div>

                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input class="form-control" placeholder="Lampirkan bukti" accept="image/*" type="file"
                            name="foto">
                        @error('foto')
                            <small class="error text-danger">{{ $message }}</small>
                        @enderror
                        <!--end::Email-->
                    </div>

                    <!--begin::Submit button-->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Sign Up</span>
                            <!--end::Indicator label-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                </form>
                <!--end::Form-->
            </div>
            <!--begin::Aside-->
            <div class="d-flex flex-center w-100 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-column bg-white p-3 rounded">
                    <!--begin::Logo-->
                    <img alt="Logo" style="width: 270px" src="logo.png" />
                    <!--end::Logo-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--end::Body-->
        </div>
    </div>
    <!--end::Authentication - Sign-in-->
    <script>
        var hostUrl = "admin/assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script><!--begin::Custom Javascript(used by this page)-->
    <!--end::Custom Javascript-->
    @if ($message = Session::get('failed'))
        <script>
            swal.fire({
                title: "Eror",
                text: "{{ $message }}",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            swal.fire({
                title: "Sukses",
                text: "{{ $message }}",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    <script>
        // Select elements
        const target = document.getElementById('kt_clipboard_1');
        const button = document.querySelector('button[data-clipboard-target="#kt_clipboard_1"]');

        // Init clipboard -- for more info, please read the official documentation: https://clipboardjs.com/
        var clipboard = new ClipboardJS(button);

        // Success action handler
        clipboard.on('success', function(e) {
            const currentLabel = button.innerHTML;

            // Exit label update when already in progress
            if (button.innerHTML === 'Copied!') {
                return;
            }

            // Update button label
            button.innerHTML = 'Copied!';

            // Revert button label after 3 seconds
            setTimeout(function() {
                button.innerHTML = currentLabel;
            }, 3000);
        });

        // Prevent form submission or other default action
        button.addEventListener('click', function(event) {
            event.preventDefault();
        });
    </script>

</body>
<!--end::Body-->

</html>
