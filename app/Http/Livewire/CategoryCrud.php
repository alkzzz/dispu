<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoryCrud extends Component
{
    use LivewireAlert;

    public $categories, $name, $category_id;
    public $updateMode = false;
    public $deleteMode = false;

    protected $listeners = [
        'confirmDelete'
    ];

    /**
     * The validation rules for input fields.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name' . ($this->category_id ? ",{$this->category_id}" : ''),
        ];
    }

    /**
     * The messages for validation rules.
     *
     * @return array
     */
    protected function validationAttributes()
    {
        return [
            'name' => 'Nama kategori',
        ];
    }

    /**
     * The livewire mount function.
     *
     * @return void
     */
    public function mount()
    {
        $this->resetForm();
    }

    /**
     * Resets the form to its default values.
     *
     * @return void
     */
    public function resetForm()
    {
        $this->name = '';
        $this->category_id = null;
        $this->updateMode = false;
        $this->deleteMode = false;
    }

    /**
     * Displays the category list.
     *
     * @return void
     */
    public function render()
    {
        $this->categories = Category::orderBy('name')->get();
        return view('livewire.category-crud', ['categories' => $this->categories]);
    }

    /**
     * Validates and stores a new category.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
        Category::create(['name' => $this->name]);
        $this->resetForm();
        session()->flash('message', 'Kategori baru telah ditambahkan.');
    }

    /**
     * Loads a category data to edit.
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->updateMode = true;
    }

    /**
     * Validates and updates an existing category.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $category = Category::findOrFail($this->category_id);
        $category->update(['name' => $this->name]);
        $this->resetForm();
        session()->flash('message', 'Kategori telah diupdate.');
    }

    /**
     * Deletes a category.
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->alert('warning', 'Hapus Kategori?', [
            'text' => 'Menghapus kategori akan menghapus semua berita pada kategori tersebut!',
            'position' => 'center',
            'timer' => false,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => '<i
            class="fa-solid fa-trash-can"></i> Ya, Hapus saja',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'cancelButtonText' => '<i class="fa-solid fa-ban"></i> Cancel',
            'onConfirmed' => 'confirmDelete',
            'showCancelButton' => true,
           ]);
    }

    public function confirmDelete()
    {
        $category = Category::findOrFail($this->category_id);
        $category->delete();

        session()->flash('message', 'Kategori telah dihapus.');

        $this->deleteMode = false;
        $this->resetForm();

    }

}
