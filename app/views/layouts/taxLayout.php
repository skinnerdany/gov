<!DOCTYPE html>
<html>
    <head>
        <noscript>
            <meta http-equiv="refresh" content="1;URL=/user/nojs" />
        </noscript>
        <meta http-equiv="content-type" content="text\html;charset=utf-8" />
        <script src="/js/jquery.js"></script>
        <style>
            fieldset{
                width: 70%;
                max-width: 350px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            label{
                display: block;
            }
            .input_block, fieldset{
                margin-bottom: 1em;
            }
            .sbm_btn{
                text-align: right;
            }
            input[type="submit" i]{
                font-size: .9rem;
                padding: .3em 1.5em;
                border-radius: 100px;
                text-transform: uppercase;
                border: 1px solid #ccc;
                box-shadow: 2px 2px 3px #777;
                outline: none;
                transition: all .2s ease-in;
            }
            input[type="submit" i]:hover{
                box-shadow: 4px 4px 5px #999;

            }
            .error_msg{
                color: red;
            }
            table{
                border-collapse: collapse;
            }
            th, td{
                border-bottom: 1px solid black;
                padding: .5em 1em;
                text-align: center;
            }
            tr:nth-child(even){
                background-color: #EBF4F6 
            }
            tr:nth-child(odd){
                background-color: #DDE0E1;
            }
            #head_tr{
                background-color: #fff;
                border-top: 2px solid #000;
                border-bottom: 2px solid #000;
            }
            tr:hover{
                background-color: #F4ECDF;
            }
            .btn{
                display: inline-block;
                padding: .5em 1em;
                border: 1px solid #ccc;
                border-radius: 100px;
                background-color: #8BFF7A;
                color: black;
                text-decoration: none;
            }
            .btn:hover{
                opacity: .7;
            }
            .btn--del{
                background-color: #FF7474;
            }
        </style>
    </head>
    <body>
        Tax layout
        <?php echo $taxMenu ?? '' ?>
        <?php echo $error == '' ? '' : '<p class="error_msg">Ошибка: ' . $error.'</p>'; ?>
        <?php echo $message; ?>
        <?php echo $content; ?>
    </body>
</html>