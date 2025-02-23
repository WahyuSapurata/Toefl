@extends('layouts-user.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    @php
                        $allQuizzesDone = true;
                        foreach ($data as $item) {
                            if ($item->kuis == false) {
                                $allQuizzesDone = false;
                                break;
                            }
                        }
                    @endphp

                    @if (!$allQuizzesDone)
                        @php
                            $hasQuiz = false;
                            foreach ($data as $item) {
                                if ($item->kuis == true) {
                                    $hasQuiz = true;
                                    break;
                                }
                            }
                        @endphp

                        @if ($hasQuiz)
                            <div class="fs-1 text-center text-capitalize">Pilih soal selanjutnya untuk dikerjakan</div>
                        @else
                            <div class="fs-1 text-center text-capitalize">Harap pilih jenis soal di bawah untuk dikerjakan
                            </div>
                        @endif
                        <div class="d-flex gap-5 mt-5 justify-content-center">
                            @foreach ($data as $item)
                                <a href="{{ route('user.detail-soal', ['params' => $item->uuid]) }}"
                                    class="btn btn-primary {{ $item->kuis == true ? 'disabled' : '' }}">{{ $item->kategori }}</a>
                            @endforeach
                        </div>
                    @else
                        <div class="d-flex gap-5 justify-content-center">
                            @php
                                $tolaSemuaKategori = 0;
                                foreach ($combined as $data_kategori) {
                                    $tolaSemuaKategori += $data_kategori->total_poin;
                                }
                            @endphp
                            @foreach ($combined as $item_kategori)
                                <div class="card">
                                    {{ $item_kategori->kategori }} <div class="fw-bolder text-center">
                                        Point {{ $item_kategori->total_poin }}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="fs-5 fw-bolder text-center mt-5">Total Keseluruhan Point : {{ $tolaSemuaKategori }}
                        </div>
                        <!--begin::Alert-->
                        <div class="alert alert-success d-flex align-items-center p-5 mt-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-success me-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Catatan</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="fs-6">Harap konfirmasi melalui whatsapp berikut untuk sertifikatnya. <a
                                        href="https://web.whatsapp.com/send?phone=082349412268&text=Halo min, Saya ingin konfirmasi hasil tofl saya atas nama {{ auth()->user()->name }}."
                                        target="_blank" class="btn btn-outline-success d-flex align-items-center gap-2">
                                        <img class="w-35px" src="{{ asset('logo_wa.png') }}" alt="WhatsApp Logo">
                                        <div>Contact Us</div>
                                    </a></div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->
                    @endif
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
