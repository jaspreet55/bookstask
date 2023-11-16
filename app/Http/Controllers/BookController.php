<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
class BookController extends Controller
{
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    public function list(Request $request){
        $books = $this->bookService->allBooks($request->all());
        $this->setMessage('book get successfully');
        $this->setResponseData(['books'=>$books]);
        return $this->toResponse();
    }

    public function search(Request $request){
        $books = $this->bookService->searchBook($request->all());
        $this->setMessage('search book get successfully');
        $this->setResponseData(['books'=>$books]);
        return $this->toResponse();
    }

    public function bookDetail($id){
        $books = $this->bookService->getBook($id);
        $this->setMessage('book detail get successfully');
        $this->setResponseData(['books'=>$books]);
        return $this->toResponse();
    }
}
