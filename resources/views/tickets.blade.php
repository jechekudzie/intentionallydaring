<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ticket Design</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media only screen and (max-width: 600px) {
            /* Adjust styles for mobile here */
            .ticket-row {
                /* Example: Stack columns vertically in mobile view */
                flex-direction: column;
            }
            /* Adjust the size and position of elements to fit mobile screens */
        }

    </style>
</head>
<body>

<div style="margin-top: 20px;" class="container">
    <button class="btn btn-primary" onclick="downloadAllTickets()">Download All Tickets</button>
    <button class="btn btn-primary" onclick="downloadAllPDFs()">Download All Tickets as PDF</button>
    <button class="btn btn-primary" onclick="downloadAllImages()">Download All Tickets as Images</button>


    <br/>
    <br/>

    @foreach($tickets as $ticket)

        <div class="row ticket-row" id="ticket-{{ $ticket['ticketNumber'] }}">
            <div style="background-color: #dbf935; text-align: center;" class="col-md-2">
                <div style="margin-top: 60%;  text-align: center;">
                    <p>
                        Ticket Number
                        <br/>
                        <br/>
                        <span style="font-weight: bolder;">{{ $ticket['ticketNumber'] }}</span>

                    </p>
                </div>
            </div>
            <div style="background-color: #31e6de;  height: 300px;position: relative;border-right: 5px dotted #dbf935;"
                 class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 40px;">
                            <h1 style="color: white; font-weight: bolder;">IN GOOD</h1>
                            <h1 style="width: 210px; background-color: #dbf935; color: black; font-weight: bolder;">
                                COMPANY
                            </h1>
                        </div>
                        <div class="col-md-6" style="margin-top: 50px; ">
                            <p style="font-size: 25px; line-height: 40px;">A POETRY &<br>SPOKEN WORD<br>EXPERIENCE</p>
                        </div>
                        <div class="col-md-12">
                            <div class="container">
                                <div style="font-weight: bolder" class="row">
                                    <div class="col-md-6">
                                        <h5>Venue</h5>
                                        <p>The Vanilla Moon<br>64 Sam Nujoma Street, Harare</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Date</h5>
                                        <p>THUR, 28 MARCH</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Time</h5>
                                        <p>6:00 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color: #31e6de; text-align: center;" class="col-md-2">
                <div style="margin-top:40%;" class="admit-one">

                    <p> {!!$ticket['html'] !!} </p>

                    <p style="font-weight: bolder;">ADMIT ONE</p>
                </div>
            </div>
        </div>
        <br/>
        <br/>
    @endforeach

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.7.16/umd.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


<script>

    window.onload = function() {
        rendAndDownload(); // If you want to download and upload all tickets as PDFs when the page loads
        // downloadAllImages(); // Uncomment if you also want to download and upload all tickets as images when the page loads
    };

    function rendAndDownload() {
        document.querySelectorAll('.ticket-row').forEach((ticket, index) => {
            const ticketId = ticket.getAttribute('id');
            const ticketNumber = ticketId.replace('ticket-', '');
            // Introduce a slight delay for each ticket to avoid overwhelming the browser/server
            setTimeout(() => {
                printPDFAndUpload(ticketId, ticketNumber);
            }, index * 2000);
        });
    }

    function downloadAllTickets() {
        document.querySelectorAll('.ticket-row').forEach(ticket => {
            const ticketId = ticket.getAttribute('id');
            const ticketNumber = ticketId.replace('ticket-', '');
            // You can choose to either print as image or PDF here, or both
            printImageAndUpload(ticketId, ticketNumber);
            printPDFAndUpload(ticketId, ticketNumber);
        });
    }

    //images starts here
    function downloadAllImages() {
        document.querySelectorAll('.ticket-row').forEach(ticket => {
            const ticketId = ticket.getAttribute('id');
            const ticketNumber = ticketId.replace('ticket-', '');
            printImageAndUpload(ticketId, ticketNumber);
        });
    }

    function printImageAndUpload(divId, ticketNumber) {
        const div = document.getElementById(divId);

        html2canvas(div, {
            width: div.offsetWidth,
            height: div.offsetHeight,
            scale: 1,
            logging: true,
            useCORS: true
        }).then(canvas => {
            canvas.toBlob(function(blob) {
                uploadFile(blob, `ticket_${ticketNumber}.png`, ticketNumber);
            }, 'image/png');
        });
    }


    //pdfs starts here
    function downloadAllPDFs() {
        document.querySelectorAll('.ticket-row').forEach(ticket => {
            const ticketId = ticket.getAttribute('id');
            const ticketNumber = ticketId.replace('ticket-', '');
            printPDFAndUpload(ticketId, ticketNumber);
        });
    }

    function printPDFAndUpload(divId, ticketNumber) {
        const div = document.getElementById(divId);

        html2canvas(div, {
            width: div.offsetWidth,
            height: div.offsetHeight,
            scale: 1,
            logging: true,
            useCORS: true
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/jpeg', 1.0);
            const pdf = new jspdf.jsPDF({
                orientation: 'landscape',
                unit: 'px',
                format: [canvas.width, canvas.height]
            });

            pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width, canvas.height);

            // Convert PDF to a Blob
            const blob = pdf.output('blob');

            // Upload the Blob using your upload function
            uploadFile(blob, `ticket_${ticketNumber}.pdf`, ticketNumber);
        });
    }


    function uploadFile(blob, filename, ticketNumber) {
        const formData = new FormData();
        formData.append('file', blob, filename);
        formData.append('ticketNumber', ticketNumber); // Append ticket number to the form data

        // Fetch the CSRF token from the meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/upload-ticket', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the request headers
            },
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }


    /*function uploadFile(blob, filename, ticketNumber) {
        const formData = new FormData();
        formData.append('file', blob, filename);
        formData.append('ticketNumber', ticketNumber); // Now properly scoped

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/upload-ticket', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
*/


</script>
</body>
</html>

