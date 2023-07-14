<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function read(Request $request)
    {
        $books= new book();        

        $data=$books->all();
        
        return response()->json($data);
    }

    public function create(Request $request){
        
        $book= new book();

        $book->name =$request->input("name");
        $book->isbn =$request->input("isbn");
        $book->autor =$request->input("autor");
        $book->edition =$request->input("edition");

        $book->save();

        $message=["mensaje"=>"registro exitoso"];
        return response()->json($message,Response::HTTP_CREATED);
    }

    public function update(Request $request){
        
        $idBook=$request->query("id");

        $book=new book();

        $bookPart=$book->find($idBook);

        $bookPart->name =$request->input("name");
        $bookPart->isbn =$request->input("isbn");
        $bookPart->autor =$request->input("autor");
        $bookPart->edition =$request->input("edition");

        $bookPart->save();

        $message=["mensaje"=>"Actualizacion exitosa"];
        return response()->json($message);
    }

    public function delete(Request $request){
        
        $idBook=$request->query("id");

        $book=new book();

        $bookPart=$book->find($idBook);

        $bookPart->delete();

        $message=["mensaje"=>"Eliminacion exitosa"];
        return response()->json($message,Response::HTTP_OK);
    }
}

