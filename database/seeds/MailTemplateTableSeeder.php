<?php

use App\Models\MailTemplate;
use Illuminate\Database\Seeder;

class MailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailTemplate::create([
            'template_name' => 'Template 1',
            'subject' => 'Invoice {number} from {business_name}',
            'message' => '# Invoice
Dear {customer},

You have a new invoice for **{amount}** . We appreciate your prompt payment.
You can pay online using Paypal by following below link:
{payment_link}

Let us know once the payment is completed.

Thank you!

{business_name}',
            'type' => 1
        ]);
    }
}
