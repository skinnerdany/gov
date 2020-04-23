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
        </style>
    </head>
    <body>
        Tax layout
        <?php echo $error == '' ? '' : 'Ошибка: ' . $error; ?><br />
        <?php echo $content; ?>
    </body>
</html>