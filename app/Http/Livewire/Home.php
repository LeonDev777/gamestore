<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Home extends Component
{
    public function cesta($id)
    {
        $idBook = filter_var($id, FILTER_VALIDATE_INT);

        if (!$idBook) {
            session()->flash('message', 'Houve Algum erro');
            return;
        }

        session()->push('cesta', $id);
        $count =  count(session('cesta'));
        $this->dispatchBrowserEvent('addBook', ['add' => $count]);
    }


    public function render()
    {
        $books = Book::limit(8)->latest()->get();
        return view('livewire.home', [
            'books' => $books
        ]);
    }
}
