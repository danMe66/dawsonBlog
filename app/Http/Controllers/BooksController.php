<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\ChapterAddRequest;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Post;
use App\Models\Category;
use App\Models\Topic_has_book;
use Auth;
use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Book $book)
    {
        $books = $book->paginate(20);
        return view('topics.books.list', compact('books'));
    }

    public function create(Post $topic)
    {
        $categories = Category::all();
        return view('topics.books.create', compact('topic', 'categories'));
    }

    /**
     * 保存新建的小册
     * @param BookRequest $request
     * @param ImageUploadHandler $uploader
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request, ImageUploadHandler $uploader, Book $book)
    {
        $book->fill($request->all());
        if ($request->cover) {
            $result = $uploader->save($request->cover, 'cover', '', 362);
            if ($result) {
                $book->cover = $result['path'];
            }
        }
        $book->user_id = Auth::id();
        $book->save();

        return redirect()->to($book->link())->with('success', '成功创建小册！');
    }

    public function show()
    {
        return view('topics.books.show');
    }

    public function edit(Book $book, Topic_has_book $topic_has_book)
    {
        return view('topics.books.edit', compact('book', 'topic_has_book'));
    }

    public function chapterAdd(ChapterAddRequest $chapterAddRequest, Chapter $chapter)
    {
        return view('topics.books.show');
    }

    public function chapterHasTopic()
    {
        return view('topics.books.show');
    }
}