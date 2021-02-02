<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories, $name, $slug, $category_id, $parent_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.categories')->extends('layouts.app');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->parent_id = '';
        $this->slug = '';
        $this->category_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'slug' => '',
        ]);

        Category::updateOrCreate(['id' => $this->category_id], [
            'parent_id' => $this->parent_id == 0 ? null : $this->parent_id,
            'name' => $this->name,
          
        ]);

        session()->flash(
            'message',
            $this->category_id ? 'Categoria editada com sucesso.' : 'Categoria criada com sucesso!.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $Category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $Category->name;
        $this->slug = $Category->slug;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $categories = explode(",", $id);

        if (is_array($categories)) {
            foreach ($categories as $ids) {
                $categorie = Category::find($ids);

                $categorie->delete();
            }
        } else {
            $categorie = Category::find($id);

            $categorie->delete();

        }
        session()->flash('message', 'Categoria deletada com sucesso');
    }
}
