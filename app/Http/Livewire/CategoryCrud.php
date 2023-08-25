<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Menu;

class CategoryCrud extends Component
{
    use LivewireAlert;

    public $categories, $title, $category_id;
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
            'title' => 'required|string|max:255|unique:categories,title' . ($this->category_id ? ",{$this->category_id}" : ''),
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
            'title' => 'Judul kategori',
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
        $this->title = '';
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
        $this->categories = Category::where('id', '>', 6)->orderBy('title')->get();
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

        $this->addError('title.unique', 'message');

        Category::create([
            'title' => $this->title,
            'url' => route('frontend.getCategory', \Str::slug($this->title))
        ]);
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
        $this->title = $category->title;
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
        $category->update(['title' => $this->title]);

        $menu_category = Menu::where('type', 'category')->where('type_id', $this->category_id)->first();
        if (isset($menu_category)) {
            $menu_category->title = $category->title;
            $menu_category->url = $category->url;
            $menu_category->save();
        }

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
