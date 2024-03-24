<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Design</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .ticket-number {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            text-align: center;
        }

        .admit-one {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            text-align: center;
        }

        .div-with-dotted-border-right {
            height: 300px;
            position: relative;
            background-color: #dbf935;
            border-right: 5px dotted #dbf935;
        }

        .qr_code img {
            max-width: 100px; /* or any size */
            max-height: 100px; /* or any size */
            margin-top: 20px; /* adjust as needed */
            /* Add more styling as needed */
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div style="background-color: #dbf935;text-align: center;" class="col-md-1">
            <div style="margin: 10px;" class="ticket-number">
                <p>Ticket Number: <span style="font-weight: bolder;">{{$ticketNumber}}</span></p>
            </div>
        </div>
        <div style="background-color: #31e6de;" class="col-md-7 div-with-dotted-border-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-top: 50px;">
                        <h1 style="color: white;font-weight: bolder;">IN GOOD</h1>
                        <h1 style="width:210px; background-color:#dbf935; color: black;font-weight: bolder;">
                            COMPANY</h1>
                    </div>
                    <div class="col-md-6" style="margin-top: 50px;margin-left: -10px">
                        <p style="font-size: 25px; line-height: 40px;">A POETRY & <br/>
                            SPOKEN WORD <br/>
                            EXPERIENCE
                        </p>

                        <i class=""></i>
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
        <div style="background-color: #31e6de; text-align: center;" class=" col-md-3">
            <div style="margin-top:30%;" class="admit-one">

                <p> {!! $html !!} </p>

                <p style="font-weight: bolder;">ADMIT ONE</p>
            </div>
        </div>

    </div>

</div>

<!-- Include Bootstrap JS and its dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.7.16/umd.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

