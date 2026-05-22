<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqItems')->orderBy('sort_order')->get();
        return view('faq.index', compact('categories'));
    }

    public function adminIndex()
    {
        $categories = FaqCategory::orderBy('sort_order')->get();
        $faqItems = FaqItem::with('category')->orderBy('sort_order')->get();
        return view('faq.admin', compact('categories', 'faqItems'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
            'sort_order' => FaqCategory::count() + 1,
        ]);

        return redirect()->route('faq.admin')->with('success', 'Categorie toegevoegd!');
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        FaqItem::create([
            'category_id' => $request->category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'sort_order' => FaqItem::where('category_id', $request->category_id)->count() + 1,
        ]);

        return redirect()->route('faq.admin')->with('success', 'Vraag toegevoegd!');
    }

    public function destroyCategory(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('faq.admin')->with('success', 'Categorie verwijderd!');
    }

    public function destroyItem(FaqItem $item)
    {
        $item->delete();
        return redirect()->route('faq.admin')->with('success', 'Vraag verwijderd!');
    }
}