<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\supplier;
class Counte extends Component
{
    public $company_name , $email ,$address ,$phone_number;
 
    public function  resetInput()
    {
        $this->company_name = '';
        $this->email = '';
        $this->address = '';
        $this->phone_number= '';
       
    }
    
 
    public function add_supplier()
   {
    $validatedData = $this->validate([
        'company_name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
    ]);
    supplier::create($validatedData);
//   return  \redirect('/Supplier');
// return redirect()->to('/Supplier');
return redirect(request()->header('Referer'));
  session()->flash('message', 'Users Created Successfully.');
  $this->resetInput();
   }
    public function render()
    {
        return view('livewire.counte');
    }
}
