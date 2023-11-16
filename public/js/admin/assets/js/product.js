var count ='';
    jQuery("#prod_image").change(function(e){

        // jQuery.each(e.target.files, function(index, value){
        //     //Add your condition for allowing only specific file
        //     var fileReader = new FileReader(); 

        //     fileReader.readAsDataURL(value);
           
        //     fileArray.push(fileReader);
        // });
        jQuery('.appended-div').html('');
        readimageURL(this);
    });
     function readimageURL(input) {
               
        count = document.getElementById("prod_image").files.length;
            console.log('count',count);   
        if (count > 0 ) {
            
            var total_file = document.getElementById("prod_image").files.length;

             for(var i=0;i<total_file;i++)
            {      
                    jQuery('.append-img-edit').css('display','block');
                    jQuery('.append-img-edit').find('.appended-div').append('<div id="preview_img_'+i+'" class="preview-img-edit">'
                        +'<img src="'+URL.createObjectURL(event.target.files[i])+'" width="120">'
                        +'</div>');
            }
        }else{
             jQuery('.append-img-edit').css('display','block');
            //   jQuery('.append-img-edit').find('.appended-div').html('Three files are allowed').css("color", "red");
        }
    }
    // for edit product
    	var fcount = 0;
    	var fileArray =[];
    	var fileindex = '';
      jQuery("#edit_prod_image").change(function(e){
      	 jQuery.each(e.target.files, function(index, value){
            //Add your condition for allowing only specific file
            var fileReader = new FileReader(); 

            fileReader.readAsDataURL(value);
           
            fileArray.push(fileReader);
        });
        readEditimageURL(fileArray);

    });
      function readEditimageURL(input) {
      
        // fcount =    jQuery('#fcount').val(); 
        // console.log(fcount);
        // fileindex = jQuery('.edit_product_image').attr('data-id');

        // nextindex= parseInt(fileindex) + 1 ;
        var filecount = document.getElementById("edit_prod_image").files.length;
            fcount = parseInt(fcount)+parseInt(filecount);
          console.log('fcount',fcount);
        if (fcount > 0) {
            
            var total_file = document.getElementById("edit_prod_image").files.length;
             jQuery('.appended-div').find('.imgerr').css('display','none');
             for(var i=0;i<total_file;i++)
            {      
                  
                    jQuery('.append-img-edit').find('.appended-div').append('<div id="preview_img_'+i+'" class="preview-img-edit">'
                        +'<img src="'+URL.createObjectURL(event.target.files[i])+'" width="120">'
                        +'<div class="overlay">'
                    	+'<a href="javascript:void(0)" class="edit_product_image" data-id=""><i class="fa fa-trash fa-2x icon "></i></a>'
                    	+'</div></div></div>');
                  
            }
           
            if( jQuery('.appended-div').find('img').length > 0){
                jQuery('.filebrowse').hide();
                jQuery('.appendimagebtn').html('');
            }else{
              jQuery('.filebrowse').show();
            }

        }else{
             jQuery('.append-img-edit').css('display','block');
            //   jQuery('.appended-div').find('.imgerr').css('display','block');
            //   jQuery('.appended-div').find('.imgerr').html('Max Three files are allowed').css("color", "red");
             // jQuery('.append-img-edit').find('.appended-div').html('Three files are allowed').css("color", "red");
        }
    }
jQuery(document).on('click','.edit_product_image',function(e){
    // jQuery(this).parent('div').parent('.preview-img-edit').remove();
    if( jQuery('.appended-div').find('img').length > 0){
        jQuery('.filebrowse').hide();
        jQuery('.appendimagebtn').html('');
    }else{
      jQuery('.filebrowse').show();
     
    }
  
});

    jQuery(document).on('click','.edit_product_image',function(e){
    	e.preventDefault();
   		var id = 		jQuery(this).attr('data-id');
        var thisAttr = jQuery(this);
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
                      url: '/admin/bookattach/delete',
                      data: {
                          'id': id
                      },
                       success: function (data) {
                        console.log(data);
                            if(data.status == true)
                            {
                              swal("Done!","It was succesfully deleted!","success");    
                              jQuery(thisAttr).parent('div').parent('.preview-img-edit').remove();
                              jQuery('.filebrowse').show();
                            //   jQuery('.appendimagebtn').html('');
                            //   jQuery('.appendimagebtn').html('<div class="row form-group">'+
                            //     '<div class="col col-md-3">'+
                            //         '<label for="prod_image" class="form-control-label">Image</label>'+
                                    
                            //     '</div>'+
                            //     '<div class="col-12 col-md-9 filebrowse">'+
                            //         '<label class="btn-file btn btn-primary">Browse'+
                            //             '<input type="file" id="edit_prod_image" name="prod_image" class="form-control-file">'+
                            //         '</label>'+
                            //     '</div>'+
                            // '</div>');


                            }
                        }
                  });   
              } 
            })  
            
        }else{
            jQuery(this).parent('div').parent('.preview-img-edit').remove();
            console.log('else');
            jQuery('.filebrowse').show();
        }
	});

    

