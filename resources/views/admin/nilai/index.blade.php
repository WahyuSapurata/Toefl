@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5 table-responsive">
                                <table id="kt_table_data"
                                    class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300">
                                    <thead class="text-center">
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Nilai Per Kategori</th>
                                            <th>Jumlah Point</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(document).on('click', '.button-update', function(e) {
            e.preventDefault();
            let url = '/admin/show-kategori/' + $(this).attr('data-uuid');
            control.overlay_form('Update', 'Kategori Soal', url);
        })

        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        })

        const initDatatable = async () => {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            // Initialize DataTable
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: '/admin/get-nilai',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'name',
                        className: 'text-center',
                    }, {
                        data: 'email',
                        className: 'text-center',
                    }, {
                        data: 'total_poin_per_kategori',
                        render: function(data, type, row, meta) {
                            let jawaban = '<ul>';
                            $.each(data, function(x, y) {
                                jawaban += `<li>${y.kategori} Poin = ${y.total_poin}</li>`;
                            });
                            jawaban += '</ul>';
                            return jawaban;
                        }
                    }, {
                        data: 'total_poin',
                        className: 'text-center',
                    },
                    // {
                    //     data: 'uuid',
                    // }
                ],
                // columnDefs: [{
                //     targets: -1,
                //     title: 'Aksi',
                //     width: '8rem',
                //     className: 'text-center',
                //     orderable: false,
                //     render: function(data, type, full, meta) {
                //         return `
            //             <a href="javascript:;" type="button" data-uuid="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-primary button-update btn-icon btn-sm">
            //                 <img src="{{ url('admin/assets/media/icons/aside/suratdef.svg') }}"
            //                             alt="">
            //             </a>
            //         `;
                //     },
                // }],
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.context[0]._iDisplayStart;
                    var rowIndex = startIndex + index + 1;
                    $('td', row).eq(0).html(rowIndex);
                },
            });
        };

        $(function() {
            initDatatable();
        });
    </script>
@endsection
