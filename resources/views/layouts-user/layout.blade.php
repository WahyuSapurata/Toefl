@php
    $path = explode('/', Request::path());
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title> {{ config('app.name') . ' | ' . $module }} </title>
    <meta name="description"
        content="Si Peka (Sistem Informasi Pengetesan Kemiskinan) Adalah Wadah Perencanaan, Monitoring Pelakasanaan dan Evaluasi Kinerja Program Pengetesan Kemiskinan Terintegrasi Dengan Konsep Kolaborasi Program dan Anggaran." />
    <meta name="keywords" content="Kemiskinan, perencanaan,monitoring, evaluasi" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    @yield('style')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('layouts-user.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->


                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                            </div>
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @yield('button')
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->

                    @yield('content')

                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('layouts-user.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->



    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>


    @yield('side-form')

    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/rowDataTable.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/panel.js') }}"></script>
    <!-- Contoh dengan menggunakan CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Include Moment.js dan library lokal bahasa Indonesia -->
    {{-- <script src="https://cdn.jsdelivr.net/momentjs/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.29.1/locale/id.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    {{-- <script src="resources/js/face-api.js"></script> --}}
    {{-- <script src="{{ asset('js/face-api.js') }}"></script> --}}

    <script>
        // let control = new Control('/logout','');
        $(document).on('click', '#sign-out', function(e) {
            var form = $(this).closest("form");
            e.preventDefault()
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda akan keluar dari dashboard!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#354C9F',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        })

        // $(document).on('click', '#kt_aside_toggle', function(e) {
        //     // Periksa apakah elemen .full-logo memiliki kelas d-none
        //     if ($('.full-logo').hasClass('d-none')) {
        //         // Jika iya, hapus kelas d-none dari .full-logo
        //         $('.full-logo').removeClass('d-none');
        //         // Dan tambahkan kelas d-none ke .small-logo
        //         $('.small-logo').addClass('d-none');
        //     } else {
        //         // Jika tidak, tambahkan kelas d-none ke .full-logo
        //         $('.full-logo').addClass('d-none');
        //         // Dan hapus kelas d-none dari .small-logo
        //         $('.small-logo').removeClass('d-none');
        //     }
        // });
    </script>

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
    @yield('script')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
