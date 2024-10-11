<script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>

{{-- <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}

<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>

<!-- Custom js for this page-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
{{-- <script src="{{ asset('admin/js/data-table.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script> --}}
<script src="{{ asset('admin/js/dataTables.min.js') }}"></script>
{{-- <script src="{{ asset('admin/js/dataTables.min.js') }}"></script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function updateProgressBar(stage) {
            const stages = document.querySelectorAll('.stage');
            const progressBar = document.querySelector('.progress-bar');
            const totalStages = stages.length;
            const activeStages = Array.from(stages).filter((s, index) => index < stage);
            const progressWidth = (activeStages.length / totalStages) * 100;
            
            stages.forEach((s, index) => {
                if (index < stage) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
            
            progressBar.style.width = progressWidth + '%';
        }

        // Example usage: Change the stage dynamically
        let currentStage = 0;
        setInterval(() => {
            currentStage = (currentStage + 1) % 6; // Loop through stages 0 to 5
            updateProgressBar(currentStage);
        }, 3000); // Change stage every 3 seconds for demo
    });
</script>

<script>
    function updateStatus(status, id) {
        axios.put(/admin/status-layanan-informasi/update/${id}, {
            status: status
        })
        .then(response => {
            // Handle success if needed
            console.log(response.data);
        })
        .catch(error => {
            // Handle error if needed
            console.error(error);
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>

<script>
    function confirmStatusChange(newStatus) {
        if (confirm(Apakah Anda yakin ingin mengubah status menjadi ${newStatus}?)) {
            document.getElementById('updateStatusForm').status.value = newStatus;
            document.getElementById('updateStatusForm').submit();
        }
    }
</script>

<script>
    function confirmDelete(id) {
    if (confirm('Anda yakin ingin menghapus data ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}

</script>