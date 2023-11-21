<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookService {
	
    protected  $bookRepo;

    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * To get all Category in  service function.
     *
     * @param  $request
     * @return 
     */
    public function allBooks($request)
    {
        return $this->bookRepo->allBooks($request);
    }
    public function allBooksAdmin()
    {
        return $this->bookRepo->allBooksAdmin();
    }

    public function saveProduct($request){
        return $this->bookRepo->saveProduct($request);
    }

    public function getBook($bookId){
        return $this->bookRepo->getBook($bookId);
    }
    
    /**
     * To remove attachment in database.
     * @param  request
     * @return Response
     */
    public function removeAttachment($request)
    {
        return $this->bookRepo->removeAttachment($request->all());
    }

     /**
     * update a product .
     *
     * @param  $request
     * @return 
     */
    public function updateBook($request,$id)
    {   
        return $this->bookRepo->updateBook($request,$id);
    } 

    /**
     * Delete a product .
     *
     * @param  $request
     * @return 
     */
    public function deleteBook($id)
    {   
        return $this->bookRepo->deleteBook($id);
    } 
    /**
     * search a product .
     *
     * @param  $request
     * @return 
     */
    public function searchBook($request)
    {   
        return $this->bookRepo->searchBook($request);
    } 
}