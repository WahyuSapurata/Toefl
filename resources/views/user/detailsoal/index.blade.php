@extends('layouts-user.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <!--begin::Alert-->
            <div class="alert alert-warning d-flex align-items-center" style="margin: 0; padding: 0 5px 0 0;">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-warning me-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <h4 class="mb-1 text-dark" id="countdown"></h4>
                    <!--end::Title-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Alert-->
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if ($kategori->kategori == 'LISTENING COMPREHENSION')
                        <div>
                            <div class="fw-bolder fs-5">Play the following audio to answer questions number 1 to 18</div>
                            <style>
                                .audio-controls {
                                    display: flex;
                                    justify-content: center;
                                    margin-top: 20px;
                                }

                                .audio-controls button {
                                    margin: 0 10px;
                                }
                            </style>
                            <audio id="audio" style="display: none;">
                                <source src="{{ asset('soal_listening.mpeg') }}" type="audio/mp3">
                            </audio>
                            <div class="audio-controls">
                                <button id="playButton" class="btn btn-success">Play</button>
                                <button id="pauseButton" class="btn btn-danger">Pause</button>
                                <button id="restartButton" class="btn btn-warning">Restart</button>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('playButton').addEventListener('click', function() {
                                        document.getElementById('audio').play();
                                    });

                                    document.getElementById('pauseButton').addEventListener('click', function() {
                                        document.getElementById('audio').pause();
                                    });

                                    document.getElementById('restartButton').addEventListener('click', function() {
                                        const audio = document.getElementById('audio');
                                        audio.currentTime = 0;
                                        audio.play();
                                    });
                                });
                            </script>
                        </div>
                    @endif

                    <div>
                        <form action="{{ route('user.store-jawaban') }}" method="POST">
                            @csrf
                            <ol type="1">
                                @php
                                    $previousDescription = null;
                                @endphp
                                @foreach ($data as $soal)
                                    @if ($soal->deskripsi_soal !== $previousDescription)
                                        <div class="border border-dark p-3">{{ $soal->deskripsi_soal }}</div>
                                        @php
                                            $previousDescription = $soal->deskripsi_soal;
                                        @endphp
                                    @endif
                                    <li>
                                        {{ $soal->soal }}
                                        <ol type="A" class="d-grid gap-3 mt-3">
                                            @foreach ($soal->jawaban as $option)
                                                <li>
                                                    <div class="form-check">
                                                        <input type="hidden"
                                                            name="soal[{{ $soal->uuid }}][uuid_kategori]"
                                                            value="{{ $kategori->uuid }}">
                                                        <input type="hidden" name="soal[{{ $soal->uuid }}][uuid_soal]"
                                                            value="{{ $soal->uuid }}">
                                                        <input class="form-check-input" type="radio"
                                                            name="soal[{{ $soal->uuid }}][jawaban]"
                                                            id="jawaban_{{ $soal->id }}_{{ $loop->index }}"
                                                            value="{{ $option }}"
                                                            @if (old('soal.' . $soal->uuid . '.jawaban') == $option) checked @endif>
                                                        <label class="form-check-label"
                                                            for="jawaban_{{ $soal->id }}_{{ $loop->index }}">
                                                            {{ $option }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>
                            <div class="d-flex justify-content-center mt-10">
                                <button class="btn btn-primary" id="button">Submit Jawaban</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Set the countdown time (in minutes)
            var countdownTime = {{ $kategori->waktu }} * 60; // Convert to seconds

            // Function to update the countdown
            function updateCountdown() {
                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;

                // Add leading zero to seconds if needed
                seconds = seconds < 10 ? '0' + seconds : seconds;

                // Display the result
                document.getElementById('countdown').textContent = "Remaining time: " + minutes + ":" + seconds;

                // If the countdown is finished, perform an action
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    document.getElementById('countdown').textContent = "Time's up!";
                    // Perform any action when the countdown finishes
                    // For example: alert('Time is up!');
                    $('#button').click(); // Simulate button click
                } else {
                    countdownTime--;
                }
            }

            // Update the countdown every 1 second
            var countdownInterval = setInterval(updateCountdown, 1000);

            // Initial call to display the countdown immediately
            updateCountdown();
        });
    </script>
@endsection
