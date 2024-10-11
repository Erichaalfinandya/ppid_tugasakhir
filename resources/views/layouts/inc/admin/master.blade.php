<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.inc.admin.style')
    @stack('style')
    <style>
        /* Menambahkan padding pada dropdown "Show entries" */
        .dataTables_length select {
            padding: 10px 16px;
        }
        .dataTables_wrapper .dataTable tbody tr td{
            white-space: normal;
            line-height: 1.5;
            padding: 0.5rem 0.5rem;
        }
        .dataTables_wrapper .dataTable thead tr th{
            white-space: normal;
            line-height: 1.15;
        }
    </style>
</head>

<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
    @include('layouts.inc.admin.script')
    @stack('scripts')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const selectedInformasi = jenis_info_id => {
                axios.post('{{ route('informasi.select') }}', {
                        id: jenis_info_id
                    })
                    .then(function(response) {
                        $('#selectRJI').empty();
                        $('#selectRJI').append(new Option('-- Silahkan Pilih --', ''))
                        $.each(response.data, function(id, name) {
                            $('#selectRJI').append(new Option(name, id))
                        })
                    });
            }

            $('#selectJenisInfo').on('change', function() {
                selectedInformasi($(this).val());
                const selectedValue = $(this).val();
                if (selectedValue == 1 || selectedValue == 2) {
                    $('#rincian_ji').show(); // Show the input field
                } else {
                    $('#rincian_ji').hide(); // Hide the input field
                }
            });

            // Initially hide the input field
            $('#rincian_ji').hide();
        })
    </script>
    @stack('dependent-dropdown')

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable({
                "scrollX": true,
                "columnDefs": [{
                        "width": "10px",
                        "targets": [0]
                    }, {
                        "width": "250px",
                        "targets": [1]
                    }, {
                        "width": "300px",
                        "targets": [2]
                    }, {
                        "width": "200px",
                        "targets": [3]
                    }, {
                        "width": "150px",
                        "targets": [6]
                    }, {
                        "width": "200px",
                        "targets": [8]
                    },
                ]
            });

            $('#data-tables2').DataTable();
        });
    </script>
</body>

</html>
