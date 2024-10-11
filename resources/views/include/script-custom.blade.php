<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            center: true,
            items:1,
            loop:true,
            margin:10,
            nav:true,
            navText : ['<i class="fa fa-caret-left" aria-hidden="true"></i>','<i class="fa fa-caret-right" aria-hidden="true"></i>']
        });
    });
    new DataTable('#example', {
        layout: {
            bottomEnd: {
                paging: {
                    type: 'simple'
                }
            }
        },
        language: {
            paginate: {
                previous: '<i class="fa fa-chevron-left" style="font-size:10px"></i> Sebelumnya',
                next: 'Selanjutnya <i class="fa fa-chevron-right" style="font-size:10px"></i>'
            }
        },
    });
</script>