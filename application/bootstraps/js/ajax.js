$(document).ready(function() {
    $('#employeeListing').DataTable()
  });


$(document).ready(function(){ 
    $('#add_button').click(function(){  
        $('#user_form')[0].reset();  
        $('.modal-title').text("Add User");  
        $('#action').val("Add");  
        
   })  
    var dataTable = $('#user_data').DataTable({  
         "processing":true,  
         "serverSide":true,  
         "order":[],  
         "ajax":{  
              url:"http://qlnd.com/index.php/AdminController/fetch_user",  
              type:"POST"  
         },  
         "columnDefs":[  
              {  
                   "targets":[0, 7, 8],  
                   "orderable":false,  
              },  
         ],  
    });
    
    
    $(document).on('submit', '#user_form', function(event){  
         event.preventDefault();  
         var ma_sv = $('#ma_sv').val();  
         var hoten_sv = $('#hoten_sv').val(); 
         var ngay_sinh = $('#ngay_sinh').val();
         var gioi_tinh = $('#gioi_tinh').val();
         var dan_toc = $('#dan_toc').val();
         var noi_sinh = $('#noi_sinh').val();
         var ma_lop = $('#ma_lop').val(); 
         
         if(ma_sv != '' && hoten_sv != ''&& ngay_sinh != ''&& gioi_tinh != ''&& dan_toc != ''&& noi_sinh != ''&& ma_lop != '')  
         {  
              $.ajax({  
                   url:"http://qlnd.com/index.php/AdminController/user_action",  
                   method:'POST',  
                   data:new FormData(this),  
                   contentType:false,  
                   processData:false,  
                   success:function(data)  
                   {  
                        alert(data);  
                        $('#user_form')[0].reset();  
                        $('#userModal').modal('hide');  
                        dataTable.ajax.reload();  
                   }  
              });  
         }  
         else  
         {  
              alert("Bother Fields are Required");  
         }  
    }); 
    
    $(document).on('click', '.update', function(){  
        var user_id = $(this).attr("id");  
        $.ajax({  
             url:"http://qlnd.com/index.php/AdminController/fetch_single_user",  
             method:"POST",  
             data:{user_id:user_id},  
             dataType:"json",  
             success:function(data)  
             {  
                  $('#userModal').modal('show');  
                  $('#ma_sv').val(data.ma_sv);  
                  $('#hoten_sv').val(data.hoten_sv);
                  $('#ngay_sinh').val(data.ngay_sinh); 
                  $('#gioi_tinh').val(data.gioi_tinh); 
                  $('#dan_toc').val(data.dan_toc); 
                  $('#noi_sinh').val(data.noi_sinh); 
                  $('#ma_lop').val(data.ma_lop);   
                  $('.modal-title').text("Edit User");  
                  $('#user_id').val(user_id);  
                  
                  $('#action').val("Edit");  
             }  
        })  
   });
   
   $(document).on('click', '.delete', function() {  
        var user_id = $(this).attr("id");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"http://qlnd.com/index.php/AdminController/delete_single_user",  
                method:"POST",  
                data:{user_id:user_id},  
                success:function(data)  
                {  
                    alert(data);  
                    dataTable.ajax.reload();  
                }  
            });  
        }  
        else  
        {  
            return false;       
        }  
    });  
});