<script>
    /**
         * Check all the permissions
         */
        /* Edit customer */
        $('body').on('click', '.btn-show', function() {
            var data_id = $(this).data('id');
            $.get('roles/' + data_id, function (data) {
                $('#showmodal').find('.modal-body').html(data)
                $('#tombol-simpana').val("edit-post");
                $('#showmodal').modal('show')
            })
        });

        //Warning Message
        function deleteRow(id)
        {
                swal({   
                    title: "Apakah anda yakin ingin menghapus ?",   
                    text: "Role akan dihapus selamanya !",   
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
                        swal('Delete Role Dibatalkan !','','warning');
                    }
                    else{
                        console.log('cancel');
                        swal('Delete Role Dibatalkan !','','warning');
                    }
                }) 

            
        }


        $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });

         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');

            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }

         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);

            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }

         function implementAllChecked() {
             const countPermissions = {{ count($all_permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};

            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);

             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
         }


</script>