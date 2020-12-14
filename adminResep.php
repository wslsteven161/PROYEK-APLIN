<?php 
    require_once("Connection.php");

    if (!isset($_COOKIE['admin']))
    {
        header("Location: index.php");
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- JQUERY -->
    <script src="js/jquery-3.5.1.min.js"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/all.min.js"></script>

    <!-- STYLE -->
    <link rel="stylesheet" href="css/style.css">

    <!-- LITTLE <3 ICON -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .adm-front{
            margin: 100px auto;
            text-align: center;
            justify-content: center;
            color: #EF8354;
        }
        body {
            background: #2D3142;
            font-family: 'Raleway', sans-serif;
        }
        .flex-container{
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 150px 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        #imgHover:hover{
            width: 100%;
            height: 100%;
            border: 1px solid red;
            border-radius: 10px;
        }
        #contBtn{
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            transition: .5s ease;
            font-weight: bolder;
        }
        #contBtn:hover .overlay {
            opacity: 1;
        }
        .text {
            color: orangered;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1>APOTEK</h1>
                <!--a href="#"><img src="" alt="" class="img-fluid"></a-->
            </div>
        </div>
    </header>

    <div class="FRONT-PAGE adm-front">
        <h1>Welcome, Admin!</h1>
        <div style="height:20px"></div>
        <a href="adminPage.php"><button type="button" class="btn btn-secondary">Back</button></a>
    </div>

    <div style="height:20px"></div>

    <div class="container">
        <table class="table table-bordered table-dark text-center">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">User_id</th>
                <th scope="col">Picture</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-resep-data">
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <input type="hidden" name="" id="hiddenID">

    <div class="modal fade" id="ModalMessage" tabindex="-1" role="dialog" aria-labelledby="ModalMessage" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="" id="myMessage" cols="55" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismissModal">Close</button>
                <button type="button" class="btn btn-primary" id="saveModal">Save changes</button>
            </div>
            </div>
        </div>
    </div>

</body>
<script>
    function changeStatus(id)
    {
        swal({
            title: "Ganti Status",
            text: "Mengganti Status Resep !",
            buttons: [
                'Belum Dilihat',
                'Sudah Dilihat (Selesai)'
            ],
            dangerMode: true,
        }).then(function(selesai){
            if (selesai)
            {
                // ToDo
                $.ajax({
                    url: "Utils/changeStatusReciepe.php",
                    type: "POST",
                    data: { "id" : id },
                    success: function(data){
                        if (data == "ok")
                        {
                            swal("Success!", "Berhasil Mengganti Status","success");
                            getAllResep();
                        }
                    }
                });
            }
        });
    }
    function openModal(id)
    {
        $('#ModalMessage').modal('toggle');
        $("#hiddenID").val(id);
    }
    function getAllResep()
    {
        $.ajax({
            url: "Utils/getAllResep.php",
            success: function(data){
                //console.log(data);
                let datas = JSON.parse(data);
                $("#table-resep-data").empty();
                $.each(datas, function(index, value){
                    let str1 = `
                    <tr>
                        <th scope="row">${(index + 1)}</th>
                        <td>User_${value['user_id']}</td>
                        <td width="30%"><div id="contBtn"><a href="uploads/resep/${value['picture']}" target="_blank"><img id="imgHover" src="uploads/resep/${value['picture']}" alt="IMAGE" style="width:75px;height:75px;"><div class="overlay"><div class="text">Click untuk lihat fullscreen!</div></div></a></div></td>
                        <td>
                            ${value['status'] == 0 ? `<div class="alert alert-warning" role="alert">Belum Di Lihat!</div>` : `<div class="alert alert-success" role="alert">Sudah Di Lihat</div>`}
                        </td>
                        <td>
                            ${value['status'] == 0 ? `<button type="button" class="btn btn-primary btn-sm" onClick="changeStatus('${value['id']}')">Change Status</button>` : ""}
                            <button type="button" class="btn btn-secondary btn-sm" onClick="openModal('${value['id']}')">Embed Message</button>
                        </td>
                    </tr>
                    `;
                    $("#table-resep-data").append(str1);
                });
            }
        })

    }

    $("#imgHover").hover(function() {
        $(this).css('cursor','pointer').attr('title', 'Click Here to Fullscreen.');
    });

    $(document).ready(function(){
        getAllResep();

        $("#dismissModal").click(function(){
            $("#myMessage").html("");
            $("#myMessage").val("");
        });

        $("#saveModal").click(function(){
            let d = $("#hiddenID").val();
            if (d != "")
            {
                $.ajax({
                    url: "Utils/appendMessage.php",
                    type: "POST",
                    data: {"id" : d, "message" : $("#myMessage").val() },
                    success: function(data){
                        if (data == "ok")
                        {
                            swal("Success", "Berhasil Menambahkan Message");
                        }
                        $("#myMessage").val("");
                        $('#ModalMessage').modal('hide');
                        $("#hiddenID").val('');
                    }
                });
            }
        });
    });
</script>
</html>