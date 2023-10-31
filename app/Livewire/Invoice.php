<?php

namespace App\Livewire;

use App\Mail\InvoiceMail;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Invoice extends Component
{
    public array $products = [];

    #[Rule('required')]
    public string $product = '';
    public $price = 0;

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.invoice');
    }

    /**
     * @return void
     */
    public function mount(): void{
        $this->products = Product::pluck('name', 'id')->toArray();
    }

    public function selectProduct()
    {
        session()->flash('status', '');
        $prod = Product::find($this->product);

        $this->price = optional($prod)->price;
    }
    public function generateInvoice(){
        $this->validate();

        $product = Product::find($this->product);

        Mail::to(Auth::user())->send(new InvoiceMail($product));

        session()->flash('status', 'The invoice was generated successfully, check your inbox');

        $this->redirect('/invoice');
    }
}
