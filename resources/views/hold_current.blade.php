<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Design</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /*.ticket-number {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            text-align: center;
        }*/
        /*
                .admit-one {
                    writing-mode: vertical-lr;
                    transform: rotate(180deg);
                    text-align: center;
                }*/

        .div-with-dotted-border-right {
            height: 300px;
            position: relative;
            background-color: #dbf935;
            border-right: 5px dotted #dbf935;
        }

        /*.qr_code img {
            max-width: 100px; !* or any size *!
            max-height: 100px; !* or any size *!
            margin-top: 20px; !* adjust as needed *!
            !* Add more styling as needed *!
        }*/

    </style>
</head>
<body>

<div style="margin-top: 20px;" class="container">
    @foreach ($tickets as $ticket)
        <div class="row" id="ticket-{{ $ticket['ticketNumber'] }}">
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
                                <div class="row">
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

        <button class="btn btn-success" id="ticket-{{ $ticket['ticketNumber'] }}"
                onclick="printImage('ticket-{{ $ticket['ticketNumber'] }}')">Download Ticket
        </button>
        <button class="btn btn-success" id="ticket-{{ $ticket['ticketNumber'] }}"
                onclick="printPDF('ticket-{{ $ticket['ticketNumber'] }}')">Download Ticket pdf
        </button>
        <br><br>

    @endforeach

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.7.16/umd.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    function printImage(divId, ticketNumber) {
        const div = document.getElementById(divId);

        html2canvas(div, {
            width: div.offsetWidth,
            height: div.offsetHeight,
            scale: 1,
            logging: true,
            useCORS: true
        }).then(canvas => {
            let imgData = canvas.toDataURL('image/png');
            let link = document.createElement('a');
            link.download = `${divId}.png`; // Dynamic filename
            link.href = imgData;
            link.click();
        });
    }

    function printPDF(divId, ticketNumber) {
        const div = document.getElementById(divId);

        html2canvas(div, {
            width: div.offsetWidth,
            height: div.offsetHeight,
            scale: 1,
            logging: true,
            useCORS: true
        }).then(canvas => {
            // Get canvas data
            let imgData = canvas.toDataURL('image/jpeg', 1.0);

            // Create PDF from imgData
            const pdf = new jspdf.jsPDF({
                orientation: 'landscape',
                unit: 'px',
                format: [canvas.width, canvas.height]
            });

            pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width, canvas.height);

            // Save the PDF
            pdf.save(`${divId}.pdf`);
        });
    }


</script>
</body>
</html>

