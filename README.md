### Source

> https://youtu.be/_MZ1B5F2PFc?si=uJ_oGuAcpoya-GUB&t=2648

# Source Playlist

> https://www.youtube.com/watch?v=wN5c9HuxdS4&list=PLaXLjtW0Px1r6M2ODEz2Mcj3MPwSViUYT&index=7

# Template css

> https://github.com/share-tutorials-dev/invoice-html-css

### This Git

> https://github.com/samedan/2411_invoices_vue_laravel

### DBB

## Counters

> php artisan make:model Counter -m
> php artisan make:factory CounterFactory
> /app/database/factories/CounterFactory
> /app/database/seeders/DatabaseSeeder
> php artisan db:seed

## Products

> php artisan make:model Product -mc

> php artisan make:factory ProductFactory

## Customers

> php artisan make:model Customer -mc

> php artisan make:factory CustomerFactory

## Invoices

> php artisan make:model Invoice -mc
> php artisan make:factory InvoiceFactory

## InvoiceItems

> php artisan make:model InvoiceItem -m
> php artisan make:factory InvoiceItemFactory

### Frontend

> npm install vue-loader@next vue@3.2.20 vue-router@next
> npm install @vitejs/plugin-vue --force

### Show Invoices

> ![Invoices](https://github.com/samedan/2411_invoices_vue_laravel/blob/main/public/images/printscreen1.jpg)

> InvoiceController : $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
> /resources/js/components/invoices/index.vue -> getInvoices()
> Invoice.php : customer(){ return $this->belongsTo(Customer::class);}

### Search Invoice

> index.vue ->search()
> InvoiceController -> search_invoice()

### New Invoice

> InvoiceController -> defaultOnvoiceFormData -> create_invoice()
> /resources/js/components/invoices/new.vue -> Form & Default Data

> ![NewFormInvoice](https://github.com/samedan/2411_invoices_vue_laravel/blob/main/public/images/printscreen2.jpg)

### Show One Invoice

# LoadItems on Invoice -> Invoice.php model

> public function invoice_items() {return $this->hasMany(InvoiceItem::class); }

# LoadProducts on Invoice -> InvoiceItem.php model

> public function product() {return $this->belongsTo(Product::class); }

# InvoiceController, Customees & InvoiceItems & InvoiceProducts

> show_invoice($id){$invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);}
> /resources/js/components/invoices/show.vue -> onMounted(async () => {getInvoice();});

### EDIT Invoice

> edit.vue
> InvoiceController -> public function update_invoice()
> ![EditInvoice](https://github.com/samedan/2411_invoices_vue_laravel/blob/main/public/images/printscreen3.jpg)
