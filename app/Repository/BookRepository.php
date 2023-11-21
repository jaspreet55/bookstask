<?php 
namespace App\Repository;

use App\Models\Book;
use Auth;
use Validator;
use Input;
use Hash;
use File;
use Session;
use Intervention\Image\Facades\Image;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Client;
use DB;
use Illuminate\Pagination\Paginator;
class BookRepository 
{

     /**
     * To get  all category
     * @param   
     * @return  all category collection 
     */
    public function allBooks($request)
    {
      $pageNumber = (isset($request['page']) && $request['page']>0) ? $request['page'] : 1;
       $books = Book::paginate(10, ['*'], 'page', $pageNumber);
      
       return $books;
    }
    public function allBooksAdmin()
    {
       $books = Book::orderBy('id','desc')->get();
      
       return $books;
    }

     /**
     * To save  a new product
     * @param  array $data 
     * @return  array 
     */
    public function saveProduct($request)
    {
      $book  =[
         'title' => $request['title'],
         'author'  => $request['author'],
         'genre'  => $request['genre'],
         'description' => $request['description'],
         'isbn' => $request['isbn'],
         'published' => date('Y-m-d',strtotime($request['published'])),
         'publisher' => $request['publisher'],
        ];
        
        $saveBook =  Book::create($book);
         $bookid = $saveBook->id;
         if($file = $request->hasFile('prod_image') && $request->file('prod_image') != null) {
            $files = $request->file('prod_image');
            $destinationPath = "uploads/book/";
            $filepath =   $this->saveAttach($files,$destinationPath,$bookid);
            Book::where('id',$bookid)->update(['image'=>$filepath]);
         }
   
         // $client = ClientBuilder::create()->setHosts(['http://localhost:9200'])->setSSLVerification(false)
         //             ->setBasicAuthentication(env('ELASTICSEARCH_USER'), env('ELASTICSEARCH_PASS'))   
         //             ->build();
         // dd($client->info());
         // $params = [
         //    'index' => 'book',
         //    'body' => [
         //       'settings' => [
         //             'number_of_shards' => 1,
         //             'number_of_replicas' => 0,
         //       ],
         //    ],
         // ];

         // $response = $client->indices()->create($params);
        
      //    $params = [
      //       'index' => 'book',
      //       'id' => $saveBook->id,
      //       'body' => [
      //           'title' => $saveBook->title,
      //           'content' => $saveBook->description,
      //           'author'  =>  $saveBook->author,
      //           'published'  =>  $saveBook->published,
      //           'genre'  =>  $saveBook->genre,
      //           'isbn'  =>  $saveBook->isbn,
      //           'publisher'  =>  $saveBook->publisher,
      //       ],
      //       'type'  => 'book_owner'
      //   ];
        
      //   $result = $client->index($params);							//using Index() function to inject the data
      //    var_dump($result);
      //    die();
         if($bookid){
            return ['status'=>true,'message'=>'Book Saved Successfully'];
         }else{
            return ['status'=>false,'message'=>'Some error occur','type'=>400];
         }
        
    }



    public function saveAttach($file,$path,$id)
    {
        $path = public_path('uploads'.'\\'.'book'.'\\'.$id.'\\');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        
            $filename = time() . '-' . $file->getClientOriginalName();
            
            $image    = Image::make($file)->resize(480,640,function ($constraint) {
                     $constraint->aspectRatio();
               });

            $image->save($path . $filename);
            $filepath = 'uploads'.'\\'.'book'.'\\'.$id.'\\'.$filename;
           return $filepath;
            
    }


    public function getBook($bookId){
      $book =  Book::find($bookId);
      if($book != null){
         if($book->image != ''){
            $image = str_replace('/','\\',$book['image']);
            $book['image'] = request()->getSchemeAndHttpHost().'/'.$image;
         }
         
      }
      return $book;
    }

     /**
     * To remove attachment in database.
     * @param  request
     * @return Response
     */
    public function removeAttachment($data)
    { 
        $attach =  Book::where('id',$data['id'])->first();
        if($attach != null)
        {
         if(file_exists($attach->image)){
            unlink(str_replace("\\","/",$attach->image));
         }
         Book::where('id',$data['id'])->update(['image'=>'']);
         return true;
      }else{
            return false;
        }
    }

    
     /**
     * To save  a new update 
     * @param  array $request , product id $id
     * @return  array 
     */
   public function updateBook($request,$id){
      $book  =[
         'title' => $request['title'],
         'author'  => $request['author'],
         'genre'  => $request['genre'],
         'description' => $request['description'],
         'isbn' => $request['isbn'],
         'published' => date('Y-m-d',strtotime($request['published'])),
         'publisher' => $request['publisher'],
        ];
        
        $saveBook =  Book::where('id',$id)->update($book);
        if($file = $request->hasFile('prod_image') && $request->file('prod_image') != null) {
         $files = $request->file('prod_image');
         $destinationPath = "uploads/book/";
         $attach =  Book::where('id',$id)->first();
         if(file_exists($attach->image)){
            unlink(str_replace("\\","/",$attach->image));
         }
         $filepath =   $this->saveAttach($files,$destinationPath,$id);
         Book::where('id',$id)->update(['image'=>$filepath]);
      }
      if($saveBook){
         return ['status'=>true,'message'=>'Book update Successfully'];
      }else{
         return ['status'=>false,'message'=>'Some error occur','type'=>400];
      }
   }


    /**
     * To Delete a product
     * @param  product id $id 
     * @return  array 
     */
    public function deleteBook($id){

      $getProduct = Book::find($id);
      if($getProduct != null){
         if($getProduct->image != ''){
            if(file_exists($getProduct->image)){
               unlink(str_replace("\\","/",$getProduct->image));
            }
         }
         $getProduct->delete();
      }
      return true;
  }

  public function searchBook($data){
   $book = "Select * from books where 1=1";
   if(array_key_exists('title',$data)){
      $book .= " And title='".$data['title']."'";
   }
   if(array_key_exists('author',$data)){
      $book.= " And author='".$data['author']."'";
     
   }

   if(array_key_exists('publisher',$data)){
      $book.= " And  publisher='".$data['publisher']."'";
   }
   if(array_key_exists('isbn',$data)){
      $book.= " And  isbn='".$data['isbn']."'";
   }
   if(array_key_exists('genre',$data)){
      $book.= " And  genre='".$data['genre']."'";
   }
   $data =DB::select($book);


   $page = (isset($data['page']) && $data['page']>0) ? $data['page'] : 1;
   $size = 10;

$collect = collect($data);

$paginationData = new \Illuminate\Pagination\LengthAwarePaginator(
                         $collect->forPage($page, $size),
                         $collect->count(), 
                         $size, 
                         $page
                       );
   return $paginationData;
  }
    

}