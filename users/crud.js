// crud.js
$(document).ready(function () {
    // get all employee
    getAllEmployee();
     
    function getAllEmployee(){
        $.ajax({
            url:"get_all_employee.php",
            method:"post",
            dataType:"json",
            success:function(res){
                console.log(res);
            }
        })
    }




    $("#addemp").click(function (e) {
        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var company = $("#company").val();

        $.ajax({
            type: "POST",
            url: "addemployee.php", // Replace with the actual PHP file that processes the form
            data: { name: name, email: email, password: password, company: company },
            success: function (data) {
                // Handle the success response
               toastr.success('Employee added successfully!');
                $("#name").val("");
                $("#email").val("");
                $("#password").val("");
                $("#company").val("");
                $('#myModal').modal('hide');

            },
            error: function (error) {
                // Handle the error response
                toastr.error('Error adding employee: ' + error.responseText);
            }
        });
    });
});
