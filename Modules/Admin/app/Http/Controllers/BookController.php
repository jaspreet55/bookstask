<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;
use Session;

class BookController extends Controller
{
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookService->allBooks(); 
        return view('admin::book/index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $books = $this->bookService->saveProduct($request); 
        if($books['status'] == true){
            Session::flash('alert-success',$books['message']);
            return redirect()->route('book.list');
        }else{
            return back()->withErrors($books['message'])->withInput();
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bookId = base64_decode($id);
        $book = $this->bookService->getBook($bookId); 
        return view('admin::book/edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
                
        $bId = base64_decode($id);
        $updateBook = $this->bookService->updateBook($request,$bId);
      if($updateBook['status'] == true)
      {
          Session::flash('alert-success',$updateBook['message']);
          return redirect()->route('book.list');
      }else{
           return back()->withErrors($updateBook['message'])->withInput();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $deleteBook= $this->bookService->deleteBook($id);
        if($deleteBook == true)
       {
            return response()->json(['status' => true]);
       }else{
        return response()->json(['status' => false]);
       }
    }

      /**
     * To remove attachment in database.
     * @param  request
     * @return Response
     */
    public function removeAttachment(Request $request)
    {
        $status = $this->bookService->removeAttachment($request);
       
        if($status == true)
        {
            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false]);
        }
    }
}
