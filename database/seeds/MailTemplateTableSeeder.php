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
            'subject' => 'Invoice {number} from {business_name}',
            'subject' => 'Invoice {number} from {business_name}',
            'message' => '# Invoice
Dear {customer},

You have a new invoice for **{amount}** . We appreciate your prompt payment.
You can pay online using Paypal by following below link:
{payment_link}

Let us know once the payment is completed.

Thank you!

{business_name}',
            'replaceable' => '{"{number}":"INV\/2018\/1002","{business_name}":"John Doe Inc","{shabayek}":"Esmail Shabayek","{customer}":"Jane Doe","{amount}":"$850.00","{due_date}":"May 25th 2018","{payment_link}":"https:\/\/example.com\/payment-link"}'
        ]);
    }
}
