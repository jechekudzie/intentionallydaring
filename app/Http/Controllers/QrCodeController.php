<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use function Termwind\render;

class QrCodeController extends Controller
{
    //
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ticketNumber = $request->input('ticketNumber');

            // Save the file path to the database
            $ticket = Ticket::where('ticket_number', $ticketNumber)->first();

            $event = Event::where('id', $ticket->event_id)->first();

            $baseDirectory = 'qr_pdf/' . $event->prefix . '/';

            $originalName = $file->getClientOriginalName();

            // Generate a unique filename to avoid overwriting existing files
            $filename = /*time() . '_' .*/ $originalName;

            // Move the file to the public directory
            $path = $file->move($baseDirectory, $filename);

            $ticket->update([
                'path' => $path,
            ]);
            return response()->json(['message' => 'File uploaded successfully', 'filename' => $filename]);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }

    public function generateAll()
    {
        $eventName = 'In Good Company';

        $is_hard_copy = 0;

        $event = Event::create([
            'name' => $eventName,
            'description' => 'A Poetry & Spoken Word Experience',
            'date' => '2024-03-28',
            'time' => '18:00:00',
            'number_of_tickets' => '60',
        ]);

        $event->update([
            'prefix' => 'IGC-P' . 3,
        ]);

        $tickets = []; // Initialize your tickets array

        for ($i = 1; $i <= 60; $i++) {
            $formattedNumber = str_pad($i, 4, '0', STR_PAD_LEFT);
            $ticketNumber = $event->prefix . '-' . $formattedNumber;

            $value = 'https://intentionallydaring.com/igc/' . $ticketNumber;

            // Generate the QR code as a base64-encoded image
            $qrCode = QrCode::size(100)->generate($value);
            $html = '<img src="data:image/svg+xml;base64,' . base64_encode($qrCode) . '" width="100" height="100" />';

            // Pass the QR code and ticket number to the ticket view
            $tickets [] = [
                'ticketNumber' => $ticketNumber,
                'qrCode' => $qrCode,
                'html' => $html,
            ];

            // Save the ticket to the database
            $ticket = $event->tickets()->create([
                'ticket_number' => $ticketNumber,

            ]);

            if ($i <= 30) {
                $is_hard_copy = 1;
                $ticket->update([
                    'is_hard_copy' => $is_hard_copy
                ]);
            }

        }
        return view('tickets', ['tickets' => $tickets]);

    }

    public function generate()
    {

        $eventName = 'In Good Company';
        $event = Event::create([
            'name' => $eventName,
            'description' => 'A Poetry & Spoken Word Experience',
            'date' => '2024-03-28',
            'time' => '18:00:00',
        ]);

        $event->update([
            'prefix' => 'IGC-P' . $event->id,
        ]);

        $tickets = []; // Initialize your tickets array

        for ($i = 1; $i <= 2; $i++) {
            $formattedNumber = str_pad($i, 4, '0', STR_PAD_LEFT);
            $ticketNumber = $event->prefix . '-' . $formattedNumber;

            $value = 'https://intentionallydaring.com/igc/' . $ticketNumber;

            // Generate the QR code as a base64-encoded image
            $qrCode = QrCode::size(100)->generate($value);
            $html = '<img src="data:image/svg+xml;base64,' . base64_encode($qrCode) . '" width="100" height="100" />';

            // Pass the QR code and ticket number to the ticket view

            $tickets [] = [
                'ticketNumber' => $ticketNumber,
                'qrCode' => $qrCode,
                'html' => $html,
            ];

            // Save the ticket to the database
            $event->tickets()->create([
                'ticket_number' => $ticketNumber,
            ]);

        }
        return view('ticket', ['tickets' => $tickets]);

    }


    public function generateQrGeneral()
    {
        // Base directory within the public folder where the PDFs will be stored
        $eventName = 'In Good Company';
        $event = Event::create([
            'name' => $eventName,
            'description' => 'A Poetry & Spoken Word Experience',
            'date' => '2024-03-28',
            'time' => '18:00:00',
        ]);

        $event->update([
            'prefix' => 'IGC-P' . $event->id,
        ]);

        for ($i = 1; $i <= 2; $i++) {
            // Format the number with leading zeros
            $formattedNumber = str_pad($i, 4, '0', STR_PAD_LEFT);

            $baseDirectory = public_path('qr_pdf/' . $event->prefix . '/');

            // Ensure the base directory exists
            if (!file_exists($baseDirectory)) {
                mkdir($baseDirectory, 0777, true);
            }

            $ticketNumber = $event->prefix . '-' . $formattedNumber;

            $event->tickets()->create([
                'ticket_number' => $ticketNumber,
            ]);

            // Generate the complete URL for this iteration
            $value = 'https://intentionallydaring.com/igc/' . $ticketNumber;

            // Generate QR code
            $qrCode = QrCode::size(150)->generate($value);

            // Create a new PDF instance
            $pdf = App::make('dompdf.wrapper');

            // Load the QR code image as HTML
            $pdf->loadHTML('<img src="data:image/svg+xml;base64,' . base64_encode($qrCode) . '" width="100" height="100" />');

            // Set custom dimensions for the PDF, closely matching an ID card size
            // Here we use the dimensions 3.37 inches x 2.13 inches for a typical ID card size
            $pdf->setPaper([0, 0, 3.37 * 72, 2.13 * 72], 'landscape');

            // Define the file name
            $fileName = 'qrcode_' . $ticketNumber . '_' . time() . '.pdf';

            // Save the PDF to a temporary file
            $tempPath = storage_path('app/' . $fileName);
            $pdf->save($tempPath);

            // Move the temporary file to the final directory
            $finalPath = $baseDirectory . $fileName;
            rename($tempPath, $finalPath);
        }

        return "All QR codes have been generated and saved successfully.";
    }


}

