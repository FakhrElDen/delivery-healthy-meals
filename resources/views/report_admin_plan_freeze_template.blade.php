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

            .ver-email-tem-logo{
                height:125px;
                width:auto;
                max-width:300px;
                min-width:50px;
                max-height:200px;
                min-height:50px;
                margin:2em 0px;

            }
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
            .h3
            {
                font-weight: normal;
            }
            .p-style{
                color:#1d2228;
                font-size:18px;
                display:block;
            }
            .name-n-email{
                font-family:cursive;
                text-transform:capitalize;
                font-weight:bolder;
            }
            
            .tbl-style{
                width:100%;
                border:0;
                align:center;
            
            }
            .tbl-email{
                width:711px;
            }
            .a-center{
                text-align:center;
            }
            .txt-left{
                text-align:left;
            }
        </style>      
    </head>
    <body>



<!--table design-->
<div>
             <table role="presentation" cellpadding="0" cellspacing="0" class="tbl-style">
                 <tbody>
                     <tr>
                         <td class="a-center">
                             <table role="presentation" cellpadding="0" cellspacing="0"  class="tbl-email">
                                 <tbody>
                                     <tr>
                                         <td class="a-center">
                                             <img src="{{env('APP_URL')}}/resources/assets/logo_crop.png" alt="" class="ver-email-tem-logo">                        
                                         </td>  
                                     </tr> 
                                     <tr>
                                         <td class="a-center">
                                            
                                             <h3 class="p-style">Hi, Admin</h3>
                                             <h3 class="p-style">User name <span class="name-n-email">{{ $data['name'] }}
                                              </Span>
                                              </h3>
                                            
                                         </td>
                                     </tr>
                                     <tr>
                                        <td class="a-center">
                                         <h3 class="p-style">whith email <Span class="name-n-email">
                                           {{$data['email']}}
                                         </span></h3>
                                        </td>
                                     </tr>
                                     <tr>
                                         <td>
                                         <h3 class="p-style">freeze his plan <Span class="name-n-email">
                                          from {{$data['from']}} to {{$data['to']}}
                                          </span></h3>
                                         </td>
                                     </tr>    
                                 </tbody>
                             </table>
                         </td>
                        
                     </tr>
                 </tbody>   
             </table>   
         </div>
          <!--//table design-->     
    </body>
</html>