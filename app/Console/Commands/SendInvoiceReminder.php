<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendInvoiceReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send invoice reminders 5 days before due date.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Data JSON dalam string
        $data = '{
            "invoices": [
                { "due_date" : "05-11-2023", "amount" : "2.857.006" },
                { "due_date" : "05-12-2023", "amount" : "2.886.006" },
                { "due_date" : "05-01-2023", "amount" : "2.896.227" },
                { "due_date" : "05-02-2024", "amount" : "2.896.223" },
                { "due_date" : "05-03-2024", "amount" : "2.612.665" },
                { "due_date" : "05-04-2024", "amount" : "1.862.910" },
                { "due_date" : "05-05-2024", "amount" : "917.787" },
                { "due_date" : "05-06-2024", "amount" : "917.787" },
                { "due_date" : "05-07-2024", "amount" : "917.787" },
                { "due_date" : "05-08-2024", "amount" : "917.787" },
                { "due_date" : "05-09-2024", "amount" : "917.787" }
            ]
        }';

        // Parse JSON menjadi array PHP
        $data = json_decode($data, true);

        if (!empty($data['invoices'])) {
            // Tanggal hari ini
            $today = now();

            // Loop melalui data tagihan
            foreach ($data['invoices'] as $invoice) {
                $dueDate = Carbon::createFromFormat('d-m-Y',$invoice['due_date']);

                // Periksa apakah tanggal hari ini adalah 5 hari atau kurang sebelum tanggal jatuh tempo
                if ($today->diffInDays($dueDate, false) <= 5 && 
$today->month == $dueDate->month || 1==1) {
                    $emailMessage = "Invoice Reminder: Your due date 
			is approaching. Don't forget to pay your 
			invoice of 
			{$invoice['amount']} due on 
			{$invoice['due_date']}.";

                    // Kirim email pengingat tagihan langsung dari sini
                    Mail::raw($emailMessage, function ($message) {
                        $message->to('muhammadrikzan31@gmail.com')->subject('Invoice Reminder');
                    });
                }
            }

            $this->info('Invoice reminders sent successfully.');
        }
    }
}
