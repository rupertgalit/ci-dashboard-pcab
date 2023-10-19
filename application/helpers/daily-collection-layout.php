<?php $data = [["date_time" => "2023-02-06"]]; ?>

<div id="DailyCollectionForm" class="bg-whites mx-auto mt-5" style="width: 70rem">
    <div class="border border-dark p-2 px-4">
        <div class="text-center">
            <div class="text-uppercase">[Intermediary Name]</div>
            <b class="text-uppercase">List of daily collection</b>
            <div>For [Agency Name]</div>
            <div class="row d-flex align-items-center">
                <div class="col-12">
                    <div class="list-inline-item ">Date:</div>
                    <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
                        <?php echo $data[0]["date_time"] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-right pb-2">
            <div class="col">Report No. <div
                    class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
                    2023100001</div>
            </div>
        </div>
        <div class="col-12 d-flex flex-column data-table py-0">
            <div class="row t-head">
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
                    Date and Time
                </div>
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
                    AR Number
                </div>
                <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
                    Name of payor
                </div>
                <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
                    Particulars
                </div>
                <div
                    class="border border-dark col-2 d-flex align-items-center justify-content-around border-right-0 text-center">
                    Reference Number
                </div>
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
                    Amount
                </div>
            </div>
            <div class="t-body p-0 m-0">
                <?php
                // for ($i = 0; $i < 10; $i++) {
                //     echo "<div class='row'>";
                //     echo "<div class='border border-dark border-right-0 border-top-0 col-1'>123</div>";
                //     echo "<div class='border border-dark border-right-0 border-top-0 col-1'>-</div>";
                //     echo "<div class='border border-dark border-right-0 border-top-0 col'>-</div>";
                //     echo "<div class='border border-dark border-right-0 border-top-0 col'>-</div>";
                //     echo "<div class='border border-dark border-right-0 border-top-0 col-2'>-</div>";
                //     echo "<div class='border border-dark border-top-0 col-1 text-right'>123</div>";
                //     echo "</div>";
                // }
                // ;
                

                ?>
                <div class="row">
                    <div class="border border-dark border-right-0 border-top-0 col-1">123</div>
                    <div class="border border-dark border-right-0 border-top-0 col-1">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col-2">-</div>
                    <div class="border border-dark border-top-0 col-1 text-right">123</div>
                </div>
            </div>

            <div class="row t-total-row">
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
                <div class="border border-dark border-right-0 border-top-0 col"></div>
                <div class="border border-dark border-right-0 border-top-0 col-2"></div>
                <div class="border border-dark border-top-0 col-1 text-right">&#8369; &nbsp; xxx.xx</div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-8">
            </div>
            <div class="col flex flex-column">
                <div class="row">
                    Page No. <div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">1
                    </div> of <div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">1
                    </div>
                </div>
                <div class="row">
                    Date and time generated: <div class="list-inline-item font-weight-light custom-font-size px-3 pt-1">
                        <?php echo $data[0]["date_time"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    let i = 0
    while (toSlice.length - (i * 10) > 0) {
        console.log(toSlice.slice(i * 10, i * 10 + 10))
        i++
    }

    let jsonData = JSON.parse('<?php echo json_encode($data) ?>')
    const _jsonData = jsonData.concat(...jsonData, ...jsonData, ...jsonData, ...jsonData, ...jsonData, ...jsonData,)

    async function printDailyReport(id) {
        let doc = new jspdf.jsPDF({
            orientation: 'p', unit: 'px'
        })

        let printContent = `
            <html><title>Receipt</title>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
                <\/script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
                integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link>
                <style>
                    div#DailyCollectionForm div.data-table {
                        font-size: 13px;
                    }

                    div#DailyCollectionForm div.custom-font-size {
                        font-size: 12px;
                    }

                    div#DailyCollectionForm div.data-table div.row-data {
                        font-size: 12px;
                        overflow: nowrap;
                    }
                    div#DailyCollectionForm div.data-table div.t-body div.row-data:nth-child(2) {
                        width: 405.3px;
                        white-space: nowrap;
                        overflow: visible;
                    }
                </style></head><body>
                [content]
        </div>
    </div>
</div>
                </html>
                `;
        let i = 0;
        let content = "";
        while (_jsonData.length - (i * 10) > 0) {
            let rows = _jsonData.slice(i * 10, i * 10 + 10)

            if (rows.length < 10) {
                addIndex = 10 - rows.length
                rows = rows.concat(Array(addIndex).fill(null))
            }

            try {
                content += `
                    ${i % 3 !== 0 ? '<div class="row" style="width: 89.5vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6rem 0"></div>' : ''}
        <div id="DailyCollectionForm-${i}" class="bg-whites mx-auto mt-5" style="width: 90rem;${(i + 1) % 3 !== 0 || i == 0 ? "" : "margin-bottom: 8rem !important;"} }">
    <div class="border border-dark p-2 px-4">
        <div class="text-center">
            <div class="text-uppercase">[Intermediary Name]</div>
            <b class="text-uppercase">List of daily collection</b>
            <div>For [Agency Name]</div>
            <div class="row d-flex align-items-center">
                <div class="col-12">
                    <div class="list-inline-item ">Date:</div>
                    <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
                        10/12/2023
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-right pb-2">
            <div class="col">Report No. <div
                    class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
                    2023100001
            </div>
            </div>
        </div>
        <div class="col-12 d-flex flex-column data-table py-0">
            <div class="row t-head">
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
                    Date and Time
                </div>
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
                    AR Number
                </div>
                <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
                    Name of payor
                </div>
                <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
                    Particulars
                </div>
                <div
                    class="border border-dark col-2 d-flex align-items-center justify-content-around border-right-0 text-center">
                    Reference Number
                </div>
                <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
                    Amount
                </div>
            </div>
            <div class="t-body p-0 m-0">
            `

                //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
                // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}
                rows.forEach(row => {

                    content += `
                    <div class="row row-data">
                        <div class="border border-dark border-right-0 border-top-0 col-1">${row?.date_time ?? "&nbsp;"}</div>
                        <div class="border border-dark border-right-0 border-top-0 col-1">${row?.ar_number ?? ""}</div>
                        <div class="border border-dark border-right-0 border-top-0 col">${row?.name_of_payor ?? ""}</div>
                        <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
                        <div class="border border-dark border-right-0 border-top-0 col-2">${row?.reference_number ?? ""}</div>
                        <div class="border border-dark border-top-0 col-1 text-right">${row?.total_amount ?? ""}</div>
                    </div>
                    `;
                });
                content += `</div>
                <div class="row t-total-row">
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
                <div class="border border-dark border-right-0 border-top-0 col"></div>
                <div class="border border-dark border-right-0 border-top-0 col-2"></div>
                <div class="border border-dark border-top-0 col-1 text-right">&#8369; &nbsp; xxx.xx</div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-8">
            </div>
            <div class="col flex flex-column">
                <div class="row">
                    Page No. <div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">${i + 1}
                    </div> of <div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">[total-page]
                    </div>
                </div>
                <div class="row">
                    Date and time generated: <div class="list-inline-item font-weight-light custom-font-size px-3 pt-1">
                        <?php echo $data[0]["date_time"] ?>
                    </div>
                </div>
            </div>
        </div>
        </div></div>`
                i++
            } catch (e) { console.log(e) }
        }

        document.write(printContent.replace("[content]", content).replaceAll("[total-page]", i))

        //     let doc = window.open("", "My Page", "height=700,width=900,titlebar=no,resizable=no")
        //     doc.document.write(`<html><title>Receipt</title>
        //  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        // integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        // <\/script>
        // <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        // integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link></head><body>`);
        //     doc.document.write(printContent);
        //     doc.document.write("</html>")
        //     doc.document.close();
        //     doc.document.onkeydown = (key) => alert(key)
        //     setTimeout(() => { doc.print(); doc.close(); }, 300)

        // doc.html(printContent.replace("[content]", content).replaceAll("[total-page]", i), {
        //     html2canvas: {
        //         scale: .3
        //     },
        //     callback: async function (doc) {
        //         // doc.addPage(
        //         //     { orientation: 'p', unit: 'px' }
        //         // )
        //         await doc.save(`daily-collection-`)
        //         await doc.output("dataurlnewwindow", "receipt-123.pdf");
        //     },
        //     x: 7,
        //     y: 7,
        // })
    }


</script>

<style>
    div#DailyCollectionForm div.data-table {
        font-size: 13px;
    }

    div#DailyCollectionForm div.custom-font-size {
        font-size: 12px;
    }
</style>