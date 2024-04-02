<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <style>
            .button 
            {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                background-color: white; 
                color: black; 
                border: 2px solid #008CBA;
                border-radius: 12px;
                font-weight: bold;
                font-family: cursive;
            }
            .button:hover 
            {
                background-color: #008CBA;
                color: white;
            }
            body
            {
                text-align: center;
            }
        </style>      
    </head>
    <body>
        <div class="container">
            <h2>Reset Password</h2>
            <form enctype="multipart/form-data"  method="POST" action="http://localhost/uttiration_backend/public/api/resetPassword/{{ $data['id'] }}">
                <div class="form-group">
                    <label for="pwd">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                </div> 
                <input type="submit" class="button" value="Submit">
            </form>
        </div>
    </body>
</html>