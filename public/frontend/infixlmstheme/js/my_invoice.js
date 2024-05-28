$(document).ready(function () {
    $(".printBtn").click(function () {
        printDiv('invoice_print');
    });
});

// function printDiv(divName) {
//     var printContents = document.getElementById(divName).innerHTML;
//     var originalContents = document.body.innerHTML;

//     // Create a new window to preserve original document and styles
//     var printWindow = window.open('', '_blank', 'height=600,width=800');
//     printWindow.document.write('<html><head><title>Print</title>');
//     // Include the CSS files or inline styles that are required for printing
//     var cssLinks = document.querySelectorAll('link[rel="stylesheet"], style');
//     cssLinks.forEach(function (link) {
//         printWindow.document.write(link.outerHTML);
//     });
//     printWindow.document.write('</head><body>');
//     printWindow.document.write(printContents);
//     printWindow.document.write('</body></html>');
//     printWindow.document.close(); // necessary for IE >= 10
//     printWindow.focus(); // necessary for IE >= 10

//     // Wait for the new window to load and then print
//     printWindow.onload = function () {
//         printWindow.print();
//         printWindow.close();
//     };

//     // Restore the original contents
//     setTimeout(function () {
//         window.location.reload();
//     }, 10000);
// }
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    //printContents.print();
     window.print();

    document.body.innerHTML = originalContents;
    setTimeout(function () {
        window.location.reload()
    }, 10000);
}

$(".downloadBtn").click(function () {
    const element = document.getElementById("invoice_print");
    let opt = {
        margin: 0,
        filename: 'invoice.pdf',
        image: {type: 'jpeg', quality: 1},
        jsPDF: {unit: 'in', format: 'a4', orientation: 'portrait'}
    };
    html2pdf().set(opt).from(element).save();
});
