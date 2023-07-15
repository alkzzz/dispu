<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LinkCrud extends Component
{
    use LivewireAlert;

    public $links, $title, $url,  $link_id;
    public $updateMode = false;
    public $deleteMode = false;

    protected $listeners = [
        'confirmDelete'
    ];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:links,title' . ($this->link_id ? ",{$this->link_id}" : ''),
            'url' => 'required|url',
        ];
    }

    protected function validationAttributes()
    {
        return [
            'title' => 'Judul Link',
            'url' => 'Alamat (URL)',
        ];
    }

    public function mount()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->url = '';
        $this->link_id = null;
        $this->updateMode = false;
        $this->deleteMode = false;
    }

    public function render()
    {
        $this->links = Link::orderBy('title')->get();
        return view('livewire.link-crud', ['links' => $this->links]);
    }

    public function store()
    {
        $this->validate();
        Link::create([
            'title' => $this->title,
            'url' => $this->url
        ]);
        $this->resetForm();
        session()->flash('message', 'Custom Link baru telah ditambahkan.');
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        $this->link_id = $link->id;
        $this->title = $link->title;
        $this->url = $link->url;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        $link = Link::findOrFail($this->link_id);
        $link->update([
            'title' => $this->title,
            'url' => $this->url
        ]);
        $this->resetForm();
        session()->flash('message', 'Custom Link telah diupdate.');
    }

    public function delete($id)
    {
        $link = Link::findOrFail($id);
        $this->link_id = $link->id;
        $this->alert('warning', 'Hapus Custom Link?', [
            'text' => 'Menghapus link yang ada pada menu juga akan menghapus menu tersebut!',
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
        $link = Link::findOrFail($this->link_id);
        $link->delete();

        session()->flash('message', 'Custom Link telah dihapus.');

        $this->deleteMode = false;
        $this->resetForm();
    }
}
