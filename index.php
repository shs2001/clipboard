<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clipboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
        }
        .wrapper{
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%); */
            width: 95%;
            height: 80vh;
            margin: 0 auto;
            padding-top: 10px;
        }
        .wrapper textarea{
            width:100%;
            height: 80vh;
            margin-bottom: 10px;
            outline: none;
            padding: 10px;
            font-size: 15px;
        }
        .wrapper .btn_group{
            margin: 0 auto;
            display: block;
            width: 320px;
        }
        .btn{
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 5px;
            font-family: Arial, Helvetica, sans-serif;
            cursor: pointer;
            transition: all ease 0.5s;
        }
        #save{
            margin-right: 10px;
            color: #fff;
            background-color: green;
            border: 1px solid transparent;
        }
        #clear{
            color: #fff;
            background-color: red;
            border: 1px solid transparent;
        }
        #save:hover{
            color: green;
            background-color: #fff;
            border: 1px solid green;
        }
        #clear:hover{
            color: red;
            background-color: #fff;
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form id="submit">
            <textarea id="data" placeholder="Write Anything .....">
                <?php
                $host = "localhost";
                $user = "root";
                $pass = "";
                $database = "cliptable";
                $con = mysqli_connect($host,$user,$pass,$database);
                echo $data = mysqli_fetch_array(mysqli_query($con,"SELECT `data` FROM `cliptable` WHERE id=1"))['data'];
                ?>
            </textarea>
            <div class="btn_group">
                <button class="btn" type="submit" id="save">Save</button>
                <button type="reset" onclick="return confirm('Are you Sure ?')" class="btn" id="clear">Clear</button>
            </div>
        </form>
    </div>

    <script>

        $('#submit').submit(function(e){
            e.preventDefault();
            var data = $('#data').val();
            $('#save').html("....");
            $.ajax({
                url:'data.php',
                method:'POST',
                data: data,
                success:function(respone){
                    $('#save').html("Saved");
                    setTimeout(function(){
                        $('#save').html("Save");
                    },2000)
                }
            })

        })

    </script>
</body>
</html>