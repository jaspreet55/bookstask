jQuery(function(){
	
	if(window.success){
		swal("Success", window.success, "success")
	}
	

});

// swal for delete 

jQuery( document ).on('click','confirm_delete',function( event ) {
	event.preventDefault();
	$link = jQuery(this);
	Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				window.location.href = $link.attr('href');
		  }
		  
		})
		
	});
	jQuery(document).on('click','#confirm_delete_book',function(e){
        // e.preventDefault();
        var id = jQuery(this).attr('data-id');
        var token = jQuery(this).attr('data-token');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
         })
        .then(function(isConfirm){
          console.log('isconfirm',isConfirm);
          if (Object.keys(isConfirm)[0] == "dismiss") {
             swal("Cancelled", "Your imaginary file is safe :)", "error");
          } else {
              jQuery.ajax({
                
                url: "/admin/book/delete/"+id,
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (response)
                {
                  if(response.status == true)
                   {
                    $('#book_id_'+id).remove();
                      Swal.fire(
                        'Deleted!',
                        response.message,
                        'success'
                      )    
                   }
                  }
              });
              }
        });
    });
