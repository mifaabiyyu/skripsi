<script>
    /**
         * Check all the permissions
         */
         $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
         
        
        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#modalcreate').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val('');
            $('#form-create-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Create Roles"); //valuenya tambah pegawai baru
            $('#createmodal').modal('show'); //modal tampil
        });

        /* Edit customer */
        $('body').on('click', '.btn-edit', function() {
            var data_id = $(this).data('id');
            $.get('users/' + data_id + '/edit', function (data) {
                $('#editmodal').find('.modal-body').html(data)
                $('#tombol-simpana').val("edit-post");
                $('#editmodal').modal('show')
            })
        });

        //Warning Message
        function deleteRow(id)
        {
                swal({   
                    title: "Apakah anda yakin ingin menghapus ?",   
                    text: "User akan dihapus selamanya !",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Cancel !",   
                    closeOnConfirm: false,
                    closeOnCancel: false  
                }) .then((res) => {
                    if (res.value) {
                        $('#data-'+id).submit();
                    }
                    else if( res.dismiss == 'cancel') {
                        console.log('cancel');
                        swal('Delete User Dibatalkan !','','warning');
                    }
                    else{
                        console.log('cancel');
                        swal('Delete User Dibatalkan !','','warning');
                    }
                }) 

            
        }


</script>