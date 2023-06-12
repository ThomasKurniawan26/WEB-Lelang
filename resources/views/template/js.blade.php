<script>
     function confirmLogout() {
            Swal.fire({
                icon: 'question',
                title: 'Apakah anda yakin?',
                text: 'Anda yakin ingin logout ?',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Logout Saja.',
                customClass: {
                    cancelButton: 'bg-primary',
                    confirmButton: 'bg-danger'
                }

            }).then( function(e) {
                if(e.isConfirmed) {
                    location.href = `{{ url('administrator/logout') }}`;
                }
            });
        }
     function confirmLogoutMasyarakat() {
            Swal.fire({
                icon: 'question',
                title: 'Apakah anda yakin?',
                text: 'Anda yakin ingin logout ',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Logout Saja.',
                customClass: {
                    cancelButton: 'bg-primary',
                    confirmButton: 'bg-danger'
                }

            }).then( function(e) {
                if(e.isConfirmed) {
                    location.href = `{{ url('/logout') }}`;
                }
            });
        }
        function coreDeleteData(url){
            Swal.fire({
                icon: 'question',
                title: 'Apakah anda yakin Ingin Hapus ?',
                text: 'Data yang telah dihapus tidak dapat dipulihkan kembali.',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Hapus.',
                customClass: {
                    cancelButton: 'bg-primary',
                    confirmButton: 'bg-danger'
                }
            }).then(function(e){
                if(e.isConfirmed){
                    location.href = url;     
                }
            });
        }
        function alertAkses(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan Masuk Terlebih Dahulu',                
            });
        }
        function belumDibuka(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lelang Belum Dibuka Coba lagi Nanti',                
            });
        }
</script>