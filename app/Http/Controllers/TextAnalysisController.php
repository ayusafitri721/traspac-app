<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class TextAnalysisController extends Controller
{
    public function __construct(private readonly ArticleService $articleService)
    {
    }

    public function index()
    {
        return view('text-analysis.index', [
            'article' => $this->articleService->getArticle(),
            'mode' => null,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_word' => ['required', 'string', 'max:100'],
        ]);

        $word = $request->input('search_word');
        $article = $this->articleService->getArticle();
        $count = $this->articleService->countWordOccurrences($article, $word);
        $highlightedArticle = $this->articleService->highlightWord($article, $word, 'yellow');

        return view('text-analysis.index', [
            'article' => $article,
            'mode' => 'search',
            'searchWord' => $word,
            'searchCount' => $count,
            'searchResultArticle' => $highlightedArticle,
        ]);
    }

    public function replace(Request $request)
    {
        $request->validate([
            'replace_from' => ['required', 'string', 'max:100'],
            'replace_to' => ['required', 'string', 'max:100'],
        ]);

        $article = $this->articleService->getArticle();
        $from = $request->input('replace_from');
        $to = $request->input('replace_to');
        $replacedArticle = $this->articleService->replaceWord($article, $from, $to);
        $highlightedArticle = $this->articleService->highlightWord($replacedArticle, $to, 'lightgreen');

        return view('text-analysis.index', [
            'article' => $article,
            'mode' => 'replace',
            'replaceFrom' => $from,
            'replaceTo' => $to,
            'replaceResultArticle' => $highlightedArticle,
        ]);
    }

    public function sort()
    {
        $article = $this->articleService->getArticle();
        $uniqueWords = $this->articleService->sortUniqueWords($article);

        return view('text-analysis.index', [
            'article' => $article,
            'mode' => 'sort',
            'sortedWords' => $uniqueWords,
        ]);
    }
}
