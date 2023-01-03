
$(document).ready(function() {
    $('#employeeListing').DataTable()
  });

$('#saveEmpForm').submit('click', function() {
    
    var masv = $('#ma_sv').val();
    var name = $('#hoten_sv').val();
    var date = $('#ngay_sinh').val();
    var sex = $('#gioi_tinh').val();
    var dantoc = $('#dan_toc').val();
    var noisinh = $('#noi_sinh').val();
    var malop = $('#ma_lop').val();
    
       $.ajax({
        type:"POST",
        url:"http://qlnd.com/index.php/AdminController/save",
        dataType:"JSON",
        data: {ma_sv:masv, hoten_sv:name, ngay_sinh:date,gioi_tinh:sex,dan_toc:dantoc,noi_sinh:noisinh,ma_lop:malop},
        success: function(data) {
            $('#ma_sv').val("");
            $('#hoten_sv').val("");
            $('#ngay_sinh').val("");
            $('#gioi_tinh').val("");
            $('#dan_toc').val("");
            $('#noi_sinh').val("");
            $('#ma_lop').val("");
            $('#addEmpModal').modal('hide');
            $('#employeeListing').DataTable().ajax.reload();
        }
    });
    return false;
});

$(document).on('click','.editRecord',function(e) {
    
    var id=$(this).attr("data-masv");
    var name=$(this).attr("data-name");
    var email=$(this).attr("data-ngaysinh");
    var phone=$(this).attr("data-sex");
    var city=$(this).attr("data-dantoc");
    var noisinh=$(this).attr("data-address");
    var malop=$(this).attr("data-malop");
    $('#ma_sv1').val(id);
    $('#hoten_sv1').val(name);
    $('#ngay_sinh1').val(email);
    $('#gioi_tinh1').val(phone);
    $('#dan_toc1').val(city);
    $('#noi_sinh1').val(noisinh);
    $('#ma_lop1').val(malop);
});
$('#editEmpForm').on('submit',function(){

    var masv = $('#ma_sv1').val();
    var name = $('#hoten_sv1').val();
    var date = $('#ngay_sinh1').val();
    var sex = $('#gioi_tinh1').val();
    var dantoc = $('#dan_toc1').val();
    var noisinh = $('#noi_sinh1').val();
    var malop = $('#ma_lop1').val();				
    $.ajax({
        type : "POST",
        url  : "http://qlnd.com/index.php/AdminController/update",
        dataType : "JSON",
        data : {ma_sv:masv, hoten_sv:name, ngay_sinh:date, gioi_tinh:sex, dan_toc:dantoc, noi_sinh:noisinh, ma_lop:malop},
        success: function(data){

            $("#ma_sv1").val("");
            $("#hoten_sv1").val("");
            $('#ngay_sinh1').val("");
            $("#gioi_tinh1").val("");
            $('#dan_toc1').val("");
            $("#noi_sinh1").val("");
            $("#ma_lop1").val("");
            $('#editEmpModal').modal('hide');
            $('#employeeListing').DataTable().ajax.reload();
        }
        
    });
    return false;
});
$(document).on("click", ".deleteRecord", function() { 
    var masv = $(this).attr("data-masv");
    $('#ma_sv').val(masv);
    
});
$('#deleteEmpForm').on('submit',function(e){

    var empId = $('#ma_sv').val();
    $.ajax({
        type : "POST",
        url  : "http://qlnd.com/index.php/AdminController/delete",
        dataType : "JSON",  
        data : {ma_sv:empId},
        success: function(data){
            $("#"+empId).remove();
            $('#ma_sv').val("");
            $('#deleteEmpModal').modal('hide');
            $('#employeeListing').DataTable().ajax.reload();
        }
    });
    return false;
});