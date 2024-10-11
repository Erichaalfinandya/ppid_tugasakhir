{{-- javascript home --}}

 <!-- JavaScript Libraries -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('lib/easing/easing.min.js')}}"></script>
 <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
 <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
 <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
 <link rel="stylesheet" href="/css/style.css">
 

 <!-- Template Javascript -->
 <script src="{{asset('js/main.js')}}"></script>

 <script>
    // Function untuk mengatur perilaku checkbox
    function handleCheckbox(currentCheckbox) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== currentCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>

<script>
    function updateForm() {
        const category = document.getElementById('kategoripermohonan').value;
        
        // // Tampilkan input nama yang sesuai dengan kategori yang dipilih
        // document.getElementById('namaInput').style.display = 'block'; // Tampilkan input nama secara default

         // Tampilkan atau sembunyikan elemen uploadsurat berdasarkan kategori yang dipilih
         const uploadsuratDiv = document.getElementById('uploadsuratDiv');
        const uploadsuratInput = document.getElementById('uploadsuratInput');
        
        if (category === 'Perorangan') {
            uploadsuratDiv.style.display = 'none'; // Sembunyikan uploadsurat jika kategori Perorangan dipilih
            uploadsuratInput.removeAttribute('required'); // Hapus atribut required
        } else {
            uploadsuratDiv.style.display = 'block'; // Tampilkan uploadsurat untuk kategori Lembaga/organisasi dan Kelompok Orang
            uploadsuratInput.setAttribute('required', 'required'); // Tambahkan atribut required
        }

        // Tampilkan label nama yang sesuai dengan kategori yang dipilih
        if (category === 'Perorangan') {
                document.getElementById('namaLabel').innerText = 'Nama Lengkap';
            } else if (category === 'Lembaga/organisasi') {
                document.getElementById('namaLabel').innerText = 'Nama Lembaga/Organisasi';
            } else if (category === 'Kelompok Orang') {
                document.getElementById('namaLabel').innerText = 'Nama Kelompok Orang';
            }

        // Tampilkan label dan input untuk NIK yang sesuai dengan kategori yang dipilih
        if (category === 'Perorangan') {
                document.getElementById('nikLabel').innerText = 'NIK/No.Identitas Pribadi';
            } else if (category === 'Lembaga/organisasi') {
                document.getElementById('nikLabel').innerText = 'NIK/No.Identitas Pimpinan';
            } else if (category === 'Kelompok Orang') {
                document.getElementById('nikLabel').innerText = 'NIK/No.Identitas Pemberi Kuasa';
            }

            // Tampilkan label dan input untuk KTP yang sesuai dengan kategori yang dipilih
        if (category === 'Perorangan') {
                document.getElementById('ktpLabel').innerText = 'Upload KTP Pribadi';
            } else if (category === 'Lembaga/organisasi') {
                document.getElementById('ktpLabel').innerText = 'Upload KTP Pimpinan';
            } else if (category === 'Kelompok Orang') {
                document.getElementById('ktpLabel').innerText = 'Upload KTP Pemberi Kuasa';
            }

             // Tampilkan label dan input untuk UPLOAD SURAT yang sesuai dengan kategori yang dipilih
        if (category === 'Lembaga/organisasi') {
                document.getElementById('uploadsuratLabel').innerText = 'Upload Akta Notaris Lembaga/Organisasi';
            } else if (category === 'Kelompok Orang') {
                document.getElementById('uploadsuratLabel').innerText = 'Upload Surat Kuasa';
            }
    }

    // Jalankan updateForm saat halaman pertama kali dimuat untuk menyesuaikan tampilan awal form
    window.onload = updateForm;

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('kategoripermohonan').addEventListener('change', updateForm);
        updateNameInput(); // Call it initially to set the correct field on page load
    });
</script>

<script>
    function previewFile() {
        const preview = document.getElementById('file_image_ktp');
        const file = document.getElementById('file_upload_ktp').files[0];
        const reader = new FileReader();

        reader.addEventListener('load', function () {
            // Convert file to base64 string and show it in the img element
            preview.src = reader.result;
            preview.classList.remove('hidden');
            document.getElementById('start_ktp').classList.add('hidden');
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var serviceContentInners = document.querySelectorAll('.servicee-content-inner');
        var maxHeight = 0;

        // Hitung tinggi maksimum dari semua kotak
        serviceContentInners.forEach(function(element) {
            var elementHeight = element.offsetHeight;
            if (elementHeight > maxHeight) {
                maxHeight = elementHeight;
            }
        });

        // Tetapkan tinggi maksimum ke semua kotak
        serviceContentInners.forEach(function(element) {
            element.style.height = maxHeight + 'px';
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var serviceContentInners = document.querySelectorAll('.service-content-inner');
    var maxHeight = 0;

    // Hitung tinggi maksimum dari semua kotak
    serviceContentInners.forEach(function(element) {
        var elementHeight = element.offsetHeight;
        if (elementHeight > maxHeight) {
            maxHeight = elementHeight;
        }
    });

    // Tetapkan tinggi maksimum ke semua kotak
    serviceContentInners.forEach(function(element) {
        element.style.height = maxHeight + 'px';
    });
    });
</script>

<script src="https://code.responsivevoice.org/responsivevoice.js?key=ZSlAAzzB"></script>
<script>(function(d){var s = d.createElement("script");s.setAttribute("data-acount", "c8POIHujG9");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enable for purposes of <a href="https://userway.org">website accessibility</a></noscript>

<script>
    // Tambahkan JavaScript untuk smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const floatingBtn = document.querySelector('.floating-btn');
    const floatingMenu = document.querySelector('.floating-menu');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Toggle menu visibility
    floatingBtn.addEventListener('click', function () {
        floatingMenu.style.display = floatingMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    // Scroll to top functionality
    scrollTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        floatingMenu.style.display = 'none';
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (e) {
        if (!floatingBtn.contains(e.target) && !floatingMenu.contains(e.target)) {
            floatingMenu.style.display = 'none';
        }
    });
});
</script>