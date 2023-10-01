
function printElem(elem) {
    var mywindow = window.open('', 'PRINT', 'height=400,width=400');

    mywindow.document.write('<html><head><title>' + document.title + '</title>');
    mywindow.document.write(`
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"></link>
        <link rel="stylesheet" href=<?php echo base_url('./assets/css/style.css'); ?>>

        <style>
            body {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: baseline;
            }
            div.card {
                display: inline-block;
                display: -webkit-inline-box;
            }
            
            div {
                width: 45rem;
            };

            p {
                margin: 0 !important;
                padding: 0 !important;
            };

            div div.label-column {
                float: right;
            }

            div div.row div {
                width: 100%;
                text-align: left;
            };
            div#ackReceipt {
                width: 40rem;
            }
        </style>
        `)
    mywindow.document.write('</head><body>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus();

    mywindow.print();
    mywindow.close();

    return true;
}

console.log("imported")
