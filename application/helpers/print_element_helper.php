
<?php 

    echo "function printElem(elem) {\n var mywindow = window.open('', 'PRINT', 'height=400,width=400');\n mywindow.document.write('<html><head><title>' + document.title + '<\/title>');\n mywindow.document.write(`<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'><\/script>\n<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'><\/link> <link rel='stylesheet' href=<?php echo base_url('./assets/css/style.css');\n ?>> <style> body {\n width: 100%;\n display: flex;\n justify-content: center;\n align-items: baseline;\n } div.card {\n display: inline-block;\n display: -webkit-inline-box;\n } div {\n width: 45rem;\n };\n p {\n margin: 0 !important;\n padding: 0 !important;\n };\n div div.label-column {\n float: right;\n } div div.row div {\n width: 100%;\n text-align: left;\n };\n div#ackReceipt {\n width: 40rem;\n } <\/style> `);\nmywindow.document.write('<\/head><body>');\n mywindow.document.write(document.getElementById(elem).innerHTML);\n mywindow.document.write('<\/body><\/html>');\n mywindow.document.close();\n mywindow.focus();\n mywindow.print();\n mywindow.close();\n return true;\n }\nconsole.log('included');\n"
?>