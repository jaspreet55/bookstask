 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                jQuery('.append-img').css('display','block');
                jQuery('#preview-img').find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    jQuery("#cat_image").change(function(){
        readURL(this);
    });

// <--------- for edit----

 function readimageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {

                jQuery('.append-img-edit').append('<div class="offset-3 col-md-9 appended-div">'
                    +'<div id="preview-img-edit" class="preview-img-edit">'
                    +'<img src="'+ e.target.result+'" width="120">'
                    +'<div class="overlay">'
                    +'<a href="javascript:void(0)" class="category_delete_image" data-id=""><i class="fa fa-trash fa-2x icon "></i></a>'
                    +'</div></div></div>');
                // jQuery('#preview-img-edit').find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    jQuery("#edit_cat_image").change(function(){
        readimageURL(this);
    });

jQuery(document).on('click','.category_delete_image',function(e){
   jQuery(this).parents('.appended-div').remove();
   jQuery('#edit_cat_image').val('');
});

     jQuery(document).on('click','.category_delete_image',function(e){
        e.preventDefault();
        var id =        jQuery(this).attr('data-id');
        console.log(id);
        e.preventDefault();
        if(id != '')
        {
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
              console.log(isConfirm);
              if (Object.keys(isConfirm)[0] == "dismiss") {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
              } else {
                  jQuery.ajax({
                      type: 'get',
                      url: '/admin/categoryattach/delete',
                      data: {
                          'id': id
                      },
                       success: function (data) {
                      
                            if(data.status ==true)
                            {
                              swal("Done!","It was succesfully deleted!","success");    
                              jQuery(this).parent('div').parent('.preview-img-edit').remove();
                              window.location.reload();
                            }
                        }
                  });   
              } 
            })  
            
        }else{
            jQuery(this).parent('div').parent('.preview-img-edit').remove();
        }
    });