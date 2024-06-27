<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function cesta($id)
    {
        $idBook = filter_var($id, FILTER_VALIDATE_INT);

        if (!$idBook) {
            session()->flash('message', 'Houve Algum erro');
            return;
        }

        session()->push('cesta', $id);
        $count =  count(session('cesta'));
        $this->dispatchBrowserEvent('addBook',['add' => $count]);

    }


    public function render()
    {
        $books = Book::latest()->paginate(4);
        return view('livewire.books',[
            'books' => $books
        ]);
    }
}
