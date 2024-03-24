<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //

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

        for ($i = 1; $i <= 2; $i++) {
            $formattedNumber = str_pad($i, 4, '0', STR_PAD_LEFT);
            $ticketNumber = $event->prefix . '-' . $formattedNumber;

            $value = 'https://intentionallydaring.com/igc/' . $ticketNumber;

            // Generate the QR code as a base64-encoded image
            $qrCode = QrCode::size(150)->generate($value);
            $html = '<img src="data:image/svg+xml;base64,' . base64_encode($qrCode) . '" width="100" height="100" />';

            // Pass the QR code and ticket number to the ticket view
            /* $ticketHtml = view('ticket', [
                 'ticketNumber' => $ticketNumber,
                 'qrCode' => $qrCode
             ])->render();*/

            // Create a new PDF instance and load the ticket HTML
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($html);

            // Define the PDF dimensions and orientation
            $pdf->setPaper([0, 0, 3.37 * 72, 2.13 * 72], 'landscape');

            // Determine where to save the ticket PDF
            $baseDirectory = public_path('tickets/' . $event->prefix . '/');
            if (!file_exists($baseDirectory)) {
                mkdir($baseDirectory, 0777, true);
            }
            $ticketPdfPath = $baseDirectory . 'ticket_' . $ticketNumber . '.pdf';

            // Save the PDF file
            $pdf->save($ticketPdfPath);

            return  view('ticket', compact('ticketNumber', 'html'));
        }

        return "All tickets have been generated and saved successfully.";
    }












    /* public function generate()
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

             $baseDirectory = public_path('qr_pdf/'.$event->prefix.'/');

             // Ensure the base directory exists
             if (!file_exists($baseDirectory)) {
                 mkdir($baseDirectory, 0777, true);
             }

             $ticketNumber = $event->prefix. '-'.$formattedNumber;

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
     }*/




}
